<?php
/**
 * import.php
 * 
 * Reads all .sql files in the 'data' folder and executes them on a SQL Server database using PDO_SQLSRV.
 */

////////////////////////////
// 1. DATABASE CONNECTION //
////////////////////////////

$serverName   = 'sqlsrv';       // or "YOUR_SERVER\SQLEXPRESS", etc.
$databaseName = 'MyNewDB';    // Your target database name
$username     = 'sa';             // or another user
$password     = '$trongP@ssw0rd';

// Build the DSN string for pdo_sqlsrv
$dsn = "sqlsrv:Server=$serverName;Database=$databaseName;Encrypt=yes;TrustServerCertificate=yes";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
    ]);

    echo "Connected to SQL Server successfully.\n";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage() . "\n");
}

//////////////////////
// 2. READ .SQL FILES //
//////////////////////

$dataFolder = __DIR__ . '/data'; // Path to your 'data' folder
if (!is_dir($dataFolder)) {
    die("Data folder not found: $dataFolder\n");
}

// Grab all `.sql` files in the folder
$sqlFiles = glob($dataFolder . '/*.sql');
if (empty($sqlFiles)) {
    die("No .sql files found in $dataFolder\n");
}

echo "Found " . count($sqlFiles) . " SQL file(s) in '$dataFolder'.\n";

/////////////////////////////////////
// 3. EXECUTE EACH FILE IN DATABASE //
/////////////////////////////////////

foreach ($sqlFiles as $key => $filePath) {
    $fileName = basename($filePath);
    echo "\nProcessing file: $fileName\n";

    try {
        // Read the entire SQL file into a string
        $fileContents = file_get_contents($filePath);
        if ($fileContents === false) {
            echo "  [ERROR] Cannot read file: $fileName\n";
            continue;
        }
    } catch(Exception $e) {
        var_dump($e);die;
        // continue;
    }

    // Optional: Split on 'GO' statements (case-insensitive) to handle batches
    // This is important if your scripts contain T-SQL 'GO' separators.
    // If your scripts do NOT contain 'GO', you can simply run $pdo->exec($fileContents).
    $statementsArr = preg_split('/\r\n|\r|\n/i', $fileContents, -1, PREG_SPLIT_NO_EMPTY);
    $statements = array_filter($statementsArr, function($value) {
        // Trim whitespace and check if the result is empty
        return trim($value) !== '';
    });
    // Execute each statement/batch
    foreach ($statements as $index => $sql) {
        $sql = trim($sql);
        if (empty($sql)) {
            // Skip any empty statements
            continue;
        }

        try {
            $pdo->exec($sql);
            echo "  [OK] Statement batch #".($index+1)." executed.\n";
        } catch (PDOException $e) {
            echo "  [ERROR] Statement batch #".($index+1)." failed: " . $e->getMessage() . "\n";
            // Depending on your use case, you may want to stop execution here or continue.
            // break; // to stop importing further
        }
    }
    die;
}

echo "\nImport process completed.\n";

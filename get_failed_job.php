<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $failed = DB::table('failed_jobs')->orderBy('failed_at', 'desc')->first();
    
    if ($failed) {
        echo "Latest failed job details:\n";
        echo "ID: " . $failed->id . "\n";
        echo "Connection: " . $failed->connection . "\n";
        echo "Queue: " . $failed->queue . "\n";
        echo "Exception: " . $failed->exception . "\n";
        echo "Failed at: " . $failed->failed_at . "\n";
    } else {
        echo "No failed jobs found.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

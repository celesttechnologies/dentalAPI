<?php

namespace WFX\ScribeGenerator\ScribeGenerator;

class FileUpdater
{
    private $filePath;
    private $fileContent;
    private $updatedContent;
    
    /**
     * Create a new file updater instance
     *
     * @param string $filePath Path to the controller file
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->fileContent = file_get_contents($filePath);
        $this->updatedContent = $this->fileContent;
    }
    
    /**
     * Update the controller file with the generated PHPDoc blocks
     *
     * @param array $methods Method information with docblocks
     * @return bool True if the file was modified
     */
    public function updateWithDocBlocks(array $methods)
    {
        // Read the file content
        $fileContent = file_get_contents($this->filePath);
        $lines = explode("\n", $fileContent);
        
        // Track which methods we've successfully processed
        $processedMethods = [];
        $modified = false;
        
        // Process each method
        foreach ($methods as $method) {
            if (empty($method['docblock'])) {
                continue; // Skip if no docblock was generated
            }
            
            $methodName = $method['name'];
            
            // Step 1: Find the method in the file
            $methodPattern = '/\s*(public|protected|private)?\s+function\s+' . preg_quote($methodName) . '\s*\(/i';
            $methodFound = false;
            $methodLine = -1;
            
            // Check each line to find the method declaration
            for ($i = 0; $i < count($lines); $i++) {
                if (preg_match($methodPattern, $lines[$i])) {
                    $methodLine = $i;
                    $methodFound = true;
                    break;
                }
            }
            
            if (!$methodFound) {
                echo "  Warning: Method {$methodName} not found in file.\n";
                continue;
            }
            
            // Step 2: Check if there's already a docblock before this method
            $existingDocblock = false;
            $docblockStart = -1;
            $docblockEnd = -1;
            
            // Look for existing docblock immediately preceding the method
            for ($i = $methodLine - 1; $i >= 0; $i--) {
                $line = trim($lines[$i]);
                
                // Skip empty lines
                if (empty($line)) {
                    continue;
                }
                
                // If we see the end of a docblock (*/), then we need to find its start
                if ($line === '*/') {
                    $docblockEnd = $i;
                    
                    // Find the start of this docblock
                    for ($j = $i - 1; $j >= 0; $j--) {
                        if (trim($lines[$j]) === '/**') {
                            $docblockStart = $j;
                            $existingDocblock = true;
                            break;
                        }
                    }
                    break;
                } else {
                    // If we hit a non-empty line that isn't part of a docblock, 
                    // there's no docblock before this method
                    break;
                }
            }
            
            // Step 3: Add or replace the docblock
            if ($existingDocblock) {
                // Remove the existing docblock
                array_splice($lines, $docblockStart, $docblockEnd - $docblockStart + 1);
                
                // Adjust the method line since we removed lines
                $methodLine -= ($docblockEnd - $docblockStart + 1);
            }
            
            // Insert the new docblock right before the method
            $docblockLines = explode("\n", trim($method['docblock']));
            array_splice($lines, $methodLine, 0, $docblockLines);
            
            $processedMethods[] = $methodName;
            $modified = true;
            
            // Update line numbers for subsequent methods to account for our changes
            $lineShift = count($docblockLines);
            if ($existingDocblock) {
                $lineShift -= ($docblockEnd - $docblockStart + 1);
            }
            
            // We need to adjust the methodLine for subsequent searches
            for ($i = 0; $i < count($methods); $i++) {
                if ($methods[$i]['start_line'] > $method['start_line']) {
                    $methods[$i]['start_line'] += $lineShift;
                }
            }
        }
        
        // Save the updated file content
        if ($modified) {
            $updatedContent = implode("\n", $lines);
            file_put_contents($this->filePath, $updatedContent);
            $this->updatedContent = $updatedContent;
            echo "  ✓ Updated controller with Scribe PHPDoc comments.\n";
        } else {
            echo "  ℹ No changes were needed for this controller.\n";
        }
        
        return $modified;
    }
    
    /**
     * Check if a docblock already has complete Scribe annotations
     *
     * @param string $docblock The docblock content
     * @param array $method Method information
     * @return bool True if the docblock has all required annotations
     */
    private function hasCompleteScribeAnnotations($docblock, $method)
    {
        // Check if the docblock has the simple comment that we're looking to replace
        if (strpos($docblock, '// Documentation will be generated by Scribe') !== false) {
            return false;
        }
        
        // Always regenerate docblocks for now to ensure they're up to date
        return false;
    }
}
<?php

namespace WFX\ScribeGenerator\ScribeGenerator;

class ResourceParser
{
    /**
     * Extract resource structure from a Resource class
     *
     * @param string $resourceClass The fully qualified class name of the Resource
     * @param bool $isCollection Whether the resource is a collection
     * @return array The extracted resource structure
     */
    public function extractResourceStructure($resourceKey, $resourceClass, $isCollection = false)
    {
        // Convert namespace to path
        $classPath = $this->getClassPath($resourceClass);
        
        // If the class file doesn't exist, try the default location
        if (!file_exists($classPath)) {
            $shortClassName = class_basename($resourceClass);
            $resourcePathPattern = config('resource_path_pattern', 'app/Http/Resources');
            $defaultPath = base_path($resourcePathPattern . '/' . $shortClassName . '.php');
            
            if (file_exists($defaultPath)) {
                $classPath = $defaultPath;
            } else {
                return $this->generateDefaultStructure($isCollection);
            }
        }
        
        // Read the file content
        $content = file_get_contents($classPath);
        
        // Parse the toArray method to extract the structure
        $structure = $this->parseStructureFromContent($resourceKey, $content, $isCollection);
        
        // If the structure is empty, generate a default one
        if (empty($structure)) {
            $structure = $this->generateDefaultStructure($isCollection);
        }
        
        return $structure;
    }
    
    /**
     * Convert a fully qualified class name to a file path
     *
     * @param string $className The fully qualified class name
     * @return string The file path
     */
    private function getClassPath($className)
    {
        // Replace namespace separator with directory separator
        $className = ltrim($className, '\\');
        $fileName = '';
        $namespace = '';
        
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        
        $fileName .= $className . '.php';
        
        // Attempt to locate the file in the typical Laravel structure
        $resourcePathPattern = config('resource_path_pattern', 'app/Http/Resources');
        $possiblePaths = [
            base_path($fileName),
            base_path('app/' . $fileName),
            base_path($resourcePathPattern . '/' . $className . '.php')
        ];
        
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
        
        // Return the most likely path even if it doesn't exist
        return $possiblePaths[0];
    }
    
    /**
     * Parse resource structure from Resource class content
     *
     * @param string $content The file content
     * @return array Extracted structure
     */
    private function parseStructureFromContent($resourceKey, $content, $isCollection = false)
    {
        $structure = [];
        
        // Look for toArray method
        if (preg_match('/function\s+toArray\s*\(\s*[^\)]*\)\s*{(.+?)}/s', $content, $matches)) {
            $toArrayBody = $matches[1];
            
            // Look for return [...]; pattern
            if (preg_match('/return\s*\[(.+?)\];/s', $toArrayBody, $returnMatches)) {
                $returnArray = $returnMatches[1];
                
                // First, try to extract field definitions with basic structure
                preg_match_all('/[\'"]([^\'"]+)[\'"]\s*=>\s*([^,]+)/s', $returnArray, $fieldMatches, PREG_SET_ORDER);
                
                if (!empty($fieldMatches)) {
                    foreach ($fieldMatches as $match) {
                        $field = $match[1];
                        $value = trim($match[2]);
                        
                        // Handle nested array structures
                        if (preg_match('/\[(.+?)\]/', $value)) {
                            // If it looks like a nested array, handle it specially
                            if (strpos($field, 'profile') === 0 || $field === 'profile') {
                                $structure[$field] = [
                                    'bio' => $this->generateExampleValue('bio'),
                                    'website' => $this->generateExampleValue('website')
                                ];
                            } else {
                                // For other arrays, provide a basic array structure
                                $structure[$field] = $this->generateNestedArrayStructure($field);
                            }
                        } else {
                            // For regular fields, generate appropriate example values
                            $structure[$field] = $this->generateExampleValue($field);
                        }
                    }
                }
                
                // If no fields were found with the structured approach, fall back to simple field extraction
                if (empty($structure)) {
                    preg_match_all('/[\'"]([^\'"]+)[\'"]/s', $returnArray, $simpleMatches);
                    if (isset($simpleMatches[1])) {
                        foreach ($simpleMatches[1] as $field) {
                            $structure[$field] = $this->generateExampleValue($field);
                        }
                    }
                }
            }
        }
        
        return $this->formatResourceStructure($resourceKey, $structure, $isCollection);
    }
    
    /**
     * Generate an appropriate nested structure for array fields
     *
     * @param string $field The field name
     * @return array An appropriate nested structure
     */
    private function generateNestedArrayStructure($field)
    {
        // Special handling for common field names
        if ($field === 'data') {
            return ['id' => 1, 'name' => 'Example Name'];
        }
        
        if ($field === 'meta') {
            return ['total' => 10, 'per_page' => 15, 'current_page' => 1];
        }
        
        if ($field === 'links') {
            return ['self' => 'https://api.example.com/resource/1', 'related' => 'https://api.example.com/related'];
        }
        
        if ($field === 'attributes') {
            return ['name' => 'Example Name', 'description' => 'Example description'];
        }
        
        if ($field === 'relationships') {
            return ['related' => ['data' => ['id' => 1, 'type' => 'related']]];
        }
        
        // For unknown array fields, return a simple example
        return [
            'item1' => 'Example value 1',
            'item2' => 'Example value 2'
        ];
    }
    
    /**
     * Generate a default resource structure when parsing fails
     *
     * @param bool $isCollection Whether to generate a collection structure
     * @return array The default structure
     */
    private function generateDefaultStructure($isCollection = false)
    {
        $item = [
            'id' => 1,
            'name' => 'Example Name',
            'email' => 'user@example.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($isCollection) {
            return ['data' => [$item]];
        } else {
            return ['data' => $item];
        }
    }
    
    /**
     * Format the resource structure for the docblock generator
     *
     * @param array $structure The raw structure
     * @return array The formatted structure
     */
    private function formatResourceStructure($resourceKey, $structure, $isCollection = false)
    {
        // Wrap in data envelope if not already
        if (!isset($structure['data'])) {
            if ($isCollection) {
                $structure = ['data' => [$resourceKey => [$structure], 'pagination' => ['current_page' => 1, 'per_pages' => 50, 'total' => 100]]];
            } else {
                $structure = ['data' => [$resourceKey => $structure]];
            }
            // return ['data' => $structure];
        }
        
        return $structure;
    }
    
    /**
     * Generate an example value for a field
     *
     * @param string $fieldName The field name
     * @return mixed An appropriate example value
     */
    private function generateExampleValue($fieldName)
    {
        $exampleValues = config('example_values', [
            'id' => 1,
            'name' => 'Example Name',
            'email' => 'user@example.com',
            'password' => 'password123',
            'role' => 'user',
            'active' => true
        ]);
        
        // Check if we have a predefined example
        if (isset($exampleValues[$fieldName])) {
            return $exampleValues[$fieldName];
        }
        
        // Generate based on field name patterns
        if (strpos($fieldName, 'email') !== false) {
            return 'user@example.com';
        }
        
        if (strpos($fieldName, 'name') !== false) {
            return 'Example Name';
        }
        
        if (strpos($fieldName, 'id') !== false || strpos($fieldName, '_id') !== false) {
            return 1;
        }
        
        if ($fieldName === 'created_at' || $fieldName === 'updated_at') {
            return date('Y-m-d H:i:s');
        }
        
        if ($fieldName === 'active' || strpos($fieldName, 'is_') === 0) {
            return true;
        }
        
        if ($fieldName === 'profile') {
            return ['bio' => 'Example value'];
        }
        
        if ($fieldName === 'website') {
            return ['website'];
        }
        
        // For anything else, return a generic example
        return 'Example value';
    }
}
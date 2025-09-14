<?php

namespace WFX\ScribeGenerator\ScribeGenerator;

class RequestParser
{
    /**
     * Extract validation rules from a FormRequest class
     *
     * @param string $requestClass The fully qualified class name of the FormRequest
     * @return array The extracted validation rules
     */
    public function extractValidationRules($requestClass)
    {
        // Convert namespace to path
        $classPath = $this->getClassPath($requestClass);
        
        // If the class file doesn't exist, try the default location
        if (!file_exists($classPath)) {
            $shortClassName = $this->class_basename($requestClass);
            $requestPathPattern = $this->getConfig('request_path_pattern', 'app/Http/Requests');
            $defaultPath = $this->basePath($requestPathPattern . '/' . $shortClassName . '.php');
            
            echo "    Looking for class file at path: $defaultPath\n";
            
            if (file_exists($defaultPath)) {
                echo "    Found class file at: $defaultPath\n";
                $classPath = $defaultPath;
            } else {
                echo "    Class file not found at: $defaultPath\n";
                return [];
            }
        }
        
        // Pre-process the file to extract validation rules
        echo "### Pre-processing " . basename($classPath) . " to extract validation rules...\n";
        $content = file_get_contents($classPath);
        
        // Parse the PHP code to extract rules
        $rules = $this->parseRulesFromContent($content);
        
        if (!empty($rules)) {
            echo "Found " . count($rules) . " validation rules in " . basename($classPath) . ":\n";
            foreach ($rules as $field => $ruleParts) {
                echo "- $field: " . (is_array($ruleParts) ? implode('|', $ruleParts) : $ruleParts) . "\n";
            }
        } else {
            echo "No validation rules found in " . basename($classPath) . "\n";
        }
        
        // Convert the extracted rules to the format needed by the docblock generator
        return $this->formatValidationRules($rules);
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
        $requestPathPattern = $this->getConfig('request_path_pattern', 'app/Http/Requests');
        $possiblePaths = [
            $this->basePath($fileName),
            $this->basePath('app/' . $fileName),
            $this->basePath($requestPathPattern . '/' . $className . '.php')
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
     * Parse validation rules from FormRequest class content
     *
     * @param string $content The file content
     * @return array Extracted rules
     */
    private function parseRulesFromContent($content)
    {
        $rules = [];
        
        // Look for rules() method
        if (preg_match('/function\s+rules\s*\(\s*\)\s*{(.+?)}/s', $content, $matches)) {
            $rulesMethodBody = $matches[1];
            
            // Look for return [...]; pattern
            if (preg_match('/return\s*\[(.+?)\];/s', $rulesMethodBody, $returnMatches)) {
                $rulesArray = $returnMatches[1];
                
                // Extract each rule definition
                preg_match_all('/[\'"]([^\'"]+)[\'"]\s*=>\s*[\'"]([^\'"]+)[\'"]|[\'"]([^\'"]+)[\'"]\s*=>\s*\[(.*?)\]/s', $rulesArray, $ruleMatches, PREG_SET_ORDER);
                
                foreach ($ruleMatches as $match) {
                    if (isset($match[1]) && isset($match[2])) {
                        // Simple string rule
                        $field = $match[1];
                        $rule = $match[2];
                        $rules[$field] = $rule;
                    } elseif (isset($match[3]) && isset($match[4])) {
                        // Array of rules
                        $field = $match[3];
                        $ruleArray = $match[4];
                        
                        // Extract array items
                        preg_match_all('/[\'"]([^\'"]+)[\'"]/s', $ruleArray, $arrayMatches);
                        if (isset($arrayMatches[1])) {
                            $rules[$field] = implode('|', $arrayMatches[1]);
                        }
                    }
                }
            }
        }
        
        return $rules;
    }
    
    /**
     * Format validation rules for the docblock generator
     *
     * @param array $rules Raw validation rules
     * @return array Formatted validation rules
     */
    private function formatValidationRules($rules)
    {
        $formattedRules = [];
        
        foreach ($rules as $field => $ruleString) {
            $ruleParts = is_array($ruleString) ? $ruleString : explode('|', $ruleString);
            
            $type = 'string'; // Default type
            $required = false;
            
            // Determine type based on rules
            if (in_array('boolean', $ruleParts) || in_array('bool', $ruleParts)) {
                $type = 'boolean';
            } elseif (in_array('integer', $ruleParts) || in_array('numeric', $ruleParts)) {
                $type = 'number';
            } elseif (in_array('array', $ruleParts)) {
                $type = 'array';
            }
            
            // Determine if required
            $required = in_array('required', $ruleParts) || 
                        preg_grep('/^required_/', $ruleParts);
            
            // Generate an example value
            $example = $this->generateExampleValue($field, $type);
            
            // Create the formatted rule
            $formattedRules[$field] = [
                'type' => $type,
                'required' => $required,
                'description' => is_array($ruleString) ? implode('|', $ruleString) : $ruleString,
                'example' => $example
            ];
        }
        
        return $formattedRules;
    }
    
    /**
     * Generate an example value for a field
     *
     * @param string $fieldName The field name
     * @param string $type The data type
     * @return mixed An appropriate example value
     */
    private function generateExampleValue($fieldName, $type)
    {
        $exampleValues = $this->getConfig('example_values', [
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => 'password123',
            'role' => 'user',
            'active' => true,
            'id' => 1
        ]);
        
        // Check if we have a predefined example
        if (isset($exampleValues[$fieldName])) {
            return $exampleValues[$fieldName];
        }
        
        // Generate based on field name patterns
        if (strpos($fieldName, 'email') !== false) {
            return 'user@example.com';
        }
        
        if (strpos($fieldName, 'password') !== false) {
            return 'secret123';
        }
        
        if (strpos($fieldName, 'name') !== false) {
            return 'Example Name';
        }
        
        if (strpos($fieldName, 'id') !== false || strpos($fieldName, '_id') !== false) {
            return 1;
        }
        
        if ($fieldName === 'profile.bio') {
            return 'A short bio about the user';
        }
        
        if ($fieldName === 'profile.website') {
            return 'https://example.com';
        }
        
        // Generate based on data type
        switch ($type) {
            case 'boolean':
                return true;
            case 'number':
            case 'integer':
                return 1;
            case 'array':
                return [];
            default:
                // For strings, use a more descriptive example
                $readableName = str_replace('_', ' ', $fieldName);
                return 'Example ' . ucfirst($readableName);
        }
    }
    
    /**
     * Get configuration value with fallback for standalone usage
     *
     * @param string $key The configuration key
     * @param mixed $default The default value if config is not available
     * @return mixed The configuration value or default
     */
    private function getConfig($key, $default = null)
    {
        // If we're in a Laravel application and the config function exists
        if (function_exists('config')) {
            return config('scribe-generator.' . $key, $default);
        }
        
        // Default configuration for standalone usage
        $config = [
            'controller_paths' => ['app/Http/Controllers'],
            'resource_path_pattern' => 'app/Http/Resources',
            'request_path_pattern' => 'app/Http/Requests',
            'example_values' => [
                'name' => 'John Doe',
                'email' => 'user@example.com',
                'password' => 'password123',
                'role' => 'user',
                'active' => true,
                'id' => 1
            ]
        ];
        
        return $config[$key] ?? $default;
    }
    
    /**
     * Helper for base_path that works in standalone mode too
     *
     * @param string $path The path relative to base
     * @return string The absolute path
     */
    private function basePath($path = '')
    {
        // If we're in a Laravel application
        if (function_exists('base_path')) {
            return base_path($path);
        }
        
        // For standalone usage, assume we're in the project root
        return getcwd() . '/' . $path;
    }
    
    /**
     * Helper for class_basename that works in standalone mode too
     *
     * @param string $class The class name
     * @return string The basename of the class
     */
    private function class_basename($class)
    {
        // If we're in a Laravel application
        if (function_exists('class_basename')) {
            return class_basename($class);
        }
        
        // For standalone usage, extract the classname without namespace
        $class = is_object($class) ? get_class($class) : $class;
        
        return basename(str_replace('\\', '/', $class));
    }
}
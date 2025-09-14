<?php

namespace WFX\ScribeGenerator\ScribeGenerator;

class DocBlockGenerator
{
    /**
     * Generate a PHPDoc block for a controller method
     *
     * @param array $methodInfo Information about the method
     * @return string The generated docblock
     */
    public function generate(array $methodInfo)
    {
        $indent = ' ';
        $lines = [];
        
        // Start docblock
        $lines[] = "/**";
        
        // Add group tag (derived from controller name)
        $controllerName = $methodInfo['controller_name'];
        $groupName = str_replace('Controller', '', $controllerName);
        $lines[] = $indent . "* @group $groupName";
        $lines[] = $indent . "*";
        
        // Add HTTP method
        $httpMethod = $methodInfo['http_method'];
        $lines[] = $indent . "* @method $httpMethod";
        $lines[] = $indent . "*";
        
        // Add description (derived from method name)
        $description = $this->generateDescription($methodInfo['name'], $controllerName);
        $lines[] = $indent . "* $description";
        $lines[] = $indent . "*";
        
        // Add route annotation
        $route = strtolower($httpMethod);
        $lines[] = $indent . "* @$route " . $methodInfo['route'];
        $lines[] = $indent . "*";
        
        // Add URL parameters if route contains {parameters}
        if (strpos($methodInfo['route'], '{') !== false) {
            preg_match_all('/{([^}]+)}/', $methodInfo['route'], $matches);
            if (isset($matches[1])) {
                foreach ($matches[1] as $param) {
                    $lines[] = $indent . "* @urlParam $param integer required. The ID of the " . strtolower($groupName) . " to " . $this->getUrlParamDescription($methodInfo['name']) . ". Example: 1";
                }
                $lines[] = $indent . "*";
            }
        }
        
        // Add body parameters if method has validation rules
        if (!empty($methodInfo['validation_rules'])) {
            $bodyParamLines = $this->generateBodyParams($methodInfo['validation_rules'], $indent);
            $lines = array_merge($lines, $bodyParamLines);
            $lines[] = $indent . "*";
        }
        
        // Add response documentation if method returns a resource
        if (isset($methodInfo['resource_structure'])) {
            $responseLines = $this->generateResponseDocs($methodInfo, $indent);
            $lines = array_merge($lines, $responseLines);
            $lines[] = $indent . "*";
        }
        
        // Add common response codes
        switch ($httpMethod) {
            case 'POST':
                $lines[] = $indent . "* @response 400 {\"message\": \"Validation error\", \"errors\": {\"field\": [\"Error message\"]}}";
                $lines[] = $indent . "* @response 500 {\"message\": \"Internal server error\"}";
                break;
            case 'PUT':
            case 'PATCH':
                $lines[] = $indent . "* @response 400 {\"message\": \"Validation error\", \"errors\": {\"field\": [\"Error message\"]}}";
                $lines[] = $indent . "* @response 404 {\"message\": \"Resource not found\"}";
                $lines[] = $indent . "* @response 500 {\"message\": \"Internal server error\"}";
                break;
            case 'DELETE':
                $lines[] = $indent . "* @response 400 {\"message\": \"Validation error\", \"errors\": {\"field\": [\"Error message\"]}}";
                $lines[] = $indent . "* @response 404 {\"message\": \"Resource not found\"}";
                $lines[] = $indent . "* @response 500 {\"message\": \"Internal server error\"}";
                break;
            default:
                $lines[] = $indent . "* @response 500 {\"message\": \"Internal server error\"}";
        }
        
        $lines[] = $indent . "*";
        
        // Add return type
        $returnType = $this->getReturnType($methodInfo);
        $lines[] = $indent . "* @return $returnType";
        
        // End docblock
        $lines[] = " */";
        
        return implode("\n", $lines);
    }
    
    /**
     * Generate a description for a method
     *
     * @param string $methodName The method name
     * @param string $controllerName The controller name
     * @return string The generated description
     */
    private function generateDescription($methodName, $controllerName)
    {
        $resourceName = str_replace('Controller', '', $controllerName);
        $singularResource = rtrim($resourceName, 's');
        
        switch ($methodName) {
            case 'index':
                return "List all " . strtolower($resourceName);
            case 'show':
                return "Get a specific " . strtolower($singularResource);
            case 'store':
                return "Create a new " . strtolower($singularResource);
            case 'update':
                return "Update an existing " . strtolower($singularResource);
            case 'destroy':
                return "Delete a " . strtolower($singularResource);
            default:
                return ucfirst($methodName) . " " . strtolower($singularResource);
        }
    }
    
    /**
     * Get a description for a URL parameter based on the method name
     *
     * @param string $methodName The method name
     * @return string The description
     */
    private function getUrlParamDescription($methodName)
    {
        switch ($methodName) {
            case 'show':
                return "retrieve";
            case 'update':
                return "update";
            case 'destroy':
                return "delete";
            default:
                return "use";
        }
    }
    
    /**
     * Generate @bodyParam annotations from validation rules
     *
     * @param array $rules Validation rules
     * @param string $indent Indentation to use for each line
     * @return array Lines of PHPDoc
     */
    private function generateBodyParams(array $rules, $indent = ' ')
    {
        $lines = [];
        
        foreach ($rules as $field => $rule) {
            $type = $rule['type'];
            $required = $rule['required'] ? 'required' : 'optional';
            $ruleDescription = $rule['description'] ?? '';
            $example = $rule['example'];
            
            // Format the example value for different types
            if ($type === 'string') {
                $exampleStr = '"' . $example . '"';
            } elseif ($type === 'boolean') {
                $exampleStr = $example ? 'true' : 'false';
            } elseif ($type === 'array') {
                if (is_array($example) && !empty($example)) {
                    $exampleStr = json_encode($example, JSON_PRETTY_PRINT);
                } else {
                    $exampleStr = '[]';
                }
            } else {
                $exampleStr = is_string($example) ? '"' . $example . '"' : $example;
            }
            
            // Create a more descriptive field description
            $description = '';
            
            // For 'profile.*' fields, add a note that they are nested properties
            if (strpos($field, 'profile.') === 0) {
                $description = 'Nested property of the profile object. ';
            }
            
            // Extract more meaningful descriptions from the validation rules
            if (!empty($ruleDescription)) {
                // Extract validation rules for friendlier description
                $ruleParts = explode('|', $ruleDescription);
                $friendlyDescription = [];
                
                foreach ($ruleParts as $part) {
                    if ($part === 'required') continue; // Skip as this is covered by required/optional
                    if ($part === 'sometimes') continue; // Skip as this is covered by required/optional
                    if ($part === 'string' || $part === 'boolean' || $part === 'array') continue; // Skip as this is covered by type
                    
                    if (strpos($part, 'max:') === 0) {
                        $friendlyDescription[] = 'Maximum length: ' . substr($part, 4);
                    } else if (strpos($part, 'min:') === 0) {
                        $friendlyDescription[] = 'Minimum length: ' . substr($part, 4);
                    } else if (strpos($part, 'in:') === 0) {
                        $friendlyDescription[] = 'Allowed values: ' . substr($part, 3);
                    } else if ($part === 'email') {
                        $friendlyDescription[] = 'Must be a valid email address';
                    } else if ($part === 'url') {
                        $friendlyDescription[] = 'Must be a valid URL';
                    } else if ($part === 'confirmed') {
                        $friendlyDescription[] = 'Requires confirmation field';
                    } else if (strpos($part, 'unique:') === 0) {
                        $friendlyDescription[] = 'Must be unique';
                    } else {
                        $friendlyDescription[] = $part;
                    }
                }
                
                if (!empty($friendlyDescription)) {
                    $description .= implode('. ', $friendlyDescription) . '.';
                }
            }
            
            // Create the docblock line
            $docLine = $indent . "* @bodyParam $field $type $required.";
            
            if (!empty($description)) {
                $docLine .= " $description";
            }
            
            $docLine .= " Example: $exampleStr";
            
            $lines[] = $docLine;
        }
        
        return $lines;
    }
    
    /**
     * Generate response documentation from resource structure
     *
     * @param array $methodInfo Method information
     * @param string $indent Indentation to use for each line
     * @return array Lines of PHPDoc
     */
    private function generateResponseDocs(array $methodInfo, $indent = ' ')
    {
        $lines = [];
        $structure = $methodInfo['resource_structure'];
        
        // Add status code based on HTTP method
        $statusCode = $this->getStatusCodeForMethod($methodInfo['http_method']);
        
        // Add response tag
        $lines[] = $indent . "* @response $statusCode scenario=\"Success\" {";
        
        // Format the JSON structure with proper indentation
        $jsonLines = $this->formatJsonStructure($structure);
        foreach ($jsonLines as $line) {
            $lines[] = $indent . "*     $line";
        }
        
        $lines[] = $indent . "* }";
        
        return $lines;
    }
    
    /**
     * Get appropriate status code for HTTP method
     *
     * @param string $httpMethod HTTP method
     * @return int HTTP status code
     */
    private function getStatusCodeForMethod($httpMethod)
    {
        switch ($httpMethod) {
            case 'POST':
                return 201;
            case 'DELETE':
                return 204;
            default:
                return 200;
        }
    }
    
    /**
     * Get return type for method
     *
     * @param array $methodInfo Method information
     * @return string Return type
     */
    private function getReturnType(array $methodInfo)
    {
        if (isset($methodInfo['resource_class'])) {
            $resourceClass = class_basename($methodInfo['resource_class']);
            
            if ($methodInfo['return_collection']) {
                return "\\Illuminate\\Http\\Resources\\Json\\ResourceCollection";
            }
            
            return $resourceClass;
        }
        
        return "\\Illuminate\\Http\\Response";
    }
    
    /**
     * Format a PHP array as JSON with proper indentation
     *
     * @param array $structure PHP array to format
     * @return array Lines of formatted JSON
     */
    private function formatJsonStructure(array $structure)
    {
        // Encode with proper formatting
        $json = json_encode($structure, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        // Split into lines
        $lines = explode("\n", $json);
        
        return $lines;
    }
}
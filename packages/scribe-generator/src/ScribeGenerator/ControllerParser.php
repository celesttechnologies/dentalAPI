<?php

namespace WFX\ScribeGenerator\ScribeGenerator;

use PhpParser\Error;
use PhpParser\NodeFinder;
use PhpParser\ParserFactory;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;

class ControllerParser
{
    private $filePath;
    private $fileContent;
    private $parsedAst;
    private $namespace;
    private $uses = [];
    private $controllerClass;
    private $requestParser;
    private $resourceParser;
    private $docBlockGenerator;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $this->fileContent = file_get_contents($filePath);
        
        if ($this->fileContent === false) {
            throw new \Exception("Could not read file: $filePath");
        }
        
        $parser = (new ParserFactory)->createForNewestSupportedVersion();
        
        try {
            $this->parsedAst = $parser->parse($this->fileContent);
        } catch (Error $error) {
            throw new \Exception("Parse error: {$error->getMessage()}");
        }
        
        $this->parseNamespaceAndUses();
        $this->parseControllerClass();
        
        $this->requestParser = new RequestParser();
        $this->resourceParser = new ResourceParser();
        $this->docBlockGenerator = new DocBlockGenerator();
    }
    
    /**
     * Parse the namespace and use statements
     */
    private function parseNamespaceAndUses()
    {
        $nodeFinder = new NodeFinder();
        
        // Find namespace
        $namespace = $nodeFinder->findFirstInstanceOf($this->parsedAst, Namespace_::class);
        if ($namespace) {
            $this->namespace = $namespace->name->toString();
        }
        
        // Find use statements
        $useStatements = $nodeFinder->findInstanceOf($this->parsedAst, Use_::class);
        foreach ($useStatements as $use) {
            foreach ($use->uses as $useUse) {
                $this->uses[basename(ltrim($useUse->name->toString(), '\\'))] = $useUse->name->toString();
            }
        }
    }
    
    /**
     * Parse the controller class
     */
    private function parseControllerClass()
    {
        $nodeFinder = new NodeFinder();
        $this->controllerClass = $nodeFinder->findFirstInstanceOf($this->parsedAst, Class_::class);
        
        if (!$this->controllerClass) {
            throw new \Exception("No class found in {$this->filePath}");
        }
    }
    
    /**
     * Parse controller methods and extract their metadata
     *
     * @return array Array of method information
     */
    public function parse()
    {
        return $this->parseMethods();
    }
    
    /**
     * Parse all methods in the controller
     *
     * @return array Array of method information
     */
    public function parseMethods()
    {
        $methods = [];
        
        if (!$this->controllerClass) {
            return $methods;
        }
        
        foreach ($this->controllerClass->stmts as $stmt) {
            if (!($stmt instanceof ClassMethod)) {
                continue;
            }
            
            // Skip non-public methods and constructor
            if ($stmt->name->toString() === '__construct' || !$stmt->isPublic()) {
                continue;
            }
            
            $method = [
                'name' => $stmt->name->toString(),
                'start_line' => $stmt->getStartLine(),
                'end_line' => $stmt->getEndLine(),
                'params' => [],
                'request_class' => null,
                'resource_class' => null,
                'return_collection' => false,
                'return_response_key' => null,
                'http_method' => $this->guessHttpMethod($stmt->name->toString()),
                'route' => $this->guessRoute($stmt->name->toString()),
                'controller_name' => $this->controllerClass->name->toString(),
            ];
            
            // Parse parameters to find FormRequest classes
            foreach ($stmt->params as $param) {
                $paramType = null;
                if ($param->type) {
                    $paramType = $param->type->toString();
                    
                    // Check if it's a FormRequest
                    if ($this->isFormRequest($paramType)) {
                        $fullClassName = $this->resolveClassName($paramType);
                        $method['request_class'] = $fullClassName;
                        
                        // Debug output
                        echo "    Found FormRequest: $fullClassName for method " . $method['name'] . ".\n";
                    }
                }
                
                $method['params'][] = [
                    'name' => '$' . $param->var->name,
                    'type' => $paramType
                ];
            }
            
            // Analyze method body to find resource return
            $this->analyzeMethodBody($stmt, $method);
            
            // Process request and resource if found
            if ($method['request_class']) {
                // Extract validation rules
                $method['validation_rules'] = $this->requestParser->extractValidationRules($method['request_class']);
            }
            
            if ($method['resource_class']) {
                // Extract resource structure
                $method['resource_structure'] = $this->resourceParser->extractResourceStructure(
                    $method['return_response_key'],
                    $method['resource_class'],
                    $method['return_collection']
                );
                
                // Debug output for resource structure
                echo "  Found resource structure for " . $method['name'] . ".\n";
            }
            
            // Debug validation rules before generating docblock
            if (!empty($method['validation_rules'])) {
                echo "  Found " . count($method['validation_rules']) . " validation rules before generating docblock.\n";
                
                // Generate @bodyParam annotations
                if (count($method['validation_rules']) > 0) {
                    echo "  Generating @bodyParam annotations from " . count($method['validation_rules']) . " rules.\n";
                }
            } else {
                echo "  No validation_rules array before generating docblock.\n";
            }
            
            // Generate docblock
            $method['docblock'] = $this->docBlockGenerator->generate($method);
            
            $methods[] = $method;
        }
        
        echo "  Found " . count($methods) . " controller method(s).\n";
        
        return $methods;
    }
    
    /**
     * Check if a class is a FormRequest
     *
     * @param string $className The class name to check
     * @return bool True if it's likely a FormRequest
     */
    private function isFormRequest($className)
    {
        // Enhanced debugging
        echo "    isFormRequest check on class: '$className'\n";
        
        // Simplified check - if the class name contains "Request", consider it a FormRequest
        if (strpos($className, 'Request') !== false) {
            $fullClassName = $this->resolveClassName($className);
            
            // For debugging
            echo "    Resolved class name: '$fullClassName'\n";
            
            // Extract the short class name without namespace
            $parts = explode('\\', $fullClassName);
            $shortClassName = end($parts);
            echo "    Short class name: '$shortClassName'\n";
            
            // Look for the class file to confirm it exists
            $requestPathPattern = $this->getConfig('request_path_pattern', 'app/Http/Requests');
            $classPath = $requestPathPattern . '/' . $shortClassName . '.php';
            if (file_exists($this->basePath($classPath))) {
                echo "    Looking for class file at path: $classPath\n";
                echo "    Found class file at: $classPath\n";
                return true;
            }
            
            // Try using reflection if the class is autoloadable
            if (class_exists($fullClassName)) {
                $reflection = new \ReflectionClass($fullClassName);
                $isFormRequest = $reflection->isSubclassOf('Illuminate\Foundation\Http\FormRequest');
                echo "    " . ($isFormRequest ? "✓" : "✗") . " Is a FormRequest via inheritance check\n";
                return $isFormRequest;
            }
        }
        
        return false;
    }
    
    /**
     * Resolve a class name to its fully qualified name
     *
     * @param string $className The class name to resolve
     * @return string The fully qualified class name
     */
    private function resolveClassName($className)
    {
        // If it's already a fully qualified name
        if (strpos($className, '\\') === 0) {
            return ltrim($className, '\\');
        }
        
        // If it's a class from a use statement
        if (isset($this->uses[$className])) {
            return $this->uses[$className];
        }
        
        // If it's a class in the same namespace
        if ($this->namespace) {
            return $this->namespace . '\\' . $className;
        }
        
        return $className;
    }
    
    /**
     * Analyze the method body to find resource returns
     *
     * @param ClassMethod $stmt The method statement
     * @param array $method The method information to update
     */
    private function analyzeMethodBody(ClassMethod $stmt, array &$method)
    {
        if (!$stmt->stmts) {
            return;
        }
        
        $nodeFinder = new NodeFinder();
        
        // Look for 'return new ResourceClass' pattern
        $returns = $nodeFinder->findInstanceOf($stmt->stmts, MethodCall::class);
        
        foreach ($returns as $return) {
            if ($return->var instanceof Variable && $return->var->name === 'this') {
                if ($return->name->name === 'collection') {
                    $method['return_collection'] = true;
                }
            }
        }
        
        // Get method body content
        $methodBody = $this->getMethodBody($stmt);
        
        // More inclusive patterns to detect resources
        $patterns = [
            // Standard resource pattern: return new UserResource($user)
            '/[\'"][^\'"]+[\'"]\s*=>\s+new\s+(\w+Resource)\s*\(/i' => false,
            
            // Collection pattern: return UserResource::collection($users)
            '/[\'"][^\'"]+[\'"]\s*=>\s+(\w+Resource)::collection\s*\(/i' => true,
            
            // Collection with new: return new ResourceCollection(UserResource::collection($users))
            '/[\'"][^\'"]+[\'"]\s*=>new\s+ResourceCollection\s*\(\s*(\w+Resource)::collection/i' => true,
            
            // Chainable collection: return (new UserResource($user))->additional(...)
            '/[\'"][^\'"]+[\'"]\s*=>\s*\(\s*new\s+(\w+Resource)\s*\(/i' => false
        ];
        
        // Check each pattern
        foreach ($patterns as $pattern => $isCollection) {
            if (preg_match($pattern, $methodBody, $matches)) {
                $resource = explode(" => ", $matches[0]);
                $method['return_response_key'] = trim($resource[0], "'\" ");
                $resourceClass = $matches[1];
                $method['resource_class'] = $this->resolveClassName($resourceClass);
                if ($isCollection) {
                    $method['return_collection'] = true;
                }
                break;
            }
        }
        
        // If found a resource, try to load the file to make sure it exists
        if ($method['resource_class']) {
            $resourceShortName = basename(str_replace('\\', '/', $method['resource_class']));
            $resourcePathPattern = $this->getConfig('resource_path_pattern', 'app/Http/Resources');
            $resourcePath = $resourcePathPattern . '/' . $resourceShortName . '.php';
            
            echo "    Looking for class file at path: $resourcePath\n";
            if (file_exists($this->basePath($resourcePath))) {
                echo "    Found class file at: $resourcePath\n";
            }
        }
    }
    
    /**
     * Get the method body as a string
     *
     * @param ClassMethod $stmt The method statement
     * @return string The method body
     */
    private function getMethodBody(ClassMethod $stmt)
    {
        if (!$stmt->stmts) {
            return '';
        }
        
        $start = $stmt->stmts[0]->getStartFilePos();
        $end = end($stmt->stmts)->getEndFilePos();
        
        return substr($this->fileContent, $start, $end - $start);
    }
    
    /**
     * Guess the HTTP method based on the controller method name
     *
     * @param string $methodName The controller method name
     * @return string The HTTP method (GET, POST, PUT, DELETE)
     */
    private function guessHttpMethod($methodName)
    {
        $methodMappings = [
            'index' => 'GET',
            'show' => 'GET',
            'create' => 'GET',
            'store' => 'POST',
            'edit' => 'GET',
            'update' => 'PUT',
            'destroy' => 'DELETE'
        ];
        
        return $methodMappings[$methodName] ?? 'GET';
    }
    
    /**
     * Guess the route based on the controller method name
     *
     * @param string $methodName The controller method name
     * @return string The route pattern
     */
    private function guessRoute($methodName)
    {
        $routeMappings = [
            'index' => '/',
            'show' => '/{id}',
            'create' => '/create',
            'store' => '/',
            'edit' => '/{id}/edit',
            'update' => '/{id}',
            'destroy' => '/{id}'
        ];
        
        return $routeMappings[$methodName] ?? '/';
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
                return 'Example value';
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
}
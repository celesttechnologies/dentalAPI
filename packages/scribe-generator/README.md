# Laravel Scribe Generator

Automatically generate Scribe-compatible PHPDoc comments for Laravel controllers by extracting validation rules from FormRequests and structure from JsonResources.

## Features

- Analyzes Laravel controller files to identify API endpoints
- Extracts validation rules from FormRequest classes
- Generates human-readable @bodyParam annotations with type, required status, and examples
- Creates resource structure documentation from JsonResource classes
- Adds proper HTTP method and route documentation
- Provides smart examples for different data types
- Preserves existing docblocks that don't need updating

## Installation

You can install the package via composer:

```bash
composer require your-vendor/scribe-generator
```

## Publish the configuration

```bash
php artisan vendor:publish --provider="YourVendor\ScribeGenerator\ScribeGeneratorServiceProvider" --tag="config"
```

## Usage

### Via Artisan Command

```bash
# Generate documentation for all controllers
php artisan scribe:generate-docs

# Generate documentation for a specific controller
php artisan scribe:generate-docs app/Http/Controllers/UserController.php

# Generate documentation for all controllers in a directory
php artisan scribe:generate-docs app/Http/Controllers/Api
```

### Generated Documentation

This tool generates PHPDoc comments in your controller files that are compatible with the [Scribe API Documentation Generator](https://scribe.knuckles.wtf/laravel). Once you've added these comments, you can use Scribe to generate your API documentation as usual.

```bash
php artisan scribe:generate
```

## Example

For a controller method like:

```php
public function store(UserStoreRequest $request)
{
    $userData = $request->validated();
    $user = User::create($userData);
    return new UserResource($user);
}
```

The tool will generate PHPDoc comments like:

```php
/**
 * @group Users
 *
 * @method POST
 *
 * Create a new user
 *
 * @post /
 *
 * @bodyParam name string required. Maximum length: 255. Example: "John Doe"
 * @bodyParam email string required. Must be a valid email address. Must be unique. Example: "user@example.com"
 * @bodyParam password string required. Minimum length: 8. Requires confirmation field. Example: "password123"
 * @bodyParam role string optional. Allowed values: admin,user,guest. Example: "user"
 * @bodyParam active boolean optional. Example: true
 *
 * @response 201 scenario="Success" {
 *     {
 *         "data": {
 *             "id": 1,
 *             "name": "John Doe",
 *             "email": "user@example.com",
 *             "created_at": "2023-01-01 00:00:00",
 *             "updated_at": "2023-01-01 00:00:00"
 *         }
 *     }
 * }
 *
 * @response 400 {"message": "Validation error", "errors": {"field": ["Error message"]}}
 * @response 500 {"message": "Internal server error"}
 *
 * @return UserResource
 */
```

## Configuration

You can configure the package by editing the `config/scribe-generator.php` file:

```php
return [
    // Where to look for controller files
    'controller_paths' => [
        app_path('Http/Controllers'),
    ],
    
    // Where to look for Resource files
    'resource_path_pattern' => 'app/Http/Resources',
    
    // Where to look for FormRequest files
    'request_path_pattern' => 'app/Http/Requests',
    
    // Custom example values for commonly used fields
    'example_values' => [
        'name' => 'John Doe',
        'email' => 'user@example.com',
        'password' => 'secret123',
        // Add your own custom examples here
    ],
];
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
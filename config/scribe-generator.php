<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Controller Paths
    |--------------------------------------------------------------------------
    |
    | This value determines where the generator will look for controller files.
    | By default, it will look in the standard Laravel controllers directory.
    |
    */
    'controller_paths' => [
        app_path('Http/Controllers'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Resource Path Pattern
    |--------------------------------------------------------------------------
    |
    | This pattern is used to locate Resource classes based on controller method return types.
    |
    */
    'resource_path_pattern' => 'app/Http/Resources',

    /*
    |--------------------------------------------------------------------------
    | Request Path Pattern
    |--------------------------------------------------------------------------
    |
    | This pattern is used to locate FormRequest classes used in controller methods.
    |
    */
    'request_path_pattern' => 'app/Http/Requests',

    /*
    |--------------------------------------------------------------------------
    | Example Values
    |--------------------------------------------------------------------------
    |
    | Here you can define custom example values for common field names.
    |
    */
    'example_values' => [
        'name' => 'John Doe',
        'email' => 'user@example.com',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'role' => 'user',
        'active' => true,
        'id' => 1
    ],
];
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TelescopeBasicAuth
{
    public function handle(Request $request, Closure $next)
    {
        $username = env('TELESCOPE_USERNAME', 'telescope');
        $password = env('TELESCOPE_PASSWORD', 'VeryStrongHash@123');

        // Check if Authorization header is present
        if (!$request->hasHeader('Authorization')) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic realm="Laravel Telescope"']);
        }

        // Parse the Authorization header
        $header = $request->header('Authorization');
        if (strpos($header, 'Basic ') !== 0) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic realm="Laravel Telescope"']);
        }

        // Decode the credentials
        $credentials = base64_decode(str_replace('Basic ', '', $header));
        [$inputUsername, $inputPassword] = explode(':', $credentials, 2);

        // Validate credentials
        if ($inputUsername !== $username || $inputPassword !== $password) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic realm="Laravel Telescope"']);
        }

        return $next($request);
    }
}
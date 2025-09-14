<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class DoctorScopeMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->role && strtolower($user->role->RoleName) === 'doctor') {
            // Attach doctor_id to request for use in controllers/services
            $request->merge(['doctor_id' => $user->UserID]);
        }
        return $next($request);
    }
}

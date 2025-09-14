<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureJsonAcceptHeader
{
  public function handle(Request $request, Closure $next)
  {
    // Check if Accept header is missing or not set to application/json
    if (!$request->headers->has('Accept') || $request->header('Accept') !== 'application/json') {
      $request->headers->set('Accept', 'application/json');
    }

    return $next($request);
  }
}

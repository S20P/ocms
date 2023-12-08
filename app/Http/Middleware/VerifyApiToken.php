<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          // Get the value of the "X-Api-Token" header
          $apiToken = $request->header('token');

          // Define your static secure string token
          $secureToken = '$10$aW0hxEdTyjkwMucnAdH1QuoQkAKYmuDmbbVffx4a5AuvPEgrdwEO6';
  
          // Check if the token in the header matches the static token
          if ($apiToken !== $secureToken) {
              // Unauthorized response if tokens do not match
              return response()->json(['error' => 'Unauthorized'], 401);
          }
  
          // Continue with the request if the token is valid
          return $next($request);
    }
}

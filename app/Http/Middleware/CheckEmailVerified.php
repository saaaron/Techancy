<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and their email is not verified
        if (Auth::check() && Auth::user()->email_verified === 'no') {
            return redirect()->route('emailVerifyNotice'); // Redirect to email verification notice page
        }

        return $next($request);
    }
}

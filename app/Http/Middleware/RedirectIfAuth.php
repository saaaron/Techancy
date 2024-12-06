<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // If authenticated, redirect to dashboard unless already on it
            if ($request->path() !== 'd/home') {
                return redirect('d/home');
            }
        } elseif ($request->hasCookie('keep_me_logged_in')) {
            // If the "keep me logged in" cookie exists, redirect to dashboard
            return redirect('d/home');
        }

        return $next($request);
    }
}

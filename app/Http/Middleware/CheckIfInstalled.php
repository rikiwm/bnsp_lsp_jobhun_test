<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!file_exists(base_path('.env')) || env('DB_DATABASE') === null) {
            if (!$request->is('install*')) {
                return redirect('/install');
            }
        }

        return $next($request);
    }
}

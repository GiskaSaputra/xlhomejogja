<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleAdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('admin_authenticated')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}

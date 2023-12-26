<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewGuest
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

    $routeName = $request->route()->getName();

    $excludedRoutes = [
        'index-laporan',
        'index-announs',
        'search',
        'index-status',
        'store-complaint',
        'show-announs'
    ];

    if (!in_array($routeName, $excludedRoutes)) {
        return redirect()->route('login');
    }

    return $next($request);
    }
}
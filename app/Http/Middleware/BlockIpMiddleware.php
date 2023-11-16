<?php

namespace App\Http\Middleware;

use App\Models\IpAddress;
use Closure;
use Illuminate\Http\Request;

class BlockIpMiddleware
{

    public $blockIps;

    public function __construct()
    {
         $this->blockIps = IpAddress::pluck('ip')->map(fn ($ip) => trim($ip))->toArray();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->ip(), $this->blockIps)) {
            abort(403, "You are restricted to access the site.");
        }

        return $next($request);
    }
}
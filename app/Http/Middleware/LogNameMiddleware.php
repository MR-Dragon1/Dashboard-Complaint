<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class LogNameMiddleware
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
       $userIpAddress = $request->ip();

        Activity::creating(function (Activity $activity) use ($userIpAddress) {
            $activity->log_name = $userIpAddress;
        });

        return $next($request);
    }
}
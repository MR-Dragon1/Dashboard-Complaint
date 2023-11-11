<?php

namespace App\Http\Middleware;

use App\Models\UserActivity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogUserActivity
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
    if (Auth::check()) {
        if ($request->is('logout')) {
            UserActivity::create([
                'causer_id' => Auth::user()->id,
                'subject_id' => Auth::user()->id,
                'log_name' => $request->ip(),
                'description' => 'Logout',
            ]);
        }elseif (!session('activity_recorded')) {
        UserActivity::create([
            'causer_id' => Auth::user()->id,
            'subject_id' => Auth::user()->id,
            'log_name' => $request->ip(),
            'description' => 'Login',
        ]);
        session(['activity_recorded' => true]);
        }
    }


    return $next($request);
}


}
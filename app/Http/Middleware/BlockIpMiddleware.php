<?php

namespace App\Http\Middleware;

use App\Models\IpAddress;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BlockIpMiddleware
{

    public function handle(Request $request, Closure $next)
{
    $userIpAddress = $request->ip();
    $userId = Auth::id();

    $allowedIpAddresses = IpAddress::where('user_id', $userId)->value('ip');

    if ($allowedIpAddresses) {
        $allowedIpArray = explode(',', $allowedIpAddresses);

        // Memeriksa apakah alamat IP saat ini ada di dalam array yang diizinkan
        foreach ($allowedIpArray as $allowedIp) {
            if ($userIpAddress === trim($allowedIp)) {
                return $next($request);
            }
        }
    }
    auth()->logout();
    return Redirect::back()->with('error-login', 'You are restricted to access the site from this IP address');
}

}
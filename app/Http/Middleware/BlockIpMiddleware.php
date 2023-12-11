<?php

namespace App\Http\Middleware;

use App\Models\IpAddress;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BlockIpMiddleware
{

    public function handle(Request $request, Closure $next) {
        $userIpAddress = getUserIP();
        $userId = Auth::id();

        // return dd($userId);

        $allowedIpAddresses = IpAddress::where('user_id', $userId)->value('ip');

        $allowedIpAddresses = $allowedIpAddresses ? explode(',', $allowedIpAddresses) : [];

        if (in_array($userIpAddress, $allowedIpAddresses)) return $next($request);

        return dd([
            "ipbaca" => $userIpAddress,
            "ipdb" => $allowedIpAddresses,
            "check" => in_array($userIpAddress, $allowedIpAddresses)
        ]);

        auth()->logout();
        return redirect('/login')->with('error-login', 'You are restricted to access the site from this IP address');
    }

}

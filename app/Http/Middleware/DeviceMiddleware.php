<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;
use Auth;

class DeviceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        // Check if the device is mobile
        if ($agent->isMobile()) {
            Auth::logout();
            session()->forget('loggedIn');
            return redirect('/')->with('error', 'This application is only accessible from desktop or tablet devices.');
        }
        return $next($request);
    }
}

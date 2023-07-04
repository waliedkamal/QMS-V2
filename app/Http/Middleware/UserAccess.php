<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->check()) {
            return $next($request);
            
        }

        if (Auth::guard('admin')->check())  {

            return $next($request);
        }        
        

        if (Auth::guard('employee')->check()) {
            return $next($request);
        }

        if (Auth::guard('auidtor')->check()) {
            return $next($request);
        }

        if (Auth::guard('trainer')->check()) {
            return $next($request);
        }



        return response()->json(['You do not have permission to access for this page.']);

        /* return response()->view('errors.check-permission'); */

       
    }
}

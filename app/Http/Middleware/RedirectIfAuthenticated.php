<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next )
    {

        

        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {

        //     if ($guard == "admin" && Auth::guard($guard)->check()) {
        //         return redirect('/admin/dashboard');
        //     }

        //     if ($guard == "employee" && Auth::guard($guard)->check()) {
        //         return redirect('/employee/dashboard');
        //     }

        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        // return $next($request);
    






        if (auth('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        if (auth('admin')->check()) {
            return redirect()->route('admindashboard');
        }
        

        if (auth('employee')->check()) {
            return redirect(RouteServiceProvider::EMPLOYEE);
        }
        
        if (auth('auidtor')->check()) {
            return redirect(RouteServiceProvider::AUIDTOR);
        }

        if (auth('trainer')->check()) {
            return redirect(RouteServiceProvider::TRAINER);
        }

       

        return $next($request);
    
    }

    
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
       if (!$request->expectsJson()){

             if (Request::is('admin/dashboard')) {
                 route('selection');
            } elseif (Request::is('employee/dashboard')) {
                 route('selection');
            } elseif (Request::is('auidtor/dashboard')) {

            } elseif (Request::is( 'tranier/dashboard')) {
                 route('selection');
            } else {
                route('selection');
            }

       }
    }
}

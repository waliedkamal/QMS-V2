<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'employee'){
            $guardName= 'employee';
        }
        elseif ($request->type == 'auidtor'){
            $guardName= 'auidtor';
        }
        elseif ($request->type == 'trainer'){
            $guardName= 'trainer';
        } 
        elseif ($request->type == 'admin') {
            $guardName = 'admin';
        }
        else{
            $guardName= 'web';
        }

        // dd($guardName);
        return $guardName;
    }

    public function redirect($request){

        
        if($request->type == 'employee'){
            return redirect()->intended(RouteServiceProvider::EMPLOYEE);
        }
        elseif ($request->type == 'auditor'){
            return redirect()->intended('/employee/dashboard');
        }
        elseif ($request->type == 'trainer'){
            return redirect()->intended('/employee/dashboard');
        } 
        elseif ($request->type == 'admin') {
            return redirect()->intended('/admin/dashboard');
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}

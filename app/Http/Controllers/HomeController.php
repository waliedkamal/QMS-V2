<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        return view('admin.layouts.admin.dashboard');
    }


    public function admindashboard(){


        return view('admin.layouts.employee.dashboard');
    }
}

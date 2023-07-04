<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('selection');

// Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clienttest', function () {
    return view('admin.layouts.client.dashboard');
});

Route::get('/employee/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

//=================================================auth=============================

Route::group(['namespace' => 'Auth'], function () {
//login form
Route::get('/login/{type}', [LoginController::class,'loginForm'])->middleware('guest')->name('login.show');
Route::match(['get', 'post'],'/login', [LoginController::class, 'login'])->name('login');

Route::get('/register1',[RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register1', [RegisterController::class,'register']);

Route::get('/logout/{type}', [LoginController::class,'logout'])->name('logout');

});


//===================================table===============

Route::get('/department',[DepartmentController::class , 'index']);
Route::post('/department',[DepartmentController::class , 'saveRecordDepartment'])->name('saveRecordDepartment');
Route::post('department/update', [DepartmentController::class,'updateRecordDepartment'])->name('updateRecordDepartment');    
Route::post('department/delete', [DepartmentController::class, 'deleteRecordDepartment'])->name('deleteRecordDepartment');    
Route::get('role', [RoleController::class]);

route::get('/department',[DepartmentController::class, 'index']);

route::view('register','livewire.show_form');



//=======================Admin Gaurd=================

// Admin routes
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::post('/employee', [EmployeeController::class, 'saveRecord'])->name('employee.save');
    Route::get('/employee/{id}', [EmployeeController::class, 'deleteRecord'])->name('employee.deleteRecord');
    Route::get('/admin/dashboard',[HomeController::class, 'admindashboard'])->name('admindashboard');
});

//================================employee==================================

// Route::group(['middleware' => ['auth:employee']], function () {



// });
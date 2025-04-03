<?php

use App\Http\Controllers\Backend\AdminauthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// here is is Admin rotue list
Route::group(['middleware'=>'Admin'],function(){
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');
});

// here is is Admin login rotue list
Route::get('login', [AdminauthController::class, 'login'])->name('login');
// here is is Admin login rotue list
Route::post('/', [AdminauthController::class, 'auth_login'])->name('auth_login');


// here is is role rotue list
Route::group(['middleware'=>'Admin'],function(){
    Route::resource('role', RoleController::class);
});

// ==============================
// ✅ User Management Routes
// ✅ Only Accessible by Admin Middleware
// ==============================
Route::group(['middleware'=>'Admin'],function(){
    Route::resource('user', UserController::class);
});    


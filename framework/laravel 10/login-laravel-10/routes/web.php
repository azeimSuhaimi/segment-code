<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\userController;

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('layouts/app');
});
*/

//Route::get('/', [indexController::class, 'index']);

 
Route::controller(indexController::class)->group(function () {
    Route::get('/', 'index');
    
});

Route::controller(authController::class)->group(function () {

    Route::get('/auth','index')->name('auth')->middleware('guest');
    Route::post('/auth','login')->name('auth.login')->middleware('guest');

    Route::post('/logout','logout')->name('auth.logout')->middleware('auth');

    Route::get('/forgot_password', 'forgot_password')->name('forgot_password')->middleware('guest');
    Route::post('/forgot_password', 'forgot_password_email')->name('forgot_password.email')->middleware('guest');

    Route::get('/reset','reset')->name('reset')->middleware('guest');
    Route::post('/reset','reset_password')->name('reset.password')->middleware('guest');

    Route::get('/register','register')->name('register')->middleware('guest');
    Route::post('/register','register_user')->name('register.user')->middleware('guest');

    Route::get('/varify_user','varify_user')->middleware('guest');

   
    
});

Route::controller(userController::class)->group(function () {
   
    Route::get('/change_password','change_password')->name('user.change_password')->middleware('auth');
    Route::post('/change_password','change_password_process')->name('user.change_password_process')->middleware('auth');
    
    Route::get('/profile','profile')->name('user.profile')->middleware('auth');
    Route::post('/profile_image','profile_image')->name('user.profile_image')->middleware('auth');
    Route::post('/edit_profile','edit_profile')->name('user.edit_profile')->middleware('auth');
    Route::get('/activity_log','activity_log')->name('user.activity_log')->middleware('auth');
    Route::get('/roles','roles')->name('user.roles')->middleware(['auth','is_admin']);
    Route::get('/show_roles','show_roles')->name('user.show.roles')->middleware('auth');
    Route::post('/edit_roles','edit_roles')->name('user.edit.roles')->middleware('auth');
});

Route::controller(dashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('auth');
    
});

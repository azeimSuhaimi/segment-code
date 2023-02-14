<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [indexController::class, 'index']);

Route::get('/auth', [authController::class, 'index'])->name('login')->middleware('guest');

Route::post('/auth/login1', [authController::class, 'login1'])->middleware('guest')->name('login1');

Route::post('login2', [authController::class, 'login2'])->middleware('guest')->name('login2');

Route::post('/logout', [authController::class, 'logout'])->middleware('auth');

Route::get('/change_password', [authController::class, 'change_password'])->middleware('auth');
Route::post('/change_password_process', [authController::class, 'change_password_process'])->middleware('auth');

Route::get('/register', [authController::class, 'create'])->middleware('guest');
Route::post('/register_user', [authController::class, 'store'])->middleware('guest');

Route::get('/forgot_password', [authController::class, 'forgot_password'])->middleware('guest');
Route::post('/forgot_password_email', [authController::class, 'forgot_password_email'])->middleware('guest');

Route::get('/reset', [authController::class, 'reset'])->middleware('guest');;
Route::post('/reset_process', [authController::class, 'reset_process'])->middleware('guest');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'role']);

Route::get('/varify_user', [authController::class, 'varify_user'])->middleware('guest');

Route::get('/varify_user', [authController::class, 'varify_user'])->middleware('guest');

Route::get('/roles', [dashboardController::class, 'roles'])->middleware(['auth', 'role']);
Route::post('/roles', [dashboardController::class, 'roles_edit_user'])->middleware(['auth', 'role']);

Route::get('/log', [dashboardController::class, 'log_activity'])->middleware('auth');

Route::get('/profile', [dashboardController::class, 'profile'])->middleware('auth');

Route::post('/profile_image', [dashboardController::class, 'profile_image'])->middleware('auth');

Route::post('/edit_profile', [dashboardController::class, 'edit_profile'])->middleware('auth');


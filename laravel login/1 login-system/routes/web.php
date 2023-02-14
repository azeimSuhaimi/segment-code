<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;
use App\Http\Controllers\indexController;
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

Route::get('/auth', [authController::class, 'index']);
Route::post('/auth/login', [authController::class, 'login_page']);
Route::get('/logout', [authController::class, 'logout']);

Route::get('/change_password', [authController::class, 'change_password']);
Route::post('/change_password_process', [authController::class, 'change_password_process']);

Route::get('/register', [authController::class, 'create']);
Route::post('/register_user', [authController::class, 'store']);

Route::get('/forgot_password', [authController::class, 'forgot_password']);
Route::post('/forgot_password_email', [authController::class, 'forgot_password_email']);

Route::get('/reset', [authController::class, 'reset']);
Route::post('/reset_process', [authController::class, 'reset_process']);
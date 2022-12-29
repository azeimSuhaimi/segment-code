<?php

namespace App\Http\Controllers;

//use App\Http\Controller\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::view('/login','auth.index',[]);
Route::get('users/{id}', [AuthController::class,'index']);


Route::get('/', function () {
    return view('auth.index');
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    //
    public function index($id = ''){
        return view('auth.index');
    }

    public function logout()
{
    Auth::logout();

    return redirect()->route('login');
}
}

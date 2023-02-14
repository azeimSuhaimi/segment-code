<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use App\Mail\forgot_password;
use Illuminate\Support\Facades\Mail;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('forgot_password')->where('token_expired','<' , time())->delete();

        return view('auth.login');
    }

    public function login_page(Request $request)
    {
        $remenber = $request->input('remenber');

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');
        $users = DB::table('users')->where('email', $validated['email'])->get();

        if (Auth::attempt($validated, $remember)) {
            $request->session()->regenerate();
            //return redirect()->intended('dashboard');

            switch ($users->first()->role) {
                case '1':
                    return redirect()->intended('dashboard');
                    break;
                case '2':
                    return redirect()->intended('/');
                    break;
                default:
                    return redirect('/logout');
            

                }
        }


        return redirect('/auth')->with('error','accout or password wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     

        return redirect('/auth')->with('success','logout');
    }


    public function change_password()
    {
        return view('auth.change_password');
    }

    public function change_password_process(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
            'password1' => 'required|min:4',
            'password2' => 'required|min:4|same:password1',
        ]);

        if (! Hash::check($validated['password'], $request->user()->password)) {

            return redirect('/change_password')->with('error','current password not match');
        }

        $pass = Hash::make($validated['password1']);
        DB::table('users')->where('email',  auth()->user()->email)->update(['password' => $pass]);

        $request->session()->passwordConfirmed();
    
        return redirect()->intended('/change_password');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                $validated = $request->validate([
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required|numeric',
                    'name' => 'required|string',
                    'password1' => 'required|min:8|',
                    'password2' => 'required|min:8|same:password1',
                ]);

                DB::table('users')->insert([
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'name' => $validated['name'],
                    'password' => Hash::make($validated['password1']),
                    'picture' => 'empty.png',
                    'access' => '',
                    'role' => 2
                ]);

                return redirect('/register')->with('success','success register');
    }

    public function forgot_password()
    {
        return view('auth.forgot_password');
    }

    public function forgot_password_email(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:forgot_password,email',
        ]);

        $token_data = Str::random(32);
        $token = Hash::make($token_data);
        $domain = url('/');

        DB::table('forgot_password')->insert([
            'email' => $validated['email'],
            'token' => $token,
            'token_expired' => time() + 60 *2,
        ]);

        Mail::to($validated['email'])->send(new forgot_password($validated['email'],$token_data,$domain));

//        return response('Email sent');

        return redirect('/forgot_password')->with('success','check email for reset password');
    }

    public function reset(Request $request)
    {   
        if (!$request->has('token') && !$request->has('email')) {
            return redirect('/auth');
        }

        $token = $request->input('token');
        $email = $request->input('email');

        $users = DB::table('forgot_password')->where('email', $email)->get()->first();

        if($users)
        {
            if(Hash::check($token, $users->token) && $users->token_expired >= time())
            {
                return view('auth.reset_forgot_password', ['email' => $email]);
            }
            return redirect('/auth')->with('error','token is expired try again later');
        }

        return redirect('/auth');


    }

    public function reset_process(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password1' => 'required|min:8',
            'password2' => 'required|min:8|same:password1',
        ]);

        //$users = DB::table('users')->where('email', $validated['email'])->get();

        $pass = Hash::make($validated['password1']);
        DB::table('users')->where('email',  $validated['email'])->update(['password' => $pass]);

        DB::table('forgot_password')->where('email', $validated['email'])->delete();

        return redirect('/auth')->with('success','password change');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

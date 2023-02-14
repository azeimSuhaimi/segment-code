<?php

//use App\ActivityLog;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity_log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity_log = new activity_log;
        $result = $activity_log->record_activity('view dashboard');
        //
        $this->authorize('view_dashboard'); // buang middleware role dulu kalu nak tengok jadi atau tak
    }

    public function roles()
    {
        $users = DB::table('users')->where('email','!=' , 'abu22@gmail.com')->get();
        $roles = DB::table('role_permissions')->get();
        return view('dashboard.roles',['roles' => $roles,'users' => $users]);
    }

    public function roles_edit_user(Request $request)
    {
        if($request->has('role') == '')
        {
            $roles = '';
            DB::table('users')->where('email', $request->input('email'))->update(['access' => $roles]);
            return redirect('/roles')->with('error','access is empty now');
        }

        $activity_log = new activity_log;
        $result = $activity_log->record_activity('edit user role '.$request->input('email'));

        $roles = $request->input('role');

        $roles = implode(',', $roles);

        DB::table('users')->where('email', $request->input('email'))->update(['access' => $roles]);

        return redirect('/roles')->with('error','current password not match');
    }

    public function log_activity()
    {
        $logs = auth()->user()->email;

        $logs = DB::table('activity_log')->where('email', auth()->user()->email)->get();

        return view('dashboard.logs',['logs' => $logs]);
    }


    public function profile()
    {
        return view('dashboard.profile');
    }

    public function profile_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
         }

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
    
            $file->move(public_path('images/'), $fileName);

            if(auth()->user()->picture != 'empty.png')
            {
                
                $filePath = public_path('images/'.auth()->user()->picture);

                if (File::exists($filePath)) {
                    File::delete($filePath);
                }

            }
    
            // you can store fileName to database here

            //Get the authenticated user
             auth()->user()->picture = $fileName;

             //auth()->user()->save();

            DB::table('users')->where('email',  auth()->user()->email)->update(['picture' => $fileName]);

            return redirect('/profile')->with('success',$fileName);
            
        }
    

        return redirect('/profile')->with('error','fail something wrong with images');
    }

    public function edit_profile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => [
                'required',Rule::unique('users')->ignore(auth()->user()->email,'email')],
            'phone' => 'required|numeric',
        ]);

        DB::table('users')->where('email',  auth()->user()->email)->update(['name' => $validated['name'],'email' => $validated['email'],'phone' => $validated['phone']]);

        auth()->user()->email = $validated['email'];
        auth()->user()->name = $validated['name'];
        auth()->user()->phone = $validated['phone'];

        return redirect('/profile')->with('success','dasdas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

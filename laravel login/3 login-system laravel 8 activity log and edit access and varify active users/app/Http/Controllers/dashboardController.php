<?php

//use App\ActivityLog;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity_log;
use Illuminate\Support\Facades\DB;

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

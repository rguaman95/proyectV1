<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use DB;

class UserAdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
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
        $id = Crypt::decryptString($id);
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decryptString($id);
        $user = User::find($id);
        $roles = Role::all();
        $userrol = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit',compact('user','roles','userrol'));
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
        $request->validate([
            'nameuser' => 'required',
            'emailuser' => 'required',
            'roluser' => 'required'
        ]);
        $id = Crypt::decryptString($id);
        $user = User::find($id);
        $roluser = crypt::decryptString($request->roluser);
        $user->name = $request->nameuser;
        $user->email = $request->emailuser;
        if(!empty($request->passworduser)){
            $user->password = bcrypt($request->passworduser);
        }
        $user->save();
        $user->syncRoles($roluser);
        return redirect()->route('useradmin.index')->with('success','Usuario correctamente actualizado');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use DB;

class RoleAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $roles = Role::with('permissions')->get();
        // echo "<pre>";
        // print_r($roles);
        // $role = Role::find(1);
        // $permission = Permission::find(5);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // exit;
        return view('admin.role.index',compact('roles',$roles));
    }

    public function show($id){
        $id = Crypt::decryptString($id);
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolepermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.role.show',compact('role','permissions','rolepermissions'));
    }

    public function create(){
        $permissions = Permission::All();
        return view('admin.role.create', compact('permissions',$permissions));
    }

    public function store(Request $request)
    {
        // DB::enableQueryLog(); 
        $request->validate([
            'rolename' => 'required'
        ]);
        $allPermissions = array_map(function($elemento){
            return Crypt::decryptString($elemento);
        },$request->permissions);
        $role = Role::create(['name' => $request->rolename]);
        // $permissions = Permission::whereIn('id',$allPermissions)->get();
        $role->syncPermissions($allPermissions);
        return redirect()->route('role.index')->with('success','Role correctamente actualizado');
    }

    public function edit($id){
        $id = Crypt::decryptString($id);
        $role = Role::find($id);
        $permissions = Permission::All();
        $rolepermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.role.edit',compact('role','permissions','rolepermissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rolename' => 'required'
        ]);
        $id = Crypt::decryptString($id);
        $role = Role::find($id);
        if($role){
            $role->name = $request->rolename;
            $role->save();
            $allPermissions = array_map(function($elemento){
                return Crypt::decryptString($elemento);
            },$request->permissions);
            $role->syncPermissions($allPermissions);
            return redirect()->route('role.index')->with('success','Role correctamente actualizado');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::create(['name' => 'Admin']);
        // $permission = Permission::create(['name' => 'Read Rol']);
        // $permission = Permission::create(['name' => 'Edit Rol']);
        // $permission = Permission::create(['name' => 'Delete Rol']);
        // exit;
        // $permissionNames = User::find(1)->hasAnyRole(Role::all());
        // echo "<pre>";
        // print_r($permissionNames);
        // exit;
        return view('home');
    }
}

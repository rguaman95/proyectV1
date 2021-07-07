<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\User;

class StartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('start/index');
    }

    // public function validation(Request $request)
    // {
    //     $data = array();
    //     $error = false;
    //     $msg = '';
    //     try {
    //         if(empty($request->email) || empty($request->password)){
    //             throw new Exception("Correo y contraseña son requeridos");
    //         }
    //         $user = User::where('email','=',$request->email)
    //                 ->first();
    //         if(empty($user)){
    //             throw new Exception("No se encontró con el correo ingresado");
    //         }
    //         $dbpassword = User::find($user->id)->password;
    //         $passcheck = Hash::check($request->password,$dbpassword);
    //         if(!$passcheck){
    //             throw new Exception("El correo o la contraseña son incorrectas");
    //         }
    //         $data = $user;
    //         // $user1 = array("email"=>$request->email,"password"=>$passCheck);
    //     } catch (Exception $e) {
    //         $msg = $e->getMessage();
    //         $error = true;
    //     }
    //     $data = array("error"=>$error,"msg"=>$msg,"data"=>$data);
    //     return response()->json($data);
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Login;

class LoginController extends Controller
{
    //

    public function index(Request $request){

        $email = $request->email;
        $password = $request->senha;
        
        $user = Login::where("email_docente",$email)->where("senha_docente",md5($password))->first();

        if(!$user){
            return response()->json(["error" => "Dados incorrectos"]);
        }

        return response()->json(["data" => $user]);
        
    }
}

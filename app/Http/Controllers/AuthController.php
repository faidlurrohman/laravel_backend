<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;  

class AuthController extends Controller
{
    public function index(){
        return User::all();
    }

    public function login(Request $request) {
        $name = $request->name;
        $password = $request->password;
        $matchData = ['name' => $name, 'password' => $password];
        $checkData = User::where($matchData)->first();
        if($checkData){
            return response()->json($checkData);
        }
        else{
            return response()->json('false');
        }
    }  

    public function register(Request $request) {  
        if (User::where('name', '=', $request->name)->exists()) {
            return response()->json(false);  
        } else{
            $user_register = User::create($request->all());  
            return response()->json($user_register, 201);  
        }
    }  
}

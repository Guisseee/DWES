<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends controller{
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data'=>$user, 'acces_token'=>$token, 'token_type'=>'Bearer']);
    }



public  function logout(){
    auth()->user()->tokens()->delete();
    return ['message' => 'Sesion Cerrada'];
}

    public function login(Request $request){
        $user= User::where('email', $request->email)->firstOrFail();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(['message'=>'Credenciales invalidas']);
        }

        $token= $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>'Hola'.$user->name,
        'access_token'=> $token,
        'token_type'=>'Bearer']);
    }
}

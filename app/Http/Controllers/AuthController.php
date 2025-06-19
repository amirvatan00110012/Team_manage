<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){

        
        $data = $request->validated();

        $user = User::create($data);

        return response()->json(compact('user'));
        
    }
    
    public function login(LoginRequest $request){

        $data = $request->validated();

        try {
            if(! $token = JWTAuth::attempt($data)){
                return response()->json(['error' => 'email or password is incorrect.' ,400]);
            }
        }
        catch(JWTException $err){
            return response()->json(['error' => 'could not create token'],500);
        }

        return response()->json(compact('token'));
        
    }


    public function refresh(){
        $token = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(compact('token'));
    }

    public function logout(){
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }
}

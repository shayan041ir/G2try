<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
class UserClontroller extends Controller
{
    public function register(Request $request){
        $user = $request->only('name','email','password');
        if(!empty($user['password'])){
            $user['password'] = bcrypt($user['password']);
        }

        $user = User::create($user);
        if($user)
        {
            return response()->json([
                'message' => 'user register success',
                $user
            ],201);
        }else{
            return response()->json([
                'message' => 'user register fail'
            ],400);
        }
    }
    public function login(Request $request){
        $credentials = $request->only('email','password');
        try {
            $token = JWTAuth::attempt($credentials);
            return Response()->json(['token' => $token],200);
        } catch (JWTException $e) {
            return response()->json($e,400);
        }
    }
}

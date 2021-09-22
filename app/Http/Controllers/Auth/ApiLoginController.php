<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    //
    public function login(Request $request){
        $credentials = $request->only('username','password');

        if(Auth::attempt($credentials)){
            $token = $request->user()->createToken($request->device);
            $user = auth()->user();
            $user->token = $token->plainTextToken;

            return response()->json($user);
        }
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['stt'=>'true']);
    }
}

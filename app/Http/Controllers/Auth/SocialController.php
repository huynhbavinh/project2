<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function processGoogleLogin()
    {
        $GoogleUser = Socialite::driver('google')->user();
        dd($GoogleUser);
        return view('login');
    }
}

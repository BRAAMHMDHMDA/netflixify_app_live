<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $provider_user = Socialite::driver($provider)->user();

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $provider_user->id,
            ])->first();

            if (!$user) {
                //create new user
                $user = User::create([
                    'name' => $provider_user->name,
                    'username' => Str::snake($provider_user->name),
                    'email' => $provider_user->email,
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $provider_user->id,
                    'provider_token' => $provider_user->token,
                ]);
            }

            Auth::guard('web')->login($user);

            return redirect()->route('home');
        }catch (\Throwable $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Login Failed',
            ]);
        }

    }
}

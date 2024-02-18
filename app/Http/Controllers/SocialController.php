<?php

namespace App\Http\Controllers;
use App\Models\SocialUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;


use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function auth () {
        return view('auth.social');
    }

    public function redirect(string $provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider) {
        $providerUser = Socialite::driver($provider)->user();

        $socialUser = SocialUser::firstOrCreate (
            [
                'provider' => 'facebook',
                'provider_user_id' => $providerUser->getId(),
            ],
            [
                'token'=> $providerUser->token,
            ]
        );

        if(!$socialUser->user_id) {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'password' => 'any_password',
            ]);
            $socialUser->user()->associate($user)->save();
        }

        Auth::LoginUsingId($socialUser->user_id);

        return redirect('/dashboard');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login($provider)
    {
        return $this->isAuthorized() ? redirect()->route('index') : Socialite::driver($provider)->redirect();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }

    public function callback($provider)
    {
        Auth::login($this->createOrFindUser(json_decode(json_encode(Socialite::driver($provider)->user())), $provider), true);

        return redirect()->route('index');
    }

    public function createOrFindUser($user_request, $provider)
    {
        $user_request = $user_request->user;

        return User::updateOrCreate([
            'user_id' => $user_request->id
        ], [
            'user_id' => $user_request->id, 'name' => $user_request->first_name . ' ' . $user_request->last_name,
            'avatar'  => $user_request->photo_200, 'email' => $user_request->email, 'ip' => \request()->ip(),
        ]);
    }
}

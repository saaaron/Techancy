<?php

namespace App\Http\Controllers;

use App\Events\GoogleAuthSignUp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Check if the user already exists
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // If user doesn't exist
            // Filter '@gmail.com' from the email to form a username
            $username = str_replace('@gmail.com', '', $googleUser->email);

            // genrate random password for user
            $password = rand(100000, 999999);

            // create a new user account
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make($password),
                'email_verified' => 'yes'
            ]);

            // create variable to send to event
            $username = $googleUser->name;
            $email = $googleUser->email;

            // Google auth sign up mail
            event(new GoogleAuthSignUp($username, $email, $password));
        }

        Auth::login($user);

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}

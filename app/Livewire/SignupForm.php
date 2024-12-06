<?php

namespace App\Livewire;

use App\Events\EmailVerify;
use App\Models\EmailVerifyTokens;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SignupForm extends Component
{
    public $name;
    public $email;
    public $password;

    public function signup_user() {
        $this->validate([
            'name' => 'required|min:1|max:30|regex:/^[a-zA-Z][a-zA-Z0-9\s]*$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:100'
        ],[
            // name validations
            'name.required' => 'Name is required',
            'name.min' => 'Name is too short',
            'name.max' => 'Name is too long', 
            'name.regex' => 'Only letters, numbers, and spaces are allowed',

            // email validations
            'email.required' => 'Email address is required',
            'email.email' => 'Email address is invalid',
            'email.unique' => '<b>'.$this->email.'</b> already in use',

            // password validations
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password is too long'
        ]);

        // retrieve data from the request
        $username = ucfirst($this->name); // username
        $email = $this->email; // email address
        $password = Hash::make($this->password); // password

        // email verify token
        do {
            $token = str()->random(50); // token
        } while (EmailVerifyTokens::where('token', $token)->exists()); // if token exist, regenerate

        // insert user info into db
        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => $password
        ]);

        // insert email verification token into db
        $verifyToken = EmailVerifyTokens::create([
            'email' => $email,
            'token' => $token
        ]);

        // email verify event
        event(new EmailVerify($username, $email, $token));

        // reset form
        $this->reset(['name','email','password']);

        // success msg
        request()->session()->flash("success", "Sign up was successful!");
    }

    public function render()
    {
        return view('livewire.signup-form');
    }
}

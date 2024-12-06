<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $keep_me_logged_in;

    public function login_user(){
        $this->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            // login validations
            'email.required' => 'Email address is required',
            'password.required' => 'Password is required',
        ]);
   
        $useremail = $this->email;
        $password = $this->password;
        $remember = $this->keep_me_logged_in; // Check if "Keep me logged in" is checked

        // Check if the username/email exists in the database
        $user = User::where('email', $useremail)->first();

        if ($user) {
            // User exists, now check if the password is correct
            if (Hash::check($password, $user->password)) {
                // If "Keep me logged in" is checked, set a cookie
                if ($remember) {
                    cookie()->queue('keep_me_logged_in', true, 43200); // 30 days cookie
                }
    
                // Log the user in and redirect to the dashboard
                Auth::login($user, $remember);
                return redirect()->intended('d/home');
            } else {
                // Password is incorrect
                request()->session()->flash("login_failed", "<b>Ops!</b> Incorrect password");
            }
        } else {
            // email does not exist
            request()->session()->flash("login_failed", "<b>Ops!</b> Email address does not exist");
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}

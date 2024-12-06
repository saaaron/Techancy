<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordForm extends Component
{
    public $password;

    public function change_password() {
        $this->validate([
            'password' => 'required|min:6|max:100'
        ],[
            // password validations
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password is too long'
        ]);

        // user id
        $user_id = auth()->user()->id;
        
        // Retrieve the old password (hashed) from the database
        $oldPassword = auth()->user()->password;

        if (Hash::check($this->password, $oldPassword)) {
            // no changes msg
            request()->session()->flash("no_changes", "Your new Password must be different from your old password");
        } else {
            // retrieve data from the request
            $newPassword = Hash::make($this->password); // new password

            // update user info into db
            User::where('id', $user_id)->update([
                'password' => $newPassword
            ]);

            // reset form
            $this->reset(['password']);

            // success msg
            request()->session()->flash("success", "Password changed successfully!");
        }
    }

    public function render()
    {
        return view('livewire.change-password-form');
    }
}

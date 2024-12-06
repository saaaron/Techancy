<?php

namespace App\Livewire;

use App\Events\ResetPassword;
use App\Models\PasswordResetTokens;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ForgotPasswordForm extends Component
{
    public $email;

    public function pro_forgot_password() {
        // Validate incoming request data
        $this->validate([
            'email' => 'required|email',
        ],[
            // email validations
            'email.required' => "Email address is required",
            'email.email' => "Email address is invalid"
        ]);

        // Retrieve data from the request
        $email = $this->email; // email address

        // check if email address exist in db
        $emailExist = User::where('email', $email)->exists();
        if ($emailExist == false) {
            // error message
            // return redirect()->back()->with(['forgot_pass_emsg' => 'No account found with the email address']);
            request()->session()->flash("failed", "No account found with the email address");
        } else { // if email exist, check if token exist before sending reset password link to email address
            $last_token_created_time = PasswordResetTokens::where('email', $email)->value('created_at');

            if ($last_token_created_time !== null) { // token exist
                // Check if the last token creation time is more than 5 minutes ago
                if (Carbon::parse($last_token_created_time)->diffInMinutes(now()) > 5) {
                    // forogot password token
                    do {
                        $token = str()->random(50); // token
                    } while (PasswordResetTokens::where('token', $token)->exists()); // if token exist, regenerate

                    // update token with user's email address in db
                    PasswordResetTokens::where('email', $email)->update([
                        'token' => $token,
                        'created_at' => now() // Update created_at to the current time
                    ]);

                    // Retrieve the username from the db
                    $username = User::where('email', $email)->value('name');

                    // Reset password event
                    event(new ResetPassword($username, $email, $token));
                    
                    // success msg
                    request()->session()->flash("success", "Reset password link has been sent to your email successfully!");
                } else {
                    // wait msg
                    request()->session()->flash("wait", "A link has already been sent to your email, you can only request for another after 5 minutes");
                }
            } else {
                // forogot password token
                do {
                    $token = str()->random(50); // token
                } while (PasswordResetTokens::where('token', $token)->exists()); // if token exist, regenerate

                // insert token into db
                PasswordResetTokens::create([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => now() // Set created_at to the current time
                ]);

                // Retrieve the username from the db
                $username = User::where('email', $email)->value('name');

                // Reset password event
                event(new ResetPassword($username, $email, $token));

                // reset form
                $this->reset(['email']);

                // return to the form with an error message
                request()->session()->flash("success", "Reset password link has been sent to your email successfully!");
            }
        }
    }

    public function render()
    {
        return view('livewire.forgot-password-form');
    }
}

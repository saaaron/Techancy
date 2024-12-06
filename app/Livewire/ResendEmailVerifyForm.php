<?php

namespace App\Livewire;

use App\Events\EmailVerify;
use App\Models\EmailVerifyTokens;
use Carbon\Carbon;
use Livewire\Component;

class ResendEmailVerifyForm extends Component
{
    public function resend_verify_email() {
        // user's info
        $username = auth()->user()->name;
        $email = auth()->user()->email;

        $last_token_created_time = EmailVerifyTokens::where('email', $email)->value('created_at');

        if ($last_token_created_time !== null) { // token exist
            // Check if the last token creation time is more than 5 minutes ago
            if (Carbon::parse($last_token_created_time)->diffInMinutes(now()) > 5) {
                // Change email address token
                do {
                    $token = str()->random(50); // token
                } while (EmailVerifyTokens::where('token', $token)->exists()); // if token exist, regenerate

                // update token with user's email address in db
                $changeEmailAddrToken = EmailVerifyTokens::where('email', $email)->update([
                    'token' => $token,
                    'created_at' => now() // Update created_at to the current time
                ]);

                // Change email address event
                event(new EmailVerify($username, $email, $token));
                
                // success msg
                request()->session()->flash("success", "Verification email has been sent to your mail successfully!");
            } else {
                // wait msg
                request()->session()->flash("wait", "Verification email has been sent to your mail, you can only request for another after 5 minutes");
            }
        }
    }

    public function render()
    {
        return view('livewire.resend-email-verify-form');
    }
}

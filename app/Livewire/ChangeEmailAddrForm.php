<?php

namespace App\Livewire;

use App\Events\ChangeEmailAddr;
use App\Models\EmailResetTokens;
use Carbon\Carbon;
use Livewire\Component;

class ChangeEmailAddrForm extends Component
{
    public function change_email_addr() {
        // user's info
        $username = auth()->user()->name;
        $email = auth()->user()->email;

        $last_token_created_time = EmailResetTokens::where('email', $email)->value('created_at');

        if ($last_token_created_time !== null) { // token exist
            // Check if the last token creation time is more than 5 minutes ago
            if (Carbon::parse($last_token_created_time)->diffInMinutes(now()) > 5) {
                // Change email address token
                do {
                    $token = str()->random(50); // token
                } while (EmailResetTokens::where('token', $token)->exists()); // if token exist, regenerate

                // update token with user's email address in db
                $changeEmailAddrToken = EmailResetTokens::where('email', $email)->update([
                    'token' => $token,
                    'created_at' => now() // Update created_at to the current time
                ]);

                // Change email address event
                event(new ChangeEmailAddr($username, $email, $token));
                
                // success msg
                request()->session()->flash("success", "A link has been sent to your email successfully!");
            } else {
                // wait msg
                request()->session()->flash("wait", "A link has already been sent to your email, you can only request for another after 5 minutes");
            }
        } else { // token does not exist
            // Change email address token
            do {
                $token = str()->random(50); // token
            } while (EmailResetTokens::where('token', $token)->exists()); // if token exist, regenerate

            // insert email addr and change email address token into db
            $changeEmailAddrToken = EmailResetTokens::create([
                'email' => $email,
                'token' => $token,
                'created_at' => now() // Set created_at to the current time
            ]);

            // Change email address event
            event(new ChangeEmailAddr($username, $email, $token));
            
            // success msg
            request()->session()->flash("success", "A link has been sent to your email successfully!");
        }
    }

    public function render()
    {
        return view('livewire.change-email-addr-form');
    }
}

<?php

namespace App\Livewire;

use App\Events\DeleteAcct;
use App\Models\DeleteAcctTokens;
use Carbon\Carbon;
use Livewire\Component;

class DeleteAcctForm extends Component
{
    public function delete_acct() {
        // user's info
        $username = auth()->user()->name;
        $email = auth()->user()->email;

        $last_token_created_time = DeleteAcctTokens::where('email', $email)->value('created_at');

        if ($last_token_created_time !== null) { // token exist
            // Check if the last token creation time is more than 5 minutes ago
            if (Carbon::parse($last_token_created_time)->diffInMinutes(now()) > 5) {
                // Delete acct token
                do {
                    $token = str()->random(50); // token
                } while (DeleteAcctTokens::where('token', $token)->exists()); // if token exist, regenerate

                // update token with user's email address in db
                $deleteAcctToken = DeleteAcctTokens::where('email', $email)->update([
                    'token' => $token,
                    'created_at' => now() // Set created_at to the current time
                ]);

                // Delete acct event
                event(new DeleteAcct($username, $email, $token));
                
                // success msg
                request()->session()->flash("success", "A link has been sent to your email successfully!");
            } else {
                // wait msg
                request()->session()->flash("wait", "A link has already been sent to your email, you can only request for another after 5 minutes");
            }
        } else {
            // Delete acct token
            do {
                $token = str()->random(50); // token
            } while (DeleteAcctTokens::where('token', $token)->exists()); // if token exist, regenerate

            // insert email addr and delete acct token into db
            $deleteAcctToken = DeleteAcctTokens::create([
                'email' => $email,
                'token' => $token,
                'created_at' => now() // Set created_at to the current time
            ]);

            // Delete acct event
            event(new DeleteAcct($username, $email, $token));

            // success msg
            request()->session()->flash("success", "A link has been sent to your email successfully!");
        }
    }
    
    public function render()
    {
        return view('livewire.delete-acct-form');
    }
}

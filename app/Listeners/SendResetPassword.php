<?php

namespace App\Listeners;

use App\Events\ResetPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendResetPassword
{
    /**
     * Handle the event.
     */
    protected $username;
    protected $email;
    protected $token;

    public function handle(ResetPassword $event): void
    {
        $this->username = $event->username;
        $this->email = $event->email;
        $this->token = $event->token;

        $data = array('username' => $this->username, 'email' => $this->email, 'token' => $this->token);

        try {
            Mail::send('mails/reset_password_mail', $data, function($message) {
                $message->to($this->email, $this->username)->subject('Reset your password');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            // Log the error for troubleshooting
            Log::error('Failed to send reset password email', ['email' => $this->email, 'error' => $e->getMessage()]);
            
            // Notify user of error
            // Session::flash('forgot_pass_emsg', 'Failed to send reset password email. Please check your network connection and try again.');
            request()->session()->flash("mail_failed", "Failed to send reset password email. Please check your network connection and try again.");
        }
    }
}

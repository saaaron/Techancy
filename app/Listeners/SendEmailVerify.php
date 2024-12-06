<?php

namespace App\Listeners;

use App\Events\EmailVerify;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendEmailVerify
{
    /**
     * Handle the event.
     */
    protected $username;
    protected $email;
    protected $token;

    public function handle(EmailVerify $event): void
    {
        $this->username = $event->username;
        $this->email = $event->email;
        $this->token = $event->token;

        $data = array('username' => $this->username, 'email' => $this->email, 'token' => $this->token);
        
        try {
            Mail::send('mails/email_verify_mail', $data, function($message) {
                $message->to($this->email, $this->username)->subject('Verify your email address');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            // Log the error for troubleshooting
            Log::error('Failed to send verification email', ['email' => $this->email, 'error' => $e->getMessage()]);
            
            // Notify user of error
            // Session::flash('signup_msg', 'Failed to send verification email. Please check your network connection and try again.');
            request()->session()->flash("mail_failed", "Failed to send verification email. Please check your network connection and try again.");
        }
    }
}

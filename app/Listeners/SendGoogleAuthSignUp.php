<?php

namespace App\Listeners;

use App\Events\GoogleAuthSignUp;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendGoogleAuthSignUp
{
    /**
     * Handle the event.
     */
    protected $username;
    protected $email;
    protected $password;

    public function handle(GoogleAuthSignUp $event): void
    {
        $this->username = $event->username;
        $this->email = $event->email;
        $this->password = $event->password;

        $data = array('username' => $this->username, 'email' => $this->email, 'password' => $this->password);
        
        try {
            Mail::send('mails/google_auth_welcome_mail', $data, function($message) {
                $message->to($this->email, $this->username)->subject('Welcome to Techancy');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            // Log the error for troubleshooting
            Log::error('Failed to send welcome Email for Google auth', ['email' => $this->email, 'error' => $e->getMessage()]);
            
            // Notify user of error
            Session::flash('g_login_msg', 'Sign up failed! Please check your network connection and try again.');
        }
    }
}

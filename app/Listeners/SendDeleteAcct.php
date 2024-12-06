<?php

namespace App\Listeners;

use App\Events\DeleteAcct;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendDeleteAcct
{
    /**
     * Handle the event.
     */
    protected $username;
    protected $email;
    protected $token;

    public function handle(DeleteAcct $event): void
    {
        $this->username = $event->username;
        $this->email = $event->email;
        $this->token = $event->token;

        $data = array('username' => $this->username, 'email' => $this->email, 'token' => $this->token);
        
        try {
            Mail::send('mails/delete_acct_mail', $data, function($message) {
                $message->to($this->email, $this->username)->subject('Delete your account');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            // Log the error for troubleshooting
            Log::error('Failed to send delete acct mail', ['email' => $this->email, 'error' => $e->getMessage()]);
            
            // Notify user of error
            request()->session()->flash("mail_failed", "Failed to send email. Please check your network connection and try again.");
        }
    }
}

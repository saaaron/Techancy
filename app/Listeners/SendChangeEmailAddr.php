<?php

namespace App\Listeners;

use App\Events\ChangeEmailAddr;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;

class SendChangeEmailAddr
{
    /**
     * Handle the event.
     */
    protected $username;
    protected $email;
    protected $token;

    public function handle(ChangeEmailAddr $event): void
    {
        $this->username = $event->username;
        $this->email = $event->email;
        $this->token = $event->token;

        $data = array('username' => $this->username, 'email' => $this->email, 'token' => $this->token);
        
        try {
            Mail::send('mails/change_email_addr_mail', $data, function($message) {
                $message->to($this->email, $this->username)->subject('Change your email address');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Exception $e) {
            // Log the error for troubleshooting
            FacadesLog::error('Failed to send change email addr mail', ['email' => $this->email, 'error' => $e->getMessage()]);
            
            // Notify user of error
            request()->session()->flash("mail_failed", "Failed to send email. Please check your network connection and try again.");
        }
    }
}

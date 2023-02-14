<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class login_otp extends Mailable
{
    use Queueable, SerializesModels;

    private $otp = '';
    private $email = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email = '',$otp = '')
    {
        $this->email = $email;
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ali22@gmail.com')
        ->view('auth.login_otp_email')
        ->to($this->email)
        ->subject('otp login ')
        ->with([
            'otp' => $this->otp,
            'email' => $this->email
        ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class forgot_password extends Mailable
{
    use Queueable, SerializesModels;

    private $email = '';
    private $token = '';
    private $domain = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token,$domain)
    {
        //
        $this->email = $email;
        $this->token = $token;
        $this->domain = $domain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        $resetLink = $this->domain . '/reset?token=' .  $this->token.'&email='. $this->email;

        return $this->from('ali22@gmail.com')
        ->view('auth.forgot_password_email')
        ->to($this->email)
        ->subject('reset password ')
        ->with([
            'link' => $resetLink,
            'token' => $this->token,
            'email' => $this->email
        ]);
    }
}

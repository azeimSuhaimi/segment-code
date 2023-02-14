<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class varify_user extends Mailable
{
    use Queueable, SerializesModels;

    private $email = '';
    private $domain = '';


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$domain)
    {
        //
        $this->email = $email;
        $this->domain = $domain;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = $this->domain . '/varify_user?email='. $this->email;

        return $this->from('ali22@gmail.com')
        ->view('auth.varify_user_email')
        ->to($this->email)
        ->subject('varify user ')
        ->with([
            'link' => $link,
            'email' => $this->email
        ]);
    }
}

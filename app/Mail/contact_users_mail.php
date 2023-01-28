<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact_users_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $textarea_msg ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($textarea_msg)
    {
        $this->textarea_msg = $textarea_msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Message form SGR-BL admin')->view('components.mail_contact');
    }
}

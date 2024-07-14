<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlasticUserConnectedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $organizationName;
    public $organizationEmail;

    /**
     * Create a new message instance.
     *
     * @param string $organizationName
     * @param string $organizationEmail
     * @return void
     */
    public function __construct($organizationName, $organizationEmail)
    {
        $this->organizationName = $organizationName;
        $this->organizationEmail = $organizationEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Connected to Recycling Organization')
                    ->view('emails.plastic_user_connected')
                    ->with([
                        'organizationName' => $this->organizationName,
                        'organizationEmail' => $this->organizationEmail,
                    ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrganizationConnectedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $organizationEmail;
    public $userName;
    public $userPhone;

    /**
     * Create a new message instance.
     *
     * @param string $organizationEmail
     * @param string $userName
     * @param string $userPhone
     * @return void
     */
    public function __construct($organizationEmail, $userName, $userPhone)
    {
        $this->organizationEmail = $organizationEmail;
        $this->userName = $userName;
        $this->userPhone = $userPhone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Connected to Plastic User')
                    ->view('emails.organization_connected')
                    ->with([
                        'organizationEmail' => $this->organizationEmail,
                        'userName' => $this->userName,
                        'userPhone' => $this->userPhone,
                    ]);
    }
}

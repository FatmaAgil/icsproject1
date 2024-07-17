<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConnectionMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $orgName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orgName)
    {
        $this->orgName = $orgName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.connection')
                    ->with([
                        'orgName' => $this->orgName,
                    ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegister extends Mailable
{
    use Queueable, SerializesModels;

    private $first_name ;
    private $last_name ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->first_name = 'hadi';
        $this->last_name = ' gh';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-registered')->with([
            'full_name' => $this->first_name . $this->last_name ]);
    }
}

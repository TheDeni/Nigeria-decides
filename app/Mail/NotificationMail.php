<?php

namespace App\Mail;

use App\Models\Aspirant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $title;
    public $message;
    public $aspirant;
    public function __construct(String $title, String $message, Aspirant $aspirant)
    {
        $this->title = $title;
        $this->message = $message;
        $this->aspirant = $aspirant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.notification')->subject($this->title);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class complainMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $complain;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$complain)
    {
        $this->name=$name;
        $this->complain=$complain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('view_complain')->view('view_complain');
    }
}

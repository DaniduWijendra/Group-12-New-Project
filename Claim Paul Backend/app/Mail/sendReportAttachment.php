<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendReportAttachment extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name=$this->data['address'];
        return $this->subject('Test Mail Recieved')->view
        ('dynamic_email_template',compact('name'))->
        attach($this->data['document']->getRealPath(),[
            'as'=>$this->data['document']->getClientOriginalName()
        ]);
    }
}

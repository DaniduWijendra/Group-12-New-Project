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
    public function __construct()
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
        return $this->from('claimpaul1@gmail.com')->subject('Test Mail Recieved')->view
        ('dynamic_email_template')->with('data',$this->data)->
        attach($this->data['file']->getRealPath(),[
            'as'=>$this->data['file']->getClientOriginalName()
        ]);
    }
}

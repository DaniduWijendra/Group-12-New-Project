<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mailController extends Controller
{
    public function index()
    {
        return view('email');
    }
    public function send(Request $request)
    {
        $data=array(
            'address' => $request->address,
            'document' => $request->file('document')
        );
        
        $to=$this->data['address'];
        \Mail::to($to)->send(new \App\Mail\sendReportAttachment($data));
        
        echo 'sent email success';
    }
}

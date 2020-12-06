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
        $data=[
            'address' => $request->address,
            'document' => $request->file('document')
        ];
        
        $to='daniduwijendra@gmail.com';
        \Mail::to($to)->send(new \App\Mail\sendReportAttachment($data));
        
        echo 'sent email success';
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\complainMail;
use Illuminate\Http\Request;

class mailController extends Controller
{
    public function sendMail(Request $rs)
    {
        Mail::to($rs->email)->send(new complainMail($rs->name,$rs->complain));
    }
}

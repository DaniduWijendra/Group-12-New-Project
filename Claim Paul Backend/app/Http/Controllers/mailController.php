<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\complainMail;
use App\Mail\mailManage;
use App\Mail\contactManage;
use Illuminate\Http\Request;

class mailController extends Controller
{
    public function sendMail(Request $rs)
    {   
        $data=array(
            'name'=>$rs->name,
            'complain'=>$rs->complain,
            
        );
        Mail::to($rs->email)->send(new complainMail($data));
    }

    public function adminMail(Request $rs)
    {   
        $data=array(
            'name'=>$rs->name,
            'complain'=>$rs->complain,
            'branch'=>$rs->branch,
            'topic'=>$rs->topic,
            'role'=>$rs->role
            
        );
        Mail::to($rs->email)->send(new mailManage($data));
    }
    public function contactMail(Request $rs)
    {   
        $data=array(
            'fname'=>$rs->fname,
            'lname'=>$rs->lname,
            'phone'=>$rs->phone,
            'message'=>$rs->message,
            
        );
        Mail::to($rs->email)->send(new contactManage($data));
    }
}

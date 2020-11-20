<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\userSignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public  function register(Request $request)
    {
        $request->validate([

            'firstName'=>['required'],
            'lastName'=>['required'],
            'email'=>['required','email','unique:user_sign_ups'],
            'password'=>['required','min:8','confirmed']
        ]);

        User::create([

            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
            'isDeleted'=>'0',
        ]);

        
        // User::create([

            
        //     'email'=>$request->email,
        //     'password'=> Hash::make($request->password),
        //     'role'=>$request->role,
        //     'isDeleted'=>'0',
        // ]);



    }
}

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
        // $request->validate([

        //     'firstName'=>['required'],
        //     'lastName'=>['required'],
        //     'email'=>['required','email','unique:user_sign_ups'],
        //     'password'=>['required','min:8','confirmed']
        // ]);

        $user=new User();

            $user->firstName=$request->firstName;
            $user->lastName=$request->lastName;
            $user->email=$request->email;
            $user->password= Hash::make($request->password);
            $user->role=$request->role;
            $user->isDeleted='0';
            $user->save();
            return response()->json(['msg'=>$user],201);
    
    
        
        

        
        // User::create([

            
        //     'email'=>$request->email,
        //     'password'=> Hash::make($request->password),
        //     'role'=>$request->role,
        //     'isDeleted'=>'0',
        // ]);



    }
}

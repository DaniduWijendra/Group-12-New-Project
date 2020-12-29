<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\userSignUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    public  function register(Request $request)
    {
        // $request->validate([

        //     'firstName'=>['required'],
        //     'lastName'=>['required'],

        //     'email'=>['required','email','unique:users'],
        //     'password'=>['required','min:8','confirmed']
        // ]);

        $admin=DB::table('admins')->select('adminId')->where('adminEmail',$request->email)->exists();
        $agent=DB::table('agents')->select('agId')->where('email',$request->email)->exists();
        $policyholder=DB::table('policy_holders')->select('pId')->where('policyholder_email',$request->email)->exists();
        //$users=DB::table('users')->select('id')->where('email',$request->email)->exists();

        if(($policyholder==null) && ($admin==null) && ($agent==null))
        {
            return response()->json(['error'=>'user not found !!!'],401); 
        }
        // else if($users)
        // {
        //     return response()->json(['error'=>'user already created !!!'],403);  
        // }
        

            // User::create([

            //     'firstName'=>$request->firstName,
            //     'lastName'=>$request->lastName,
            //     'email'=>$request->email,
            //     'password'=> Hash::make($request->password),
            //     'role'=>$request->role,
            //     'isDeleted'=>'0',
            // ]);

           else{ 
               
            
            

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
            return response()->json(['user'=>$user],201); 
        
        }

        

        
        // User::create([

            
        //     'email'=>$request->email,
        //     'password'=> Hash::make($request->password),
        //     'role'=>$request->role,
        //     'isDeleted'=>'0',
        // ]);



    }
}

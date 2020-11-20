<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\userSignUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class loginController extends Controller
{
    public function login(Request $request)
    {
       
        // $request->validate([
        //     'email' => ['required'],
        //     'password' => ['required']
        // ]);

        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return response()->json(Auth::user(), 200);
        // }

        // throw ValidationException::withMessages([
        //     'email' => ['The provided credentials are incorrect.']
        // ]);

        $user = Auth::user();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function getLogin($email)
    {
        $item=DB::table('users')->where('email', $email)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $users =DB::table('users')->where('email', $email)->get();

            return response()->json(['users'=>$users],200);

        }
    }

    public function logout()
    {
        Auth::logout();
    }
}

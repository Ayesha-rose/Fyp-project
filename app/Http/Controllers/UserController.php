<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function loginForm()
    {
        return view('user-auth.login');
    }

    public function Login(Request $request)
    {
        $data = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        else{
            return "Incorrect Password";
        }
    }
      public function signupForm()
    {
        return view('user-auth.signup');
    }

    public function signup(Request $request)
    {
       
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}

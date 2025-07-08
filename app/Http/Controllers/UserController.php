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
        $data = $request->only('email','password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } 
        return back()->withErrors([
            'email'=> 'Invalid email or password',
        ]);
    }

    public function signupForm()
    {
        return view('user-auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed', 
                'min:8',
                'regex:/[0-9]/',      
            ],
        ], [
            'password.regex' => 'Password must include uppercase, lowercase, number, and special character.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login');
    }
    public function logoutConfirmForm()
    {
        return view('logout'); 
    }

public function logout(Request $request)
{
    Auth::logout(); 
    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 

    return redirect('/'); 
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function proses(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Please fill in the email, you know it will hurt if you dont fill it in',
            'email.email'=>'Email format is incorrect',
            'password.required'=>'Please fill in the password, you know it will hurt if you dont fill it in'
        ]);
        if(Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function keluar(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminauthController extends Controller
{
    
    public function login(){
        if(!empty(Auth::check())){
            return redirect ('admin');
        }
        return view('Backend.Auth.login');
    }
    public function auth_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $remember = $request->has('remember'); 
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended(route('admin'))->with('success', 'Admin Login Successfully'); 
        } 
    
        return redirect()->back()->with('error', 'Invalid email or password');
    }
    
    
}
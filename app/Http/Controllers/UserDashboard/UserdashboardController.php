<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserdashboardController extends Controller
{
    // Show login page or redirect if already logged in
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('Userdashboard.userlogin');
    }

    // Optional separate route for login form if needed
    public function userlogin()
    {
        return view('Userdashboard.userlogin');
    }

    // Handle user login
    public function user_auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }

    // User dashboard
    public function dashboard()
    {
        return view('Userdashboard.Userdashboard');
    }
}

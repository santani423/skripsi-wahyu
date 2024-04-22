<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()
    {
        return view('auth/login');
    }
    function loginButton(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        return view('loginButton', compact('email', 'password'));
    }
    function inLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home.index'));
        }

        return back()->with([
            'error' => 'Email atau password anda salah',
        ]);
    }

    function inLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}

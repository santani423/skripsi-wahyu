<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Create new user
      $user =  User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'level' => 'customer',
            'password' => Hash::make($request->password),
        ]);
        $user->level =  'customer';
        $user->save();
        // dd($request);

        // Redirect to login or dashboard after registration
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function loginUser()
    {
        return inertia('User/Login');
    }

    public function doLoginUser(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
          ]);

          if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->tokens()->delete();
            $user->createToken('web-token')->plainTextToken;

            return  to_route('homepage');
          }
          return throw ValidationException::withMessages(
            [
              'message' => 'Wrong email or password'
            ]
          );
}

    public function registerUser()
    {
        return inertia('User/Register');
    }

    public function doRegisterUser(RegisterRequest $request, AuthRepository $authRepository)
    {
        $data = $request->validated();
        $authRepository->register($data);
        return to_route('homepage');
    }

    public function logoutUser(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('homepage');
    }

    public function loginAdmin()
    {
        return inertia('Admin/Login');
    }

    public function doLoginAdmin(Request $request)
    {
      $credentials =  $request->validate([
        'email' => 'required|email',
        'password' => 'required',
      ]);

      if (Auth::attempt($credentials)) {
        $user = Auth::user();

        $user->tokens()->delete();
        $user->createToken('web-token')->plainTextToken;

        return  redirect('/admin/dashboard');
      }
      return throw ValidationException::withMessages(
        [
          'message' => 'Wrong email or password'
        ]
      );
    }


  public function doLogoutAdmin(Request $request)
  {
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/admin/login');
  }
}

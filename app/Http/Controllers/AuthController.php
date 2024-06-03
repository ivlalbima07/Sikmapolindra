<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //  public function login()
    // {
    //     return view('auth.login');
    // }
    public function forgotpassword()
    {
        return view('auth.forgotpassword');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
            return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard');
        }
        Session::flash('error','username atau password salah');
        return back()->withInput();
    }

    // Untuk logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('loginForm');
    }

}
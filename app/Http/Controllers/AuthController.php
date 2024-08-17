<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\PasswordReset;
// use Spatie\Permission\Traits\HasRoles;

class AuthController extends Controller
{
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
            $user = Auth::user();

            if ($user->role === 'super-admin') {
                return redirect()->intended('superadmin/dashboard');
            } else {
                return redirect()->intended('dashboard');
            }
        }

        Session::flash('error', 'Email atau kata sandi salah');
        return back()->withInput();
    }

    public function mailSend(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => __('Email tidak ditemukan.')]);
        }

        $existingToken = PasswordResetToken::where('email', $request->email)->first();

        if ($existingToken) {
            if ($existingToken->is_used) {
                $existingToken->is_used = false;
                $existingToken->save();
            }
            $token = $existingToken->token;
            $expiredAt = $existingToken->expired_at;
        } else {
            $token = $user->id . '-' . now()->format('Ymd') . '-' . Str::random(10);
            $expiredAt = Carbon::now()->addHours(24);
            $createdAt = Carbon::now();

            PasswordResetToken::updateOrCreate(
                ['email' => $request->email],
                ['token' => $token, 'expired_at' => $expiredAt, 'created_at' => $createdAt]
            );
        }

        Mail::to($request->email)->send(new ResetPasswordEmail($token));

        return back()->with(['status' => __('Email reset password telah dikirim.')]);
    }

    public function showResetPasswordForm($token)
    {
        $email = PasswordResetToken::where('token', $token)->pluck('email')->first();
        $user = User::where('email', $email)->first();

        return view('auth.changepassword', ['token' => $token, 'email' => $email]);
    }

    public function resetPassword(Request $request)
    {
        $token = $request->token;
        $resetToken = PasswordResetToken::where('token', $token)->first();

        if (!$resetToken || $resetToken->is_used) {
            return redirect()->route('loginForm')->with('error', 'Token reset password tidak valid.');
        }

        if ($resetToken->expired_at && $resetToken->expired_at < Carbon::now()) {
            return redirect()->route('loginForm')->with('error', 'Token reset password telah kadaluarsa.');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => __('User tidak ditemukan.')]);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $resetToken->is_used = true;
        $resetToken->used_at = Carbon::now();
        $resetToken->save();

        event(new PasswordReset($user));

        return redirect()->route('loginForm')->with('success', 'Password berhasil direset.');
    }

    // Untuk logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
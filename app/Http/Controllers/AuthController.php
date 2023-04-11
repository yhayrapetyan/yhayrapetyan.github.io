<?php

namespace App\Http\Controllers;

use App\Mail\RecoverEmail;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => ['alpha'],
            'username' => ['required', 'alpha_num', 'unique:users,name'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'password_confirm' => ['required', 'same:password'],
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'username' => $validate['username'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'verify_token' => Str::random('40'),

        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));

        return view('auth/waiting_email_verification',['user'=>$user]);
    }

    public function verifyEmail($id, $token)
    {
        $user = User::query()->findOrFail($id);

        if ($user['verify_token'] === $token) {
            $user->update(['email_verified_at' => now()]);
        }

        return redirect()->route('login')->withError(
            ['Your email verification failed. Please try again or contact support.']
        );
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validate, $request['remember'])) {
            $role = User::query()->where('username', $request['username'])->value('role');

            if ($role === 'admin') {
                return redirect()->route('admin.users.index');
            }

            if ($role === 'user') {
                return redirect()->route('books.index');
            }
        }

        return redirect()->back()->withErrors('not correct login or password');
    }

}

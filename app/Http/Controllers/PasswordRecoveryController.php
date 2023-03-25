<?php

namespace App\Http\Controllers;

use App\Mail\RecoverEmail;
use App\Mail\VerifyEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class PasswordRecoveryController extends Controller
{

    public function recoverPassword (Request $request)
    {

        if (!User::query()->where('email', '=' , $request['email'])->exists()){
            return redirect()->back()->withErrors('wrong email');
        }
        $code = (string)random_int(100000,999999);
        session()->put(['code'=>$code, 'email' => $request->email]);

        Mail::to($request['email'])->send(new RecoverEmail($code));

        return view('auth/check_email_code');
    }

    public function checkCode(Request $request)
    {
        if($request->code === session()->get('code')) {
            return redirect()->route('new.password');

        }
        return redirect()->back()->withErrors("your input the wrong code");
    }

    public function setNewPassword(Request $request)
    {
        $validate = $request->validate([
           'password' =>['required', 'min:8'],
           'password_confirm' => ['required', 'same:password'],
        ]);

        $user = User::query()->where('email', '=', session('email'))->first();
        $user->update(['password' => bcrypt($validate['password'])]);

        if( Carbon::parse($user['created_at'])->diffInMinutes(Carbon::now()) > 10 ){
            return to_route('users.show')->withSuccess(['your password changed successfully!']);
        }
        return to_route('login')->withSuccess(['your password changed successfully!']);

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class ForgetPasswordController extends Controller
{
    //
    public function showForgetPassword() {
        return view('forgetAndResetPassword.auth.forgetPassword');
    }


    public function submitForgetPassword(Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'=>$request->input('email'),
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);

        Mail::send('forgetAndResetPassword.email.forgetPassword',['token'=>$token],function($message) use($request) {
            $message->to($request->input('email'));
            $message->subject('Reset Password');
        });

        return back()->with('message', 'we have emailed you reset password link');

    }   


    public function showResetPassword (){
        return view('forgetAndResetPassword.auth.forgetPasswordLink');
    }

    public function submitResetPassword(Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required',
        ]);

        $password_reset_req = DB::table('password_resets')
        ->where('email', $request->input('email'))
        ->where('token', $request->token)
        ->first();

        if(!$password_reset_req) {
            return back()->with('error', 'Invalid Token!');
        }

        User::where('email', $request->input('email'))
        ->update(['password'=>Hash::make($request->input('password'))]);

        DB::table('password_resets')
        ->where('email', $request->input('email'))
        ->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}

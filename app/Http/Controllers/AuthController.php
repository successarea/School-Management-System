<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Feedback;
class AuthController extends Controller
{
    //
    public function mainDash() {
        if(!Auth::user()) {
            return view('main-dashboard');

        } else {
            return redirect()->back();
        }
    }
    public function loadRegister() {
        if(!Auth::user()) {
            return view('register');
        }
        else {
            return redirect()->back();
        }
    }

    public function registration(REQUEST $request) {

        $request->validate([
            'name'=> 'string|required|min:3',
            'email'=> 'string|required|unique:users|max:100',
            'password'=>'string|required|confirmed|min:5',
            'phNum'=>'integer|required',
            'grade'=>'string|required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'grade_id'=>'required',
        ]);

            
        $filename = "";
        if($request->hasFile('img')){
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->img->extension();
            $request->img->move(public_path('/assets/img/'), $filename);
        }
            


        $user = new User;
        $user->image = $filename;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->ph_number = $request->phNum;
        $user->grade = $request->grade;
        $user->grade_id = $request->grade_id;

        $user->save();
        return redirect()->back()->with('message', 'Registration Done Successfully!');
    }

    public function loadLogin() {
        if(!Auth::user()) {
            return view('login');
        }
        else {
            return redirect()->back();
        }
    }

    public function login(REQUEST $request) {
      
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $userCredential = $request->only('email','password');
       
        if(Auth::attempt($userCredential)) {
            if(Auth::user()->role == 'admin'){
                return redirect('/admin/dashboard');
            } 
            else if (Auth::user()->role == 'teacher'){
                return redirect('/teacher/dashboard');
            } else  if (Auth::user()->role == 'student'){
                return redirect('/student/dashboard');
            } else if (Auth::user()->role == '') {
                return redirect('/logout');
            }
        } 
        else {
            return redirect()->back()->with('error', 'Username & Password is incorrect!');
        }
    }

    public function logout(REQUEST $request) {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }


    public function sendFeedback(Request $request) {
       
        $feedback = new Feedback;
        $feedback->feedback = $request->feedback;
        $feedback->sender_name = Auth::user()->name;
        $feedback->sender_grade = Auth::user()->grade;
        $feedback->sender_role = Auth::user()->role;
        $feedback->save();

        return back()->with('success', 'hahahahah');
    }
}

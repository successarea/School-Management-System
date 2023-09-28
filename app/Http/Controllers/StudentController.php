<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Exam;
use App\Models\Timetable;
use App\Models\Feedback;
class StudentController extends Controller
{
    //
    public function dashboard() {
        return view('student.dashboard');
    }

    public function profile() {
        return view('student.profile');
    }

    public function editprofile() {
        return view('student.edit');
    }

    public function updateProfile(Request $request) {

            $request->validate([
                'name' => 'string|required|min:3',
                'email' => 'string|required|max:100',
                'phNum' => 'integer|required',
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            $filename = Auth::user()->image; // Initialize the filename variable
        
            if ($request->hasFile('img')) {
                $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->img->extension();
                $request->img->move(public_path('/assets/img/'), $filename);
            }
        
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'ph_number' => $request->phNum,
                'image' => $filename,
            ]);
        
            return redirect('/student/profile');
        }

        // showtimtable 
        public function showTimetable() {
            $timetables = Timetable::where('grade', Auth::user()->grade_id)->get();
        
            $days = ['Monday','Tuesday','Wednesday','Thursday','Friday'];
            $grades = [10,11,12];
    
            return view('student.showTimetable', compact('timetables','days','grades'));
        }

        public function examDash() {
           $exams = Exam::where('grade', Auth::user()->grade)->get();
            return view('student.exam-dashboard', compact('exams'));
        }
    
        
}

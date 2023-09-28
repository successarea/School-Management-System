<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Exam;
use App\Models\Timetable;
class TeacherController extends Controller
{
    //
    // Teacher Dashboard 
    public function teacherDashboard() {
        return view('teacher.dashboard');
    }

    // Teacher Profile 
    public function teacherProfile() {
        
        return view('teacher.profile');
    }

    // Teacher Profile load
    public function teacherPfEdit() {
        return view('teacher.update');
    }

    public function teacherUpdatePf(Request $request) {
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
    
        return redirect('/teacher/profile');
    }

    // exam form
    public function examForm() {
        return view('teacher.addexam');
    }

    public function addExam(Request $request) {
        $request->validate([
            'date' => 'string|required|unique:exams,date',
        ], [
            'date.unique' => 'The date is already chosen by other exam!Try another one.',
        ]);
        
        
        $exam = new Exam;
        $exam->subject = $request->subject;
        $exam->date = $request->date;
        $exam->time = $request->time;
        $exam->grade = $request->grade;
        $exam->tr_name = Auth::user()->name;

        $exam->save();

        return back()->with('success', 'Exam Added Successfully');
    }

    public function showTimetable() {
        $timetables = Timetable::where('grade', Auth::user()->grade_id)->get();
        
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday'];
        $grades = [10,11,12];

        return view('teacher.showTimetable', compact('timetables','days','grades'));
    }

    
}

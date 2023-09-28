<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Artisan;
class ExamController extends Controller
{
    //
    // show examDash 
    public function showExamDashboard() {

        $G10_exams = Exam::where('grade', "Grade 10")->orderBy('date', 'asc')->get();
        $G11_exams = Exam::where('grade', "Grade 11")->orderBy('date', 'asc')->get();
        $G12_exams = Exam::where('grade', "Grade 12")->orderBy('date', 'asc')->get();
        return view('admin.exam-dashboard', compact('G10_exams', 'G11_exams', 'G12_exams'));
    }

    public function deleteOldExams()
    {
        // Execute the 'exam:delete-old' command
        Artisan::call('exam:delete-old');

        return redirect()->back()->with('status', 'Old exams have been deleted.');
    }
}

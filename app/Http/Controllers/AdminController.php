<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Models\Feedback;
class AdminController extends Controller
{
    //
    public function adminDashLoad() {
        $query = User::orderBy('created_at', 'desc');
        
        $users = $query->paginate(5);
        
        return view('admin.dashboard', compact('users'));
    }

    public function loadAdminPf($id) {
        $query = User::orderBy('created_at', 'desc');
        $users = $query->paginate(5);
        $admin = User::where('id', $id)->get();
        
        return view('admin.admin-pf-update', compact('admin', 'users'));
    }

    public function updateAdminPf(Request $request, $id) {
        
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
    
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'ph_number' => $request->phNum,
            'image' => $filename,
        ]);
    
        return redirect('/admin/dashboard');
    }
    

    public function loadEditRole($id) {
        $user = User::where('id', $id)->get();
        return view('admin.user-role-update', compact('user'));
        
    }

    public function editUserRole(REQUEST $request, $id) {
        
        User::where('id', $id)->update([
            'role' => $request->role,
        ]);
        return redirect('/admin/dashboard');
    }

    public function grade12Dashboard() {
        $teachers = User::where('role', 'teacher')
        ->where('grade', 'Grade 12')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->paginate(5);
        
        return view('admin.g12.grade_12-teacher', compact('teachers'));
    }

    public function toG12student() {
        $students = User::where('role', 'student')
        ->where('grade', 'Grade 12')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->paginate(5);
        
        return view('admin.g12.grade_12-student', compact('students'));
    }

    public function deleteUser($id) {
        
        User::where('id', $id)->delete();
        return back()->with('successDe', 'User Has Been Deleted Successfully');
    }

// G11 table from Admin view 
    public function grade11Dashboard() {
        $teachers = User::where('role', 'teacher')
        ->where('grade', 'Grade 11')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->paginate(5);
        
        return view('admin.g11.grade_11-teacher', compact('teachers'));
    }

    public function toG11student() {
        $students = User::where('role', 'student')
        ->where('grade', 'Grade 11')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->paginate(5);
        
        return view('admin.g11.grade_11-student', compact('students'));
    }


    // G10 table from Admin view 
    public function grade10Dashboard() {
        $teachers = User::where('role', 'teacher')
        ->where('grade', 'Grade 10')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->paginate(5);
        
        return view('admin.g10.grade_10-teacher', compact('teachers'));
    }

    public function toG10student() {
        $students = User::where('role', 'student')
        ->where('grade', 'Grade 10')
        ->orderBy('created_at', 'desc') // Order by created_at in descending order
        ->paginate(5);
        
        return view('admin.g10.grade_10-student', compact('students'));
    }


    public function showingFeedback() {
        $query = Feedback::orderBy('created_at', 'desc');
        $feedbacks = $query->paginate(5);
        return view('admin.show-feedback', compact('feedbacks'));
    }

    public function deleteOldFeedbacks()
    {
       
        Artisan::call('feedback:delete-old');

        return redirect()->back()->with('status', 'Old Feedbacks have been deleted.');
    }
}

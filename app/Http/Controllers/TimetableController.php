<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
class TimetableController extends Controller
{
    //
    public function mainTimetable() {
        return view('admin.timetable.main-timetable');
    }

    public function loadManageTimetable() {
        return view('admin.timetable.manage-timetable');
    }

// storing Timetable
public function storeTimetable(Request $request)
{
    $request->validate([
        'day' => 'required',
        'grade' => 'required|in:10,11,12', // Add the grades you want to support
        // Add validation rules for class names as needed
    ]);

    $day = $request->input('day');
    $grade = $request->input('grade');

    for ($hour = 6; $hour <= 18; $hour++) {
        $className = $request->input('class_' . $hour);

        if ($className) {
            // Check if an entry already exists for the specified day, grade, and start time
            $existingEntry = Timetable::where('day', $day)
                ->where('grade', $grade)
                ->where('start_time', $hour . ':00:00')
                ->first();

            if ($existingEntry) {
                return redirect()->back()->with('error', 'A timetable entry already exists for ' . $day . ' (Grade ' . $grade . ') at ' . $hour . ':00.');
            }

            Timetable::create([
                'day' => $day,
                'class_name' => $className,
                'start_time' => $hour . ':00:00',
                'end_time' => ($hour + 1) . ':00:00',
                'grade' => $grade, // Assign the grade to the timetable entry
            ]);
        }
    }

    return redirect()->back()->with('success', 'Timetable for ' . $day . ' (Grade ' . $grade . ') has been saved.');
}


    public function showTimetable() {
        $timetable_10 = Timetable::where('grade', '10')->get();
        $timetable_11 = Timetable::where('grade', '11')->get();
        $timetable_12 = Timetable::where('grade', '12')->get();
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday'];
        $grades = [10,11,12];

        return view('admin.timetable.showTimetable', compact('timetable_10','timetable_11','timetable_12','days','grades'));
    }

    public function updateTimetable (Request $request) {
        $request->validate([
            'className'=>'required',
            'classId'=>'required',                                                                                    
        ]);

        $id = $request->classId;
        $class_name = $request->className;
        Timetable::where('id', $id)->update([
            'class_name'=>$class_name
        ]);
        return response()->json([
            'status'=>'success',
        ]);
    }
}

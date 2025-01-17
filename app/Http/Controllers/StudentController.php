<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->get();
        return view('studentsData', compact('students'));
    }

    public function show($id)
    {
        $student = DB::table('students')->find($id);
        if (!$student) {
            abort(404);
        }
        return view('students.show', compact('student'));
    }

    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}


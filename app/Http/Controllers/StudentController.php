<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class StudentController extends Controller
{
    public function index()
    {
        if (!Schema::hasTable('students')) {
            Artisan::call('db:seed', ['--class' => 'StudentSeeder']);
            return redirect()->route('students.index')
                ->with('success', 'Students table created and populated with data');
        }

        try {
            $students = Student::with('track')->get();
            $tracks = Track::all();
            return view('students.index', compact('students', 'tracks'));
        } catch (\Exception $e) {
            return redirect()->route('students.index')
                ->with('error', 'Error accessing students data. Table will be recreated.');
        }
    }

    public function create()
    {
        $tracks = Track::all();
        return view('students.create', compact('tracks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|in:male,female',
            'track_id' => 'required|exists:tracks,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('students', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}


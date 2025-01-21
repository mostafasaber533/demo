<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::with(['courses', 'students'])->get();
        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        Track::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $imageName
        ]);

        return redirect()->route('tracks.index')->with('success', 'Track created successfully.');
    }

    public function show(Track $track)
    {
        $track->load('courses');
        return view('tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('img')) {
            if (file_exists(public_path('images/'.$track->img))) {
                unlink(public_path('images/'.$track->img));
            }
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $track->img = $imageName;
        }

        $track->name = $request->name;
        $track->description = $request->description;
        $track->save();

        return redirect()->route('tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy(Track $track)
    {
        if (file_exists(public_path('images/'.$track->img))) {
            unlink(public_path('images/'.$track->img));
        }
        $track->delete();

        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }

    // Add this method to manage courses in track
    public function manageCourses(Track $track)
    {
        $courses = Course::all();
        $track->load('courses');
        return view('tracks.manage-courses', compact('track', 'courses'));
    }

    // Add this method to update track courses
    public function updateCourses(Request $request, Track $track)
    {
        $track->courses()->sync($request->courses);
        return redirect()->route('tracks.show', $track)
            ->with('success', 'Track courses updated successfully');
    }
}

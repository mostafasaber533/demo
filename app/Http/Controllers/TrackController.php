<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
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
}

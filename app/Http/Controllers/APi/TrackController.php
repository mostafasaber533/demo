<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrackResource;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks=Track::all();
         /* return $tracks; */
         return TrackResource::collection($tracks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requestData=$request;
        $track= Track::create($requestData);
        return $track;
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
        /* return $track; */
        $trackResourceData= new TrackResource($track);
        return $trackResourceData;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
        $requestData=$request->all();
        $track->update($requestData);
        return $track;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
        $track->delete();
        return "Course Deleted Successfully";
    }
}

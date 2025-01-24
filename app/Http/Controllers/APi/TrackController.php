<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrackResource;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $courseValidator=Validator::make($request->all(),[
            'name'=>'required',
            'id'=>'unique:tracks'
        ]);
        if($courseValidator->fails()){
            return response()->json([
                'validation_errors' => $courseValidator->errors(),
                'message'=> 'Check Your Data',
                'typealart'=> 'danger'
            ],422
        );
        }
       /*  $requestData=$request;
        $track= Track::create($requestData);
        return $track; */
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
        return "Track Deleted Successfully";
    }
}

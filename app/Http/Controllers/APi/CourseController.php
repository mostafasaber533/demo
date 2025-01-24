<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses=Course::all();
        /* return $courses; */
        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
$courseValidator=Validator::make($request->all(),[
    'name'=>'required',
    'id'=>'unique:courses'
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
        $course= Course::create($requestData);
        return $course; */
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        $courseResourceData= new CourseResource($course);
        return $courseResourceData;

/*         return $course;
 */    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $requestData=$request->all();
        $course->update($requestData);
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return "Course Deleted Successfully";
    }
}


<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Course $course)
    {
        $inputs = $this->requestValidate();
        $inputs['college_id'] = request()->college_id;
        $result = $course->create($inputs);
        if ($result) {
            return redirect()->route('college.show',request()->college_id)->with('success', 'College created successfully.');
        } else {
            return redirect()->route('college.show',request()->college_id)->with('danger', 'Failed to create College');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $inputs = $this->requestValidate();
        $inputs['college_id'] = request()->college_id;
        $result = $course->update($inputs);
        if ($result) {
            return redirect()->route('college.show',request()->college_id)->with('success', 'Course updated successfully.');
        } else {
            return redirect()->route('college.show',request()->college_id)->with('danger', 'Failed to update course.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $result = $course->delete();
        if ($result) {
            return redirect()->route('college.show',request()->college_id)->with('success', 'Course deleted successfully.');
        } else {
            return redirect()->route('college.show',request()->college_id)->with('danger', 'Failed to delete course');
        }
    }

    private function requestValidate($value = '')
    {
        return request()->validate(
            [
                'name'       => 'required|unique:colleges,id',
            ],
            [
                'name.unique'       => 'Course already exists!.',
            ]
        );
    }
}

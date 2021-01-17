<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'colleges'  => College::all()
        ];
        return view('admin.college.index', $params);
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
    public function store(Request $request, College $college)
    {
        $inputs = $this->requestValidate();
        $result = $college->create($inputs);
        if ($result) {
            return redirect()->route('college.index')->with('success', 'College created successfully.');
        } else {
            return redirect()->route('college.index')->with('danger', 'Failed to create College');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {        
        $college = College::find(request()->id);
        return view('admin.course.index',compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, College $college)
    {
        $inputs = $this->requestValidate();
        $result = $college->update($inputs);
        if ($result) {
            return redirect()->route('college.index')->with('success', 'College updated successfully.');
        } else {
            return redirect()->route('college.index')->with('danger', 'Failed to update College');
        }
    }

    function fileUpload(College $college)
    {
        # code...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        //
    }

    private function requestValidate($value = '')
    {
        return request()->validate(
            [
                'name'       => 'required|unique:colleges,id',
                'abbreviation' => 'required|unique:colleges,id'
            ],
            [
                'name.unique'       => 'College already exists!.',
                'abbreviation.unique' => 'Abbreviation already exists!.',
            ]
        );
    }
}

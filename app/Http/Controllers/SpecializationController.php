<?php

namespace App\Http\Controllers;

use App\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $specials = Specialization::all();
        return view('admin.study.index',compact('specials'));
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
    public function store(Request $request, Specialization $specialization)
    {
        $inputs = $this->requestValidate();
        $result = $specialization->create($inputs);
        if ($result) {
            return redirect()->route('study.index')->with('success', 'Specialization created successfully.');
        } else {
            return redirect()->route('study.index')->with('danger', 'Failed to create Specialization.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $this->requestValidate();
        $specialization = Specialization::find($id);
        $result = $specialization->update(['name'=>$request->name]);
        if ($result) {
            return redirect()->route('study.index')->with('success', 'Specialization updated successfully.');
        } else {
            return redirect()->route('study.index')->with('danger', 'Failed to update specialization.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialization = Specialization::find($id);
        $result = $specialization->delete();
        if ($result) {
            return redirect()->route('study.index')->with('success', 'Specialization deleted successfully.');
        } else {
            return redirect()->route('study.index')->with('danger', 'Failed to delete specialization');
        }
    }

    private function requestValidate($value = '')
    {
        return request()->validate(
            [
                'name'       => 'required|unique:specializations,id',
            ]
        );
    }
}

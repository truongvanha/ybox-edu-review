<?php

namespace App\Http\Controllers\API;
use App\Teacher;
use App\Http\Resources\TeacherResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TeacherResource(Teacher::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testapi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $teacher = Teacher::create([ 
            'name'          => $request->name,
            'description'   => $request->description,
            'birthday'      => $request->birthday,
            'gender'        => $request->gender,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'specialize'    => $request->specialize,
            'image'         => $request->image,
            'identity_card' => $request->identity_card,
            'email'         => $request->email,
        ]);
        return new TeacherResource($teacher);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TeacherResource(Teacher::find($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $teacher = Teacher::findOrFail($id)->delete();
       return   redirect()->route('teacher.index');
    }
}

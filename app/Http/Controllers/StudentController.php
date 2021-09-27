<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\UsersStudent;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  UsersStudent::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year_level' => 'required',
            'teacher_id' => 'required'

        ]);

        return UsersStudent::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UsersStudent::find($id);
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
        $school = UsersStudent::find($id);
        $school->update($request->all());
        return $school;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return UsersStudent::destroy(($id));
    }

    /**
     * Search for a teacher id
     *
     * @param  str  $id
     * @return \Illuminate\Http\Response
     */
    public function searchByClass($class_id)
    {
        return StudentResource::collection(UsersStudent::where('class_id', $class_id)->get());
        // UsersStudent::where('class_id', $class_id)->with('user')->get()
    }
}

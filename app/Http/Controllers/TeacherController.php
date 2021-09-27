<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherResource;
use App\Models\UsersTeacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  UsersTeacher::all();
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

        return UsersTeacher::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UsersTeacher::find($id);
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
        $school = UsersTeacher::find($id);
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
        return UsersTeacher::destroy(($id));
    }

    /**
     * Search for a teacher id
     *
     * @param  str  $id
     * @return \Illuminate\Http\Response
     */
    public function searchById($user_id)
    {
        return TeacherResource::collection(UsersTeacher::where('user_id', $user_id)->get());
        // UsersStudent::where('class_id', $class_id)->with('user')->get()
    }
}

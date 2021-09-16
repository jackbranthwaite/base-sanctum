<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Search for all teachers
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTeachers()
    {
        return User::where('role', '1')->get(['first_name', 'last_name']);
    }

    public function searchStudents()
    {
        return User::where('role', '0')->get(['first_name', 'last_name']);
    }
}

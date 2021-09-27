<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;

// Public Routes

//School Routes
Route::get('/schools', [SchoolController::class, 'index']);
Route::get('/schools/{id}', [SchoolController::class, 'show']);



//Class Routes
Route::get('/classes', [ClassController::class, 'index']);


//Company Routes
Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);



Route::get('/teachers/search/{id}', [TeacherController::class, 'searchById']);


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    //Company routes
    Route::get('/companies/{id}', [CompanyController::class, 'show']);
    Route::get('/companies/search/{teacher_id}', [CompanyController::class, 'search']);

    //Class routes
    Route::post('/classes', [ClassController::class, 'store']);
    Route::get('/classes/search/{id}', [ClassController::class, 'search']);

    //School routes
    Route::post('/schools', [SchoolController::class, 'store']);
    Route::put('/schools/{id}', [SchoolController::class, 'update']);
    Route::delete('/schools/{id}', [SchoolController::class, 'destroy']);

    //User routes
    Route::get('/teachers', [UserController::class, 'searchTeachers']);
    Route::get('/students', [UserController::class, 'searchStudents']);
    Route::get('/students/search/{id}', [StudentController::class, 'searchByClass']);
});

//Sanctum/Fortify user routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

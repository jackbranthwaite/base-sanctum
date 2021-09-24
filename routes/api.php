<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public Routes

//School Routes
Route::get('/schools', [SchoolController::class, 'index']);
Route::get('/schools/{id}', [SchoolController::class, 'show']);
Route::get('/schools/search/{name}', [SchoolController::class, 'search']);


//Class Routes
Route::get('/classes', [ClassController::class, 'index']);


//Company Routes
Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);

Route::get('/companies/search/{teacher_id}', [CompanyController::class, 'search']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/companies/{id}', [CompanyController::class, 'show']);
    Route::post('/classes', [ClassController::class, 'store']);
    Route::post('/schools', [SchoolController::class, 'store']);
    Route::put('/schools/{id}', [SchoolController::class, 'update']);
    Route::delete('/schools/{id}', [SchoolController::class, 'destroy']);
    Route::get('/teachers', [UserController::class, 'searchTeachers']);
    Route::get('/students', [UserController::class, 'searchStudents']);
    // Route::post('logout', [AuthController::class, 'logout']);
});

//All routes for a basic crud
// Route::resource('products', ProductController::class);



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

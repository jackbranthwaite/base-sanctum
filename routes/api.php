<?php

use App\Http\Controllers\AuthController;
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
Route::get('/schools', [SchoolController::class, 'index']);
Route::get('/schools/{id}', [SchoolController::class, 'show']);
Route::get('/schools/search/{name}', [SchoolController::class, 'search']);
Route::post('/schools', [SchoolController::class, 'store']);
Route::put('/schools/{id}', [SchoolController::class, 'update']);
Route::delete('/schools/{id}', [SchoolController::class, 'destroy']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);




// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

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

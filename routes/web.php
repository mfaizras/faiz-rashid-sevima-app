<?php

use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\CourseActivityController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ForumResource;
use App\Http\Controllers\KursusResource;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Class_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Forum
Route::get('/forum', [ForumController::class, 'index']);


// Kursus
Route::get('/kursus', [CourseActivityController::class, 'index']);



// Harus Login dulu
Route::group(['middleware' => ['auth']], function () {
    // logout
    Route::get('/logout', [LoginController::class, 'logout']);

    // Kursus
    Route::get('/kursus/detail/{course}', [CourseActivityController::class, 'detail']);
    Route::get('/kursus/detail/{course}/join', [CourseActivityController::class, 'joinCourse']);
    Route::get('/kursus/{course}', [CourseActivityController::class, 'courseMateri']);
    Route::get('/kursus/{course}/{detail}', [CourseActivityController::class, 'courseMateriDetail']);
    Route::get('/buat-kursus', [CourseActivityController::class, 'create']);
    Route::post('/proses-kursus', [CourseActivityController::class, 'store']);
    Route::get('/mycourse', [CourseActivityController::class, 'courselist']);
    Route::get('/mycourse/{courseid}/{courseDetail}/edit', [KursusResource::class, 'edit']);
    Route::put('/mycourse/{courseid}/{courseDetail}', [KursusResource::class, 'update']);
    Route::get('/mycourse/{courseid}/{courseDetail}/destroy', [KursusResource::class, 'destroy']);
    Route::resource('/mycourse/{courseid}', KursusResource::class);

    // Forum
    Route::get('/forum/detail/{forum}', [ForumController::class, 'show']);
    Route::post('/forum/detail/{forum}', [ForumController::class, 'addComment'])->middleware('auth');
    Route::get('/forum/create', [ForumController::class, 'create']);
    Route::post('/forum/create', [ForumController::class, 'store']);
});

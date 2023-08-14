<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'],function(){
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create', [UserController::class, 'create']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::get('/delete/{id}', [UserController::class, 'destroy']);
});

Route::resource('student', StudentController::class);
Route::get('student/delete/{id}', [StudentController::class, 'destroy']);
Route::resource('classroom', ClassroomController::class);
Route::get('classroom/delete/{id}', [ClassroomController::class, 'destroy']);

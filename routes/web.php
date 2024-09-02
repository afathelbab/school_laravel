<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function(){
    Route::get('students/archive',[StudentController::class,'archive'])->name('students.archive');
    Route::delete('students/{id}/delete',[StudentController::class,'forceDelete'])->name('students.forceDelete');
    Route::post('students/{id}/restore',[StudentController::class,'restore'])->name('students.restore');
    Route::get('departments/{id}',[DepartmentController::class,'show'])->name('departments.show');

});

Route::prefix('dashboard')->group(function(){
    Route::get('/home', HomeController::class)->name('home');
    Route::resources([
        '/students'=> StudentController::class,
        '/doctors'=> DoctorController::class,
        '/courses'=> CourseController::class
    ]);
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Redirect homepage to students
Route::get('/', function () {
    return redirect()->route('students.index');
});

// Student resource routes
Route::resource('students', StudentController::class);

// Course resource routes
Route::resource('courses', CourseController::class);

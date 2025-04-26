<?php

use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\InstructorSessionController;
use App\Http\Controllers\Instructor\LessonController;
use App\Http\Controllers\Instructor\messageController;
use App\Http\Controllers\Instructor\UserController;




Route::middleware(['auth:instructor'])->prefix('instructor')->
name('instructor.')->group(function () {


    Route::get('/', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::get('/library', [InstructorController::class, 'library'])->name('library');
    Route::get('/user', [InstructorController::class, 'user'])->name('user');
    Route::get('/message', [InstructorController::class, 'message'])->name('message');


    Route::prefix('course')->name('courses.')->group(function () {

        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::get('/{course}', [CourseController::class, 'show'])->name('show');
        Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{course}', [CourseController::class, 'update'])->name('update');
        Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name('destroy');
        
    });

    Route::prefix('{course}/lesson')->name('lessons.')->group(function () {

        Route::get('/create', [LessonController::class, 'create'])->name('create');
        Route::post('/store', [LessonController::class, 'store'])->name('store');
        Route::get('/{lesson}', [LessonController::class, 'show'])->name('show');
        Route::get('/edit/{lesson}', [LessonController::class, 'edit'])->name('edit'); 
        Route::put('/update/{lesson}', [LessonController::class, 'update'])->name('update'); 
        Route::delete('/{lesson}', [LessonController::class, 'destroy'])->name('destroy');

    });


    Route::prefix('user')->name('users.')->group(function () {

        Route::get('/{instructor}', [UserController::class, 'edit'])->name('edit'); 
        Route::post('/update/{instructor}', [UserController::class, 'update'])->name('update');

    });

    Route::prefix('message')->name('messages.')->group(function () {

        Route::put('/update/{message}', [messageController::class, 'update'])->name('update');
        Route::get('/{message}', [messageController::class, 'show'])->name('show');  

    });


});


Route::get('/instructor/login', [InstructorSessionController::class, 'create'])->name('instructor.login');
Route::post('/instructor/login', [InstructorSessionController::class, 'store'])->name('instructor.store');
Route::delete('/instructor/logout',[InstructorSessionController::class,"destroy"])->name('instructor.logout');
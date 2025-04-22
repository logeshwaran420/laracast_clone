<?php

use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\InstructorSessionController;
use App\Http\Controllers\Instructor\LessonController;
use App\Http\Controllers\Instructor\messageController;
use App\Http\Controllers\Instructor\UserController;


Route::middleware(['auth'])->group(function () {




Route::middleware(['instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::get('/library', [InstructorController::class, 'library'])->name('library');
    Route::get('/user', [InstructorController::class, 'user'])->name('user');
    Route::get('/message', [InstructorController::class, 'message'])->name('message');




        Route::prefix('course')->name('courses.')->group(function () {
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::get('/{slug}', [CourseController::class, 'show'])->name('show');
        Route::get('/edit/{slug}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{slug}', [CourseController::class, 'update'])->name('update');
        Route::delete('/destroy/{slug}', [CourseController::class, 'destroy'])->name('destroy');

        
    });

    Route::prefix('{slug}/lesson')->name('lessons.')->group(function () {
        Route::get('/create', [LessonController::class, 'create'])->name('create');
        Route::post('/store', [LessonController::class, 'store'])->name('store');
        Route::get('/{id}', [LessonController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [LessonController::class, 'edit'])->name('edit'); 
        Route::put('/update/{id}', [LessonController::class, 'update'])->name('update'); 
        Route::delete('/{id}', [LessonController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('user')->name('users.')->group(function () {
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit'); 
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update'); 
    });

    Route::prefix('message')->name('messages.')->group(function () {
   
        Route::put('/update/{id}', [messageController::class, 'update'])->name('update');
        Route::get('/{id}', [messageController::class, 'show'])->name('show');  
    });


});


});





Route::get('/instructor/login', [InstructorSessionController::class, 'create'])->name('instructor.login');
Route::post('/instructor/login', [InstructorSessionController::class, 'store'])->name('instructor.store');
Route::delete('/instructor/logout',[InstructorSessionController::class,"destroy"])->name('instructor.logout');
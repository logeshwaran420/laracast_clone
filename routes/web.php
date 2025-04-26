<?php
use App\Http\Controllers\Student\SearchController;
use Illuminate\Support\Facades\Mail;
use App\Mail\test;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('test');
});


// Route::get("/example", function () {
//     Mail::to("test@gmail.com")->send(new test());
//     return "done";
// });


Route::get('/gethint', [SearchController::class, 'getHint']);

require __DIR__.'/admin.php';
require __DIR__.'/instructor.php';
require __DIR__.'/student.php';

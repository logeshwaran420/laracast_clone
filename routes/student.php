<?php


use App\Http\Controllers\student\PathController;
use App\Http\Controllers\student\SearchController;
use App\Http\Controllers\student\SeriesController;
use App\Http\Controllers\student\BrowserController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\student\RegisterController;
use App\Http\Controllers\student\SessionController;






Route::get('/',[StudentController::class,'index'])->name("home");
Route::get('/search',[SearchController::class,'index'])->name("search");



Route::prefix('series/{slug}/episodes')->group(function () {
   Route::get('{position?}', [SeriesController::class, 'showEpisode'])->name('episode');
    Route::post('store/{position?}', [SeriesController::class, 'comment_store'])->name('comment_store');
    Route::delete('delete/{position?}', [SeriesController::class, 'comment_destroy'])->name('comment_destroy');

}); 






//



Route::get('/browse/instructor',[BrowserController::class, "show3"])->name('instructor_all');
Route::get('/browse/{tagName?}', [BrowserController::class, "index"])->name('browse');
Route::get('/topics/{categoryName?}', [BrowserController::class, "show"])->name('topics');
Route::get('/browse/instructor/{id}',[BrowserController::class, "show2"])->name('instructor');



Route::get("/series",[SeriesController::class,"index"]);
Route::get("/series/{slug}", [SeriesController::class, "show"])->name("series");
Route::get("/path",[PathController::class,"index"]);



Route::get("/register",[RegisterController::class,"create"]);
Route::post("/register",[RegisterController::class,"store"]);
Route::get("/login",[SessionController::class,"create"])->name("login");
Route::post("/login",[SessionController::class,"store"]);
Route::delete("/logout",[SessionController::class,"destroy"])->name("logout");




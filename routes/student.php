<?php

use App\Http\Controllers\student\PathController;
use App\Http\Controllers\student\SearchController;
use App\Http\Controllers\student\SeriesController;
use App\Http\Controllers\student\BrowserController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\student\RegisterController;
use App\Http\Controllers\student\SessionController;
use App\Http\Controllers\student\SubscriptionController;
use App\Http\Controllers\Student\ThreadController;


Route::get('/', [StudentController::class, 'index'])->name('home');


Route::get('/search', [SearchController::class, 'index'])->name('search');


Route::prefix('series/{course}/episodes')->group(function () {
    Route::get('{lesson?}', [SeriesController::class, 'showEpisode'])->name('episode');
    Route::post('store/{lesson?}', [SeriesController::class, 'comment_store'])->name('comment_store');
    Route::delete('delete/{comment}', [SeriesController::class, 'comment_destroy'])->name('comment_destroy');
});


Route::get('/browse/instructor', [BrowserController::class, 'show3'])->name('instructor_all');
Route::get('/browse/{tag?}', [BrowserController::class, 'index'])->name('browse');
Route::get('/topics/{category?}', [BrowserController::class, 'show'])->name('topics');
Route::get('/browse/instructor/{instructor}', [BrowserController::class, 'show2'])->name('instructor');


Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/{course}', [SeriesController::class, 'show'])->name('series');
Route::get('/path', [PathController::class, 'index']);


Route::prefix('discuss')->name('thread.')->group(function () {
    Route::get('/', [ThreadController::class, 'index'])->name('index');
    Route::get('/create', [ThreadController::class, 'create'])->name('create');
    Route::post('/store', [ThreadController::class, 'store'])->name('store');

    Route::get('/channels', [ThreadController::class, 'channels'])->name('channels');
    Route::get('/channels/{category}', [ThreadController::class, 'thread'])->name('channels.view');
    Route::get('/channels/{category}/{thread}', [ThreadController::class, 'show'])->name('channels.show');
    Route::delete('/destroy/{category}/{thread}', [ThreadController::class, 'destroy'])->name('destroy');
    Route::post('/channels/{category}/{thread}', [ThreadController::class, 'replystore'])->name('channels.replystore');
    Route::delete('/channels/{category}/{thread}/{reply}', [ThreadController::class, 'replydelete'])->name('channels.replydelete');
});


Route::middleware(['student'])->group(function () {
    Route::get('/subscribe/{user}', [SubscriptionController::class, 'subscription'])->name('subscribe');
    Route::post('/subscribe/{user}', [SubscriptionController::class, 'subscribe'])->name('subscribe.post');
});


Route::post('/newsletter', [SubscriptionController::class, 'newsletter'])->name('newsletter');


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');

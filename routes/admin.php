<?php



use App\Http\Controllers\Admin\CourseViewController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\admin\SubscriptionReminderController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSessionController;


Route::middleware(['auth:admin'])->prefix('admin')
->name("admin.")->group(function () {

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('/series', [AdminController::class, 'series'])->name('series');
Route::get('/tracks', [AdminController::class, 'tracks'])->name('tracks');
Route::get('/members', [AdminController::class, 'members'])->name('members');
Route::get('/search', [AdminController::class, 'search'])->name('search');


Route::prefix('topic')->name('topics.')->group(function () {

    Route::get('/create/{tag}', [TagsController::class, 'create'])->name('create');
    Route::post('/store/{tag}', [TagsController::class, 'store'])->name('store');
    Route::get('/show/{category}', [TagsController::class, 'show'])->name('show');
    Route::get('/edit/{category}', [TagsController::class, 'edit'])->name('edit');
    Route::put('/update/{category}', [TagsController::class, 'update'])->name('update'); 
    Route::get('/add/{category}', [TagsController::class, 'add'])->name('add');
    Route::put('/added/{category}', [TagsController::class, 'added'])->name('added');
    Route::get('/{tag}', [TagsController::class, 'index'])->name('index');
   
});

Route::prefix('course')->name('courses.')->group(function () {

    
    Route::get('/sort', [CourseViewController::class, 'sort'])->name('sort');
    Route::post('/sortUpdate', [CourseViewController::class, 'sortUpdate'])->name('sortUpdate');
    Route::put('/toggle-status/{course}', [CourseViewController::class,"toggleStatus"])->name('toggleStatus');
    Route::get('/message/{course}', [CourseViewController::class,"message"])->name('message');
    Route::post('/msg-store/{course}', [CourseViewController::class,"msgStore"])->name('msgStore');  
    Route::get('/{course}', [CourseViewController::class,"index"])->name('index'); 
    
    
});

Route::prefix('member')->name('members.')->group(function () {

    Route::get('/create', [MembersController::class,"create"])->name('create');
    Route::post('/store', [MembersController::class,"store"])->name('store');
    Route::get('/subscribed/{user}', [MembersController::class,"show"])->name('show');
    Route::get('/unscubscribed/{user}', [MembersController::class,"show2"])->name('show2');
    Route::post('/unsubscribed/{user}', [SubscriptionReminderController::class, 'send'])->name('send');
    Route::get('/{user}', [MembersController::class,"index"])->name('index');


});




});



Route::get('/remind', [MembersController::class,"remind"])->name('remind');


Route::get('/admin/login', [AdminSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AdminSessionController::class, 'store'])->name('admin.store');
Route::delete('/admin/logout',[AdminSessionController::class,"destroy"])->name('admin.logout');






















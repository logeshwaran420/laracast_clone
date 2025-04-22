<?php



use App\Http\Controllers\Admin\CourseViewController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSessionController;




Route::middleware(['auth', 'admin'])->prefix('admin')
->name("admin.")->group(function () {

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('/series', [AdminController::class, 'series'])->name('series');
Route::get('/tracks', [AdminController::class, 'tracks'])->name('tracks');
Route::get('/members', [AdminController::class, 'members'])->name('members');
Route::get('/search', [AdminController::class, 'search'])->name('search');


Route::prefix('topic')->name('topics.')->group(function () {
    
    Route::get('/create/{id}', [TagsController::class, 'create'])->name('create');
    Route::post('/store/{id}', [TagsController::class, 'store'])->name('store');

    Route::get('/show/{catId}', [TagsController::class, 'show'])->name('show');
    Route::get('/edit/{catId}', [TagsController::class, 'edit'])->name('edit');
    Route::put('/update/{catId}', [TagsController::class, 'update'])->name('update');
   
    Route::get('/add/{catId}', [TagsController::class, 'add'])->name('add');
    Route::put('/added/{catId}', [TagsController::class, 'added'])->name('added');


    

    Route::get('/{id}', [TagsController::class, 'index'])->name('index');
   
});

Route::prefix('course')->name('courses.')->group(function () {

    
    Route::get('/sort', [CourseViewController::class, 'sort'])->name('sort');
    Route::post('/sortUpdate', [CourseViewController::class, 'sortUpdate'])->name('sortUpdate');
   
    Route::put('/toggle-status/{slug}', [CourseViewController::class,"toggleStatus"])->name('toggleStatus');
    Route::get('/message/{slug}', [CourseViewController::class,"message"])->name('message');
    Route::post('/msg-store/{slug}', [CourseViewController::class,"msgStore"])->name('msgStore');

    
    Route::get('/{slug}', [CourseViewController::class,"index"])->name('index'); 
    
    
});
Route::prefix('member')->name('members.')->group(function () {

    Route::get('/create', [MembersController::class,"create"])->name('create');
    Route::post('/store', [MembersController::class,"store"])->name('store');
Route::get('/{id}', [MembersController::class,"index"])->name('index');



});

});




Route::get('/admin/login', [AdminSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AdminSessionController::class, 'store'])->name('admin.store');
Route::delete('/admin/logout',[AdminSessionController::class,"destroy"])->name('admin.logout');






















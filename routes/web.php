<?php

Route::get("/test",function(){
    return view("test");
});

require __DIR__.'/admin.php';
require __DIR__.'/instructor.php';
require __DIR__.'/student.php';

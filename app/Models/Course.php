<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // A course can belong to many categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_category');
    }

    // A course can have many tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function messages()
{
    return $this->hasMany(Message::class);
}



}

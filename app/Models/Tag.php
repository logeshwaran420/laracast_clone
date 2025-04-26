<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_tag');
    }

    public function categories()
    {
     
        return $this->belongsToMany(Category::class, 'tag_category');   
    }
    public function getRouteKeyName()
    {
        return 'name';  // Use the 'name' column for route model binding
    }
}

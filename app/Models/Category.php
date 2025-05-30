<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_category');
    }

    public function getRouteKeyName()
    {
        return 'name';  // Use the 'name' column for route model binding
    }
    public function threads() {
        return $this->hasMany(Thread::class);
    }
}

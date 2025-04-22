<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseObserver
{
    public function creating(Course $course)
    {
        $slug = Str::slug($course->title);
        $original = $slug;
        $count = 1;

        while (Course::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        $course->slug = $slug;
    }
}

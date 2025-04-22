<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;

class BackfillCourseSlugsSeeder extends Seeder
{
    public function run()
    {
        Course::all()->each(function ($course) {
            $slug = Str::slug($course->title);
            $original = $slug;
            $count = 1;

            while (Course::where('slug', $slug)->where('id', '!=', $course->id)->exists()) {
                $slug = $original . '-' . $count++;
            }

            $course->slug = $slug;
            $course->save();
        });

        echo "✅ Slugs backfilled successfully.\n";
    }
}

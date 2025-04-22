<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    public function run()
{
    // Make sure courses exist
    if (Course::count() === 0) {
        Course::factory(5)->create();
    }

     Course::all()->each(function ($course) {
        $existingCount = $course->lessons()->count();

        foreach (range(1, 3) as $i) {
            Lesson::factory()->create([
                'course_id' => $course->id,
                'position' => $existingCount + $i, 
            ]);
        }
    });
}
}



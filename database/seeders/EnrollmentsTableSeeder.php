<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;

class EnrollmentsTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Student 1',
            'email' => 'student1@example.com',
        ]);

        $course = Course::first(); // Get the first course

        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    public function run(){
        
    $instructor = User::where('role', 'instructor')->first();
        
        if (!$instructor) {
            $instructor = User::create([
                'name' => 'Default Instructor',
                'email' => 'instructor@example.com',
                'password' => bcrypt('password123'),
                'role' => 'instructor',
            ]);
        }

        // Create specific courses
        
        // Generate 10 random courses using factory
        Course::factory()->count(10)->create();
    }
}

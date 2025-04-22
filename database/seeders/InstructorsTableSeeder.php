<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Instructor;

class InstructorsTableSeeder extends Seeder
{
    public function run()
    {
        // Ensure there are instructors in the users table
        $instructors = User::where('role', 'instructor')->get();

        // If no instructors exist, create new ones
        if ($instructors->isEmpty()) {
            $instructors = User::factory(5)->create(['role' => 'instructor']);
        }

        // Now, create instructor profiles
        foreach ($instructors as $user) {
            Instructor::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}

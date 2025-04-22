<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    public function definition()
    {
        return [
            'user_id' => User::where('role', 'instructor')->inRandomOrder()->first()->id 
                ?? User::factory()->create(['role' => 'instructor'])->id,
            'image' => $this->faker->imageUrl(200, 200, 'people', true, 'instructor'), // Generates a random image
            'description' => $this->faker->paragraph(),
        ];
    }
}

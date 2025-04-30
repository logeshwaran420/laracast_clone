<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     protected $model = \App\Models\Thread::class;

     
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Assuming you're using a User factory
            'category_id' => Category::inRandomOrder()->first()->id ?? null, // Random category or null if none exists
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(), // fallback to factory if no users
            'lesson_id' => Lesson::inRandomOrder()->first()?->id ?? Lesson::factory(),
        ];
    }



   }

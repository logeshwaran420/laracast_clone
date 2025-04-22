<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),  // Generates a random 3-word title
            'description' => $this->faker->paragraph(), // Random paragraph for description
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'shorts' => $this->faker->numberBetween(1, 10), // You can change this to any logic
        'status' => $this->faker->boolean(80), // 80% chance it's true
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $course->categories()->attach($categories);
        });
    }
    
    
}

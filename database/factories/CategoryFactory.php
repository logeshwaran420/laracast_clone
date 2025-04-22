<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),  // Random single word for category name
            'description' => $this->faker->sentence(), // Random short description
            'image' => $this->faker->imageUrl(640, 480, 'categories', true),
        ];
    }
}

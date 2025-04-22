<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;
    public function definition()
    {

        return [

            "name" => $this->faker->word(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Tag $tag) {
            $category = Category::inRandomOrder()->take(rand(1, 3))
            ->pluck('id'); 
            $tag->categories()->attach($category);
        });
    }
}

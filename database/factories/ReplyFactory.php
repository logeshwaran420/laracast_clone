<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    public function definition()
    {
        return [
            'thread_id' => Thread::inRandomOrder()->first()->id ?? Thread::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'body' => $this->faker->paragraph(),
        ];
    }
}

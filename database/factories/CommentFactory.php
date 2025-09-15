<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            "comment_text" => fake()->text,
            "user_id" => 2,
            "ticket_id" => fake()->numberBetween(1,30)
        ];
    }
}

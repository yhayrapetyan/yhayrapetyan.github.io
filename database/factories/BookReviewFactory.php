<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review' => fake()->paragraph($nbSentences = 10, $variableNbSentences = true),
            'rating' => fake()->numberBetween($min = 1, $max = 5) ,
            'book_id' => Book::factory(),
            'user_id' => User::factory(),
        ];

    }
}

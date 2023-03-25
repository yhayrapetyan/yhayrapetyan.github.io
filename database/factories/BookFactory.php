<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence($nbWords = 3, $variableNbWords = true),
            'author' => fake()->name(),
            'description' => fake()->paragraph($nbSentences = 4, $variableNbSentences = true),
            'cover_path' => '/storage/images/covers/base_cover.png',
            'genre' => fake()->word(),


        ];
    }
}

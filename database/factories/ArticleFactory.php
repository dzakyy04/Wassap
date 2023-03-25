<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence($nbWords = 15, $variableNbWords = true),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence($nbWords = 20, $variableNbWords = true),
            'thumbnail' => 'https://source.unsplash.com/700x300?' . $this->faker->jobTitle(),
            'body' => $this->faker->sentence($nbWords = 150, $variableNbWords = true),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 6),
            'is_approved' => rand(0, 1),
            'is_headline' => rand(0, 1),
        ];

    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1, 8),
            'title' => fake()->title,
            'slug'  => fake()->slug,
            'text'  => fake()->text(200),
            'phone' => fake()->phoneNumber,
            'status' => 1
        ];
    }
}
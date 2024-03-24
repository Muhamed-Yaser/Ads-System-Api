<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Group;
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
            'group_id' =>rand(1, Group::count()),
            'title' => fake()->word,
            'slug'  => fake()->slug,
            'text'  => fake()->text(100),
            'phone' => fake()->phoneNumber,
            'status' => 1
        ];
    }
}
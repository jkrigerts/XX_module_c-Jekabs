<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => fake()->name(),
            "description" => fake()->paragraph(),
            "slug" => fake()->name(),
            "user_id" => User::factory(),
            "deleted" => fake()->boolean()
        ];
    }
}

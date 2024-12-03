<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'image' => null,
            'description' => fake()->paragraph(),
            'location_hq' => fake()->city(),
            'coc_extract' => fake()->uuid(),
            'verified' => fake()->boolean(),
            'password' => bcrypt('password'),
        ];
    }
}

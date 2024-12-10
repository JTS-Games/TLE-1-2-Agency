<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['A', 'Bachelor', ' master', ' PhD', ' EHBO']),
            'type' => fake()->randomElement(['Certificaat', 'Rijbewijs', 'Opleiding']),
        ];
    }
}

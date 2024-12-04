<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Dit is van belang om elke keer aan te passen als je kolommen toevoegt aan de database
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'image' => null,
            'description' => fake()->paragraph(),
            'location_hq' => fake()->city(),
            'coc_extract' => fake()->uuid(),
            'verified' => fake()->boolean(),
            'password' => bcrypt('password'),
        ];
    }
}

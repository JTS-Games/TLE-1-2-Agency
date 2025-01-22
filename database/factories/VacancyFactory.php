<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vacancy::class;

    public function definition(): array
    {
        // Dit is van belang om elke keer aan te passen als je kolommen toevoegt aan de database
        return [
            'job_title' => fake()->title(),
            'description' => fake()->text(),
            'paycheck' => fake()->numberBetween(1000, 5000),
            'contract_term' => fake()->numberBetween(1, 12),
            'company_id' => 3,
            // i asked this through chat gpt because i got an error for contrained key. This resolved the issue. If we ever want to use dummy data from another table
            // We can use this way to create a "fake" id
            'location' => fake()->address(),
            'working_hours' => fake()->numberBetween(1, 100),
            'is_created' => 1  // Voeg dit toe om 'is_created' altijd op 1 te zetten
        ];
    }
}

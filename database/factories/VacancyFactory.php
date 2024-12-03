<?php

namespace Database\Factories;

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
        return [
            'job_title'=>fake()->title(),
            'description'=>fake()->text(),
            'paycheck'=>fake()->numberBetween(1000,5000),
            'contract_term'=>fake()->numberBetween(1,12),
            'company_id'=>fake()->numberBetween(1,100)
        ];
    }
}

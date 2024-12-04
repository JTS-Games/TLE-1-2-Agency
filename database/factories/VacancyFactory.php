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
            'image' => fake()->imageUrl(), // Genereer een willekeurige afbeelding URL (of gebruik je eigen logica voor het opslaan van echte afbeeldingen)
            'job_title' => fake()->jobTitle(), // Genereert een willekeurige functietitel
            'description' => fake()->paragraph(3), // Genereert een beschrijving met 3 alinea's
            'location' => fake()->city(), // Genereert een willekeurige stad voor de locatie
            'paycheck' => fake()->randomNumber(5), // Genereert een willekeurig getal voor het salaris
            'competence' => fake()->word(), // Genereert een willekeurig woord voor de competentie
            'contract_term' => fake()->randomDigitNotNull(), // Genereert een willekeurig getal voor het contracttermijn (bijvoorbeeld 12 maanden)
            'working_hours' => fake()->randomNumber(2), // Genereert een willekeurig getal voor werkuren
        ];
    }
}

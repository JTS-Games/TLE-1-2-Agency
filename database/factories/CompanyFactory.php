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
        {
            return [
                'name' => fake()->company(), // Genereert een bedrijfsnaam
                'description' => fake()->paragraph(2), // Genereert een beschrijving met twee alinea's
                'location_hq' => fake()->city(), // Genereert een stad voor de hoofdkwartier locatie
                'coc_extract' => fake()->sentence(8), // Genereert een kort extract van de CoC
                'verified' => fake()->boolean(), // Genereert een willekeurige boolean voor verified (true/false)
                'password' => bcrypt('password123'), // Stel een standaard gehashed wachtwoord in
            ];
        }
    }
}

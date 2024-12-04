<?php

namespace Database\Seeders;

use App\Models\Company;
use Composer\Autoload\ClassLoader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(10)->create();
    }
}

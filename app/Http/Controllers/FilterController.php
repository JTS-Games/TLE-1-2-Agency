<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {

        // Begin de query op de Vacancy-model
        $vacancy = Vacancy::query();

        // Als er een zoekopdracht is, pas de filter toe
        if ($request->filled('search')) {
            $search = $request->input('search');
            $vacancy->where('name', 'LIKE', "%$search%")
                ->orWhere('paycheck', 'LIKE', "%$search%")
                ->orWhere('location', 'LIKE', "%$search%");
        }

        // Haal de gefilterde vacatures op
        $vacancies = $vacancy->get();

        // Retourneer de view met de vacatures
        return view('employee.user-homePage', compact('vacancies'));
    }
}

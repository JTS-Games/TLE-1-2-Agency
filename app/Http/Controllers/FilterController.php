<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        // Haal de zoekparameters op
        $search = $request->input('search');
        $qualificationSearch = $request->input('qualifications');

        // Begin de query op het Vacancy-model
        $vacancy = Vacancy::query();

        // Als er een zoekopdracht is, pas het filter toe op 'name', 'paycheck' en 'location'
        if ($search) {
            $vacancy->where(function($query) use ($search) {
                $query->WhereAny(['name','paycheck','location'], 'LIKE', "%$search%");
            });
        }

        // Als er een kwalificatie is geselecteerd, filter dan op de qualifications
        if ($qualificationSearch) {
            $vacancy->whereHas('qualifications', function ($qualificationQuery) use ($qualificationSearch) {
                $qualificationQuery->where('qualification_id', $qualificationSearch);
            });
        }

        // Haal de gefilterde vacatures op
        $vacancies = $vacancy->get();

        // Haal alle kwalificaties op voor de dropdown
        $allQualifications = Qualification::all();

        // Retourneer de view met de vacatures en kwalificaties
        return view('employee.user-homepage', compact('vacancies', 'allQualifications'));
    }
}
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
        $vacancy->where('is_created', 1);
        // Als er een zoekopdracht is, pas het filter toe op 'name', 'paycheck' en 'location'
        if (isset($search) || isset($qualificationSearch)) {
            $vacancy->where(function ($query) use ($search, $qualificationSearch) {

                if (isset($search)) {
                    $query->where(function ($subQuery) use ($search) {
                        $subQuery->whereAny(['job_title', 'paycheck', 'location'], 'LIKE', "%$search%");
                    });
                }


                if (isset($qualificationSearch)) {
                    $query->whereHas('qualifications', function ($qualificationQuery) use ($qualificationSearch) {
                        $qualificationQuery->where('qualification_id', $qualificationSearch);
                    });
                }
            });
        }

        // Haal de gefilterde vacatures op
        $vacancies = $vacancy->get();

        // Haal alle kwalificaties op voor de dropdown
        $allQualifications = Qualification::all();

        // Retourneer de view met de vacatures en kwalificaties
        return view('profile.all-vacancies', compact('vacancies', 'allQualifications'));
    }
}

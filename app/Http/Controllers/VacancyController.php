<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Company;
use Illuminate\Http\Request;


class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allVacancies = Vacancy::all();
        $allCompanies = Company::all();
        return view('all-vacancies', compact('allVacancies', 'allCompanies'));
    }

    public function indexAdmin(Request $request) {
        if (!$request->user()) {
            abort(401);
        }

        if (!$request->user()->isAdmin()) {
            abort(403);
        }

        $allVacancies = Vacancy::all();
        return view('admin.vacancies', compact('allVacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('create-vacancy', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Vacancy $vacancy)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'job_title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'location' => 'required|string|max:255',
            'paycheck' => 'required|string|max:100',
            'competence' => 'required|string|max:255',
            'contract_term' => 'required|string|max:100',
            'working_hours' => 'required|string|max:100',
        ]);


        $vacancy->job_title = $request->input('job_title');
        $vacancy->description = $request->input('description');
        $vacancy->location = $request->input('location');
        $vacancy->paycheck = $request->input('paycheck');
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('images', $fileName, 'public');
        $vacancy->image = $path;
        $vacancy->competence = $request->input('competence');
        $vacancy->working_hours = $request->input('working_hours');
        $vacancy->contract_term = $request->input('contract_term');

//

        $vacancy->save();

        return redirect()->route('vacancies.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}

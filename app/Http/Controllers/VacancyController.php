<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allVacancies = Vacancy::all();
        return view('all-vacancies', compact('allVacancies'));
    }

    public function indexAdmin(Request $request)
    {
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        return view('single-vacancy', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        $companies = Company::all();
        // Load the details from the form
        // request the old information and put it in the form
        return view('edit-vacancy', compact('vacancy', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {

        validator(
            [$request->only('job_title', 'image', 'paycheck', 'contract_term', 'company_id')],
            // Rules for the requested key.
            [
                'job_title' => 'required|string|max:100',
                'description' => 'required',
                'paycheck' => 'required|numeric',
                'contract_term' => 'required|string|max:255',
            ],
            [
                'job_title.required' => 'Please enter a job title',
                'job_title.max' => 'Title can\'t be longer than 100 characters',
                'description.required' => 'Please enter a job description',
                'paycheck.required' => 'Please enter a paycheck',
                'paycheck.numeric' => 'Paycheck must be a number, you can\'t put any letters',
                'contract_term.required' => 'Please enter a contract term',
                'contract_term.max' => 'Contract term can\'t be longer than 255 characters',

            ]

        );

        $vacancy->job_title = $request->input('job_title');
        $vacancy->description = $request->input('description');
        $vacancy->paycheck = $request->input('paycheck');
        $vacancy->contract_term = $request->input('contract_term');
        $vacancy->location = $request->input('location');
        $vacancy->working_hours = $request->input('working_hours');

        // De company id moet hier nog aangepast met authorisatie.
        $file = $request->file('image');
        if (isset($file)) {
            $originalName = $file->getClientOriginalName();
            $vacancy->image = $file->storeAs('images', $originalName, 'public');
        }


        $vacancy->update();


        return redirect()->route('vacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}

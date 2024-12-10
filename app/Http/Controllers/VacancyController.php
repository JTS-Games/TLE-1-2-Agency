<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Qualification;
use App\Models\Registration;
use App\Models\Vacancy;
use App\Mail\VacancyRegistrationConfirmationMail;
use Illuminate\Support\Facades\Mail;
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


    // create a view for the user to apply for the vacancy
    public function registrationForVacancy(Request $request, Vacancy $vacancy)
    {
        $user = auth()->user();
        if (isset($user)) {
            return view('registration-for-vacancy', compact('vacancy'));
        } else {
            return redirect()->route('login');
        }
    }

    public function storeVacancyRegistration(Request $request, Vacancy $vacancy, Registration $registration)
    {
        $user = auth()->user();
        if (isset($user)) {
            // Check voor het eerste resultaat waar user_id and vacancy_id overeenkomen met de user en vacature
            $existingRegistration = Registration::where('vacancy_id', $vacancy->id)
                ->where('user_id', $user->id)
                ->first();

            if ($existingRegistration) {
                // Zet de error message klaar voor pop-up in registratiepagina
                return back()->with('error', 'U heeft al geregistreerd voor deze vacature.');
            }

            // Creeer the new registration
            $registration->create([
                'vacancy_id' => $vacancy->id,
                'user_id' => $user->id,
            ]);

            Mail::to($user->email)
                ->send(new VacancyRegistrationConfirmationMail($vacancy));


            return redirect()->route('dashboard');
        } else {
            return redirect()->route('/');
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Vacancy $vacancy)
    {
        if (!$request->user()) {
            abort(401);
        }
        $companies = Company::all();

        $qualifications = Qualification::all();
        return view('create-vacancy', compact('vacancy', 'qualifications', 'companies'));
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
            'contract_term' => 'required|string|max:100',
            'working_hours' => 'required|string|max:100',
            'qualifications' => 'required', 'min:1',
            'company_id' => 'required|string|max:100',
        ]);


        $vacancy->job_title = $request->input('job_title');
        $vacancy->description = $request->input('description');
        $vacancy->location = $request->input('location');
        $vacancy->paycheck = $request->input('paycheck');
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('images', $fileName, 'public');
        $vacancy->image = $path;
        $vacancy->working_hours = $request->input('working_hours');
        $vacancy->contract_term = $request->input('contract_term');
        $vacancy->company_id = $request->input('company_id');

        $vacancy->save();

        $qualifications = $request->input('qualifications');
        $vacancy->qualifications()->attach($qualifications);

        return redirect()->route('vacancies.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy, Company $company)
    {
        $company = $vacancy->company;
        return view('single-vacancy', compact('vacancy', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {

        // Dit moet nog aangepast worden naar auth->company ...
//        if (auth()->check() && ($vacancy->company_id === $vacancy->company->id || auth()->user()->isAdmin())) {
//            $companies = Company::all();
//            return view('edit-vacancy', compact('vacancy'));
//        } else {
//            return redirect()->route('/');
//            // Load the details from the form
//            // request the old information and put it in the form
////            return view('edit-vacancy', compact('vacancy', 'companies'));
//        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {

        request()->validate(
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
            $path = $file->storeAs('images', $originalName, 'public');
            $vacancy->image = $path;
        }


        $vacancy->update();


        return redirect()->route('vacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        // Verwijder the vacancy
        $vacancy->delete();

        // Redirect back with a success message
        return redirect()->route('vacancies.index');
    }


}

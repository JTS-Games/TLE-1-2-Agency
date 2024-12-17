<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Qualification;
use App\Models\Registration;
use App\Models\Vacancy;
use App\Mail\VacancyRegistrationConfirmationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacancy $vacancy, Request $request)
    {

        // Haal de zoekparameters op
        $search = $request->input('search');
        $qualificationSearch = $request->input('qualifications');

        // Begin de query op het Vacancy-model
        $vacancy = Vacancy::query();
        $vacancy->where('is_created', 1);

        // Als er een zoekopdracht is, pas het filter toe op 'name', 'paycheck' en 'location'
//        if (isset($search) || isset($qualificationSearch)) {
//            $vacancy->where(function ($query) use ($search, $qualificationSearch) {

        if (isset($search)) {
            $vacancy->where(function ($subQuery) use ($search) {
                $subQuery->whereAny(['job_title', 'paycheck', 'location'], 'LIKE', "%$search%");
            });
        }


        if (isset($qualificationSearch)) {
            $vacancy->whereHas('qualifications', function ($qualificationQuery) use ($qualificationSearch) {
                $qualificationQuery->where('qualification_id', $qualificationSearch);
            });
        }
//            });


        // Haal de gefilterde vacatures op

        // Haal alle kwalificaties op voor de dropdown
        $allQualifications = Qualification::all();

        $allVacancies = $vacancy->get();
//        $allCompanies = Company::all();
        return view('profile.all-vacancies', compact('allVacancies', 'allQualifications'));
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
    public function create(Request $request, Vacancy $vacancy, Qualification $qualification)
    {
//        if (!$request->user()) {
//            abort(401);
//        }s
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


        $company = Auth::guard('company')->user();
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'job_title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'location' => 'required|string|max:255',
            'paycheck' => 'required|string|max:100',
            'contract_term' => 'required|string|max:100',
            'working_hours' => 'required|string|max:100',
            'qualifications' => 'required', 'min:1',
//            'company_id' => 'required|string|max:100',
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
        $vacancy->company_id = $company->id;

        $vacancy->is_created = 0;
        $vacancy->save();

        $qualifications = $request->input('qualifications');
        $vacancy->qualifications()->attach($qualifications);


        return redirect()->route('preview-vacancy', ['vacancyId' => $vacancy->id]);

    }
    public function preview($vacancyId, Company $company)
    {
        $vacancy = Vacancy::find($vacancyId);
        $company = $vacancy->company;
        return view('preview-vacancy', compact('vacancy', 'company'));
    }
    public function confirmCreation($vacancyId)
    {
        $vacancy = Vacancy::find($vacancyId);
        $vacancy->is_created = 1;
        $vacancy->save();

        return redirect()->route('vacancies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy, Company $company)
    {
        if ($vacancy->is_created != 1) {
            abort(404);
        }
        $alreadyRegistered = Registration::where('user_id', auth()->id())->where('vacancy_id', $vacancy->id)->exists();

        $company = Company::find($vacancy->company_id);
        return view('single-vacancy', compact('vacancy', 'company', 'alreadyRegistered'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy, Qualification $qualification )
    {
        if ($vacancy->company_id !== Auth::guard('company')->user()->id) {
            return redirect()->route('vacancies.index')->withErrors(['message' => 'Je hebt geen toestemming om deze vacature te bewerken.']);
        }
        $qualifications = Qualification::all();
        return view('edit-vacancy', compact('vacancy', 'qualifications'));
    }






    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        if ($vacancy->company_id !== Auth::guard('company')->user()->id) {
            return redirect()->route('vacancies.index')->withErrors(['message' => 'Je hebt geen toestemming om deze vacature te bewerken.']);
        }

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
        $vacancy->location = $request->input('location');
        $vacancy->paycheck = $request->input('paycheck');
        $vacancy->working_hours = $request->input('working_hours');
        $vacancy->contract_term = $request->input('contract_term');

        // Handle image upload (only if a new image is provided)
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($vacancy->image && file_exists(storage_path('app/public/' . $vacancy->image))) {
                unlink(storage_path('app/public/' . $vacancy->image));
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
            $vacancy->image = $path;
        }
        if ($vacancy->is_created != 1) {
            $vacancy->is_created = 1;
        }


        $vacancy->update();

        // Update the qualifications
        $qualifications = $request->input('qualifications');
        $vacancy->qualifications()->sync($qualifications); // Use sync() to ensure the qualifications are correctly updated


        return redirect()->route('vacancies.index')->with('success', 'Vacancy updated successfully!');
    }
    public function togglePublication(Vacancy $vacancy) {
        $vacancy->is_created = !$vacancy->is_created;
        $vacancy->save();
        return redirect()->route('company.dashboard')->with('success', 'Vacature status gewijzigd');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $loggedInCompany = Auth::guard('company')->user();
        $loggedInAdmin = Auth::guard('web')->user();

        if (($loggedInCompany && $loggedInCompany->id == $vacancy->company_id)) {
            $vacancy->delete();
            return redirect()->route('company.dashboard')->with('success', 'Vacature verwijdert.');
        }

        if ($loggedInAdmin && $loggedInAdmin->isAdmin()) {
            $vacancy->delete();
            return redirect()->route('admin.vacancies')->with('success', 'Vacature verwijderd door een beheerder.');
        }

        abort(401);
    }
}

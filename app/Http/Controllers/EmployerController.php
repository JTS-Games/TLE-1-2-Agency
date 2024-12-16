<?php

namespace App\Http\Controllers;

use App\Models\Company;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::with(['vacancies'])->where('verified', '1')->get();
        return view('employer.index', compact('companies'));
    }

    public function create(Request $request)
    {
        return view('employer.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'kvkWaardering' => ['required', 'string', 'max:1000'],

            'password' => ['required', 'string', 'max:255',
                'min:8', // minimaal 8 tekens
                'regex:/[A-Z]/', // minstens één hoofdletter
                'regex:/[a-z]/', // minstens één kleine letter
                'regex:/[0-9]/', // minstens één cijfer
                'regex:/[@$!%*?&]/', // minstens één speciaal teken
                'max:255',],

            'email' => [
                'required',
                'string',
                'email', // Controleer of het een geldig e-mailadres is
            ],
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->location_hq = $request->input('location');
        $company->coc_extract = $request->input('kvkWaardering');
        $company->description = $request->input('description');
        $company->password = Hash::make($request->input('password'));
        $company->email = $request->input('email');

        $company->save();

        return redirect()->route('company.login.form');
    }

    public function showLoginForm()
    {
        return view('employer.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        $credentials = ['email' => $request->email, 'password' => $request->password, 'verified' => true];
        if (Auth::guard('company')->attempt($credentials)) {
            // Maak een dashboard view aan
            return redirect()->route('company.dashboard'); // deze moet linken naar vacancies
        } else {
            $company = Company::where('email', $request->email)->first();
            if ($company && !$company->verified) {
                return redirect('/company/login')->withErrors(['verification' => 'Uw account is nog niet geverifieerd.']);
            }
            return redirect('/company/login')->withErrors(['login' => 'Onjuiste inloggegevens.']);
        }
    }

    public function employerDashboard()
    {
        $company = auth('company')->user();
        $vacancies = Vacancy::where('company_id', $company->id)->get();
        return view('company-dashboard', compact('company', 'vacancies'));
    }


    public function show(Request $request, Company $company)
    {
        if (!$company->verified) {
            abort(404);
        }
        $isAdmin = (bool)$request->user()->isAdmin();
        $isCompany = Auth::guard('company')->user();
        $isOwner = false;
        if ($isCompany) {
            if ($isCompany->id === $company->id) {
                $isOwner = true;
            }
        }
        $company = Company::with(['vacancies'])->where('verified', 1)->where('id', $company->id)->first();
        return view('employer.show', compact('company', 'isAdmin', 'isOwner'));
    }

    public function edit(Request $request)
    {
        if (!Auth::guard('company') || !Auth::guard('company')->user()) {
            return redirect()->route('index');
        }
        $company = Auth::guard('company')->user();
        return view('employer.edit', compact('company'));
    }

    public function update(Request $request)
    {
        if (!Auth::guard('company') || !Auth::guard('company')->user()) {
            return redirect()->route('index');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000']
        ]);

        $newName = $request->input('name');
        $newLocation = $request->input('location');
        $newDescription = $request->input('description');

        Auth::guard('company')->user()->name = $newName;
        Auth::guard('company')->user()->location_hq = $newLocation;
        Auth::guard('company')->user()->description = $newDescription;
        Auth::guard('company')->user()->save();

        return redirect()->route('companies.index');
    }

    public function destroy(Request $request, Company $company)
    {
        if ((!Auth::guard('company')->user() || !Auth::guard('company')->user()->id === $company->id) && !$request->user()->admin == 1) {
            return redirect()->route('companies.index');
        }
        $company->delete();
        return redirect()->route('companies.index');
    }
}

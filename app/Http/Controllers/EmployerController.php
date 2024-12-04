<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index()
    {


        return view('employer.registration');
    }


    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'type' =>['required', 'string', 'max:255'],
            'description'=>['required','string', 'max:1000'],
            'kvkWaardering'=>['required','string', 'max:1000'],

            'password'=>['required','string','max:255',
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
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail\.com|outlook\.com|yahoo\.com|hotmail\.com|live\.com)$/',
            ],
        ]);

        $company= new Company();
        $company->name = $request->input('name');
        $company->location_hq = $request->input('location');
        $company->coc_extract = $request->input('kvkWaardering');
        $company->description = $request->input('description');
        $company->password = Hash::make($request->input('password'));
        $company->email= $request->input('email');

        $company->save();

        return redirect()->route('companies.index', compact('company', 'request'));
    }

    public function showLoginForm()
    {
        return view('employer.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Inloggen succesvol voor bedrijf
            return redirect('/');
        } else {
            // Inloggen mislukt voor bedrijf
            return redirect('/company/login');
        }
    }
}

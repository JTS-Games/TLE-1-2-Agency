<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use function Pest\Laravel\delete;

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

        $vacancy-> delete();
        return redirect()->route('admin.vacancies.index');
    }
    public function suspicious(Request $request)
    {
        if (!$request->user()) {
            abort(401, 'Je moet ingelogd zijn.');
        }

        if (!$request->user()->isAdmin()) {
            abort(403, 'Alleen admins hebben toegang tot deze pagina.');
        }

        $suspiciousVacancies = Vacancy::where('is_suspicious', true)->get();

        return view('admin.suspicious-vacancies', compact('suspiciousVacancies'));
    }
}

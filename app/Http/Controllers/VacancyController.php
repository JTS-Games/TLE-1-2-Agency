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
     * Remove the specified vacanty from the database.
     */
    public function destroy(Vacancy $vacancy)
    {
        $user = auth()->user();

        // Check if the user is an admin or the company that owns the vacancy
        if ($user->isAdmin() || $vacancy->company_id === $user->company_id) {
            // Delete the vacancy
            $vacancy->delete();

            // Redirect to the vacancies index (admin view or company's own vacancies view)
            return redirect()->route('admin.vacancies.index');
        }

        // If the user is neither an admin nor the owner of the vacancy, abort with a 403 Forbidden status
        abort(403, 'You do not have permission to delete this vacancy.');
    }

}

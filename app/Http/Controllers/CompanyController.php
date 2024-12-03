<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->user()){
            abort(401);
        }

        if (!$request->user()->isAdmin()){
            abort(403);
        }

        $companies = Company::where('verified', 0)->get();
        return view('admin.registrations-overview', compact('companies'));
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
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        if (!$request->user()){
            abort(401);
        }

        if (!$request->user()->isAdmin()){
            abort(403);
        }

        $company->verified = 1;
        $company->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if (!$request->user()){
            abort(401);
        }

        if (!$request->user()->isAdmin()){
            abort(403);
        }

        $company = Company::find($id);
        $company->delete();
        return redirect()->back();
    }
}

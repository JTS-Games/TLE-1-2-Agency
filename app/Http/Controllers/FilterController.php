<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(){

        $vacancies = Vacancy::all();
        return view('employee.user-homePage', compact('vacancies'));
    }
}

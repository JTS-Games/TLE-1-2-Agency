<?php

use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/vacatures', [VacancyController::class, 'indexAdmin'])->name('admin.vacancies.index');

<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InspirationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::resource('/screenings', AdminController::class);

// This one could be used for the employee and employers, the vacancies controller.
Route::resource('/vacancies', VacancyController::class);
// User Controllers
Route::get('/about', [AboutUsController::class, 'about'])->name('about');
Route::get('/inspiration', [InspirationController::class, 'inspiration'])->name('inspiration');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

require __DIR__ . '/auth.php';

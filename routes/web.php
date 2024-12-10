<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\InspirationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Models\Registration;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    $userRegistration = Registration::where('user_id', auth()->id())->get();
    return view('dashboard', compact('userRegistration'));
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

Route::get('/vacancies/{vacancy}/aanmelden', [VacancyController::class, 'registrationForVacancy'])->name('vacancies.registration');
Route::post('/aanmelden-vacature/{vacancy}', [VacancyController::class, 'storeVacancyRegistration'])->name('vacancies.registration.store');
//employer registration route
Route::resource('companies', EmployerController::class);
Route::get('/company/login', [EmployerController::class, 'showLoginForm'])->name('company.login.form');
Route::post('/company/login', [EmployerController::class, 'login'])->name('company.login');
//filter routes.
Route::get('/user-homepage', [FilterController::class, 'index'])->name('userHomepage');
Route::get('/user-homepage/{qualification?}', [FilterController::class, 'genreFilter'])->name('userHomepage');

// User Controllers
Route::get('/about', [AboutUsController::class, 'about'])->name('about');
Route::get('/inspiration', [InspirationController::class, 'inspiration'])->name('inspiration');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/test-email', function () {
    Mail::to('Emregulec70@gmail.com')->send(new TestEmail());
    return 'Test email verzonden!';
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployerController;
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

Route::get('/inspiratie', function () {
    return view('inspiration');
})->name('inspiration');

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
//Route::get('/vacancies', [FilterController::class, 'index'])->name('vacancies.index');
//Route::get('/vacancies/{qualification?}', [FilterController::class, 'genreFilter'])->name('vacancies.index');
Route::get('/vacancy/preview/{vacancyId}', [VacancyController::class, 'preview'])->name('preview-vacancy');
Route::post('/vacancies/confirm/{vacancyId}', [VacancyController::class, 'confirmCreation'])->name('vacancies.confirm');
//Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::post('/vacancies/{vacancy}/toggle', [VacancyController::class, 'togglePublication'])->name('vacancies.toggle');

Route::get('/appointment/{appointment}', [AppointmentController::class, 'show'])->name('appointment.show');
Route::post('/appointment/{appointment}/accept', [AppointmentController::class, 'accept'])->name('appointment.accept');

Route::get('/vacancies/{vacancy}/aanmelden', [VacancyController::class, 'registrationForVacancy'])->name('vacancies.registration');
Route::post('/aanmelden-vacature/{vacancy}', [VacancyController::class, 'storeVacancyRegistration'])->name('vacancies.registration.store');
//employer registration route
Route::get('/companies', [EmployerController::class, 'index'])->name('company.registration');
Route::get('/company/login', [EmployerController::class, 'showLoginForm'])->name('company.login.form');
Route::post('/company/login', [EmployerController::class, 'login'])->name('company.login');
Route::resource('companies', EmployerController::class);

Route::prefix('company')->middleware(['auth:company'])->group(function () {
    Route::get('/dashboard', [EmployerController::class, 'employerDashboard'])->name('company.dashboard');
    Route::get('/edit', [EmployerController::class, 'edit'])->name('company.edit');
    Route::patch('/update', [EmployerController::class, 'update'])->name('company.update');
    Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
    Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
});

Route::post('appointments/store/{vacancy}', [AppointmentController::class, 'store'])->name('appointments.store');


// User Controllers
Route::get('/about', [AboutUsController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/test-email', function () {
    Mail::to('Emregulec70@gmail.com')->send(new TestEmail());
    return 'Test email verzonden!';
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

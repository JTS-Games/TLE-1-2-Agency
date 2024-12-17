<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Registration;
use App\Models\Vacancy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteNotification;

class AppointmentController extends Controller
{
    public function store(Request $request, Vacancy $vacancy)
    {
        if (!Auth::guard('company')->user() || Auth::guard('company')->user()->id !== $vacancy->company_id) {
            return redirect()->route('company.dashboard')->with('error', 'U kunt geen kandidaten uitnodigen voor een ander bedrijf.');
        }

        $nextRegistrationInLine = Registration::where('vacancy_id', $vacancy->id)
            ->orderBy('created_at', 'asc')
            ->first();

        if (!$nextRegistrationInLine) {
            return redirect()->route('company.dashboard', $vacancy)
                ->with('error', 'Er zijn geen kandidaten om uit te nodigen.');
        }

        $existingAppointment = Appointment::where('vacancy_id', $vacancy->id)->exists();

        if ($existingAppointment) {
            return redirect()->route('company.dashboard', $vacancy)
                ->with('error', 'U kunt maar één kandidaat tegelijk uitnodigen voor een vacature.');
        }

        $appointment = new Appointment();
        $appointment->user_id = $nextRegistrationInLine->user_id;
        $appointment->vacancy_id = $nextRegistrationInLine->vacancy_id;
        $appointment->description = $request->input("description");
        $appointment->company_id = Auth::guard('company')->user()->id;
        $appointment->date = $request->input('date');
        $appointment->verified = 0;
        $appointment->save();

        $nextRegistrationInLine->delete();

        // Haal user informatie vanuit de database
        $user = User::find($nextRegistrationInLine->user_id);

        if ($user) {
            // Stuur de emails
            Mail::to($user->email)
                ->send(new InviteNotification($user->name, $vacancy, $appointment));
        }

        return redirect()->route('company.dashboard', $vacancy)
            ->with('success', 'Kandidaat succesvol uitgenodigd.');
    }
}

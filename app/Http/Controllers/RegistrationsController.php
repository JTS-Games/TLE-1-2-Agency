<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // Assuming Registration model exists
use App\Models\Vacancy;

class RegistrationsController extends Controller
{
    /**
     * Store the registration of a user for a vacancy.
     */
    public function store(Request $request, $vacancyId)
    {
        // Check if user is logged in
        if (!$request->user()) {
            abort(401, 'Je moet ingelogd zijn om te solliciteren.');
        }

        // Validate that the vacancy exists
        $vacancy = Vacancy::find($vacancyId);
        if (!$vacancy) {
            abort(404, 'Vacature niet gevonden.');
        }

        // Check if the user has already applied for this vacancy
        $existingRegistration = Registration::where('user_id', $request->user()->id)
            ->where('vacancy_id', $vacancyId)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'Je hebt al gesolliciteerd op deze vacature.');
        }

        // Create a new registration
        $registration = new Registration();
        $registration->user_id = $request->user()->id;
        $registration->vacancy_id = $vacancyId;
        $registration->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Je sollicitatie is succesvol ingediend.');
    }
}

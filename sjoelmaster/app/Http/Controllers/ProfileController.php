<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Toon het formulier voor het bewerken van het profiel van de gebruiker.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Werk de profielinformatie van de gebruiker bij.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        // Stel de e-mailverificatie opnieuw in als het e-mailadres is gewijzigd
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profiel-bijgewerkt');
    }

    /**
     * Verwijder het account van de gebruiker.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout(); // Log de gebruiker uit

        $user->delete(); // Verwijder de gebruiker

        // Invalideer de sessie en genereer een nieuw token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/'); // Stuur de gebruiker terug naar de startpagina
    }
}

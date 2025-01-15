<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Fill the user's fields with validated data
        $user->fill($request->validated());

        // Check if the email field is dirty to reset the email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle the profile picture if an image is uploaded
        if ($request->hasFile('logo')) {
            // Delete previous logo if it exists
            if ($user->logo_url && Storage::exists($user->logo_url)) {
                Storage::delete($user->logo_url);
            }

            // Store new logo image
            $logoPath = $request->file('logo')->store('user-logos', 'public');
            $user->logo_url = $logoPath;
        }

        // Save the updated user data
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log the user out and delete their account
        Auth::logout();

        // Delete the user's profile image if exists
        if ($user->logo_url && Storage::exists($user->logo_url)) {
            Storage::delete($user->logo_url);
        }

        // Delete the user record from the database
        $user->delete();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

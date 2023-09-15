<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Specialization;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $specializations = Specialization::all(); 

        return view('profile.edit', [
            'user' => $request->user(), 
            'specializations' => $specializations,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $specializations = $request->input('specializations', []);

        $request->user()->specializations()->sync($specializations);

        $request->user()->save();
        // dd($request);

        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Delete related doctor if exists
        $user = User::findOrFail($user->id);
        $user->delete();

        // Detach all specializations
        $user->specializations()->detach();

        // Perform a hard delete
        DB::table('users')->where('id', $user->id)->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('success', 'Account eliminato con successo.');
    }

}

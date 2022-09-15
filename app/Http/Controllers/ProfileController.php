<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    //
    public function updateProfile(Request $request)
    {

        $request->validate([
            'profile_picture' => 'nullable|mimes:png,jpg',
            'state' => 'nullable|string',
            'dob' => 'nullable|string|max:255',
            'next_of_kin' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'next_of_kin_address' => 'nullable|string',
        ]);
        $filename = Auth::user()->profile->profile_picture;

        if ($request->hasFile('profile_picture')) {
            $ext = $request->file('profile_picture')->getClientOriginalExtension();
            $filename = time() . uniqid() . '.' . $ext;
            $request->file('profile_picture')->storeAs('public/profile', $filename);
        }

        Auth::user()->profile()->update([
            'state' => $request->state,
            'dob' => $request->dob,
            'next_of_kin' => $request->next_of_kin,
            'address' => $request->address,
            'next_of_kin_address' => $request->next_of_kin_address,
            'profile_picture' => $filename,
        ]);

        return back()->with(['success' => 'Profile updated successfully']);
    }
    public function editProfile(Profile $profile)
    {
        $user = Auth::user();
        $states = State::all();

        return Inertia::render('Edit_Profile', [
            'user' => $user,
            'profile' => $profile,
            'states' => $states
        ]);
    }
    public function profile()
    {
        $user = Auth::user();
        $profile = $user->profile;
        return Inertia::render('Profile', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}

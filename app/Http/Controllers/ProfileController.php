<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email is already used by another user.',
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('profile.index')
                           ->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to update profile: ' . $e->getMessage())
                           ->withInput();
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'current_password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.confirmed' => 'Password confirmation does not match.',
            'new_password.min' => 'Password must be at least 8 characters.',
        ]);

        $user = Auth::user();

        // Cek password saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                           ->with('error', 'Current password is incorrect.')
                           ->withInput();
        }

        try {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('profile.index')
                           ->with('success', 'Password changed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to change password: ' . $e->getMessage());
        }
    }
}

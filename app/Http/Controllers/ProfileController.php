<?php

namespace App\Http\Controllers;

use App\Concerns\PasswordValidationRules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    use PasswordValidationRules;

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $email = strtolower($validated['email']);
        $emailExists = $user::query()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->whereKeyNot($user->id)
            ->exists();

        if ($emailExists) {
            throw ValidationException::withMessages([
                'email' => 'Email sudah digunakan oleh akun lain.',
            ]);
        }

        $user->forceFill([
            'name' => $validated['name'],
            'email' => $email,
            'email_verified_at' => $email !== strtolower($user->email) ? null : $user->email_verified_at,
        ])->save();

        return back()->with('status', 'Profile berhasil diperbarui.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => $this->currentPasswordRules(),
            'password' => $this->passwordRules(),
        ]);

        $request->user()->forceFill([
            'password' => Hash::make($validated['password']),
        ])->save();

        return back()->with('password_status', 'Password berhasil diperbarui.');
    }

    public function updatePhoto(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'profile_photo' => [
                'required',
                'image',
                Rule::dimensions()->maxWidth(3000)->maxHeight(3000),
                'max:2048',
            ],
        ]);

        $user = $request->user();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $path = $validated['profile_photo']->store('profile-photos', 'public');

        $user->forceFill([
            'profile_photo_path' => $path,
        ])->save();

        return back()->with('photo_status', 'Foto profile berhasil diperbarui.');
    }
}

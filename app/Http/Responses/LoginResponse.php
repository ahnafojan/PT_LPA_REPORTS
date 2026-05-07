<?php

namespace App\Http\Responses;

use App\Enums\UserRole;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        $path = match ($user?->role) {
            UserRole::SuperAdmin => route('superadmin.dashboard', absolute: false),
            default => route('dashboard', absolute: false),
        };

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->to($path);
    }
}

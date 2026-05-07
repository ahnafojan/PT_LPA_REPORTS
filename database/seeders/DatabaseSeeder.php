<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@lpa.local'],
            [
                'name' => 'Admin LPA',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'AdminLpa#2026')),
                'role' => UserRole::Admin,
                'is_active' => true,
                'email_verified_at' => now(),
            ],
        );

        User::query()->updateOrCreate(
            ['email' => 'superadmin@lpa.local'],
            [
                'name' => 'Super Admin LPA',
                'password' => Hash::make(env('SUPER_ADMIN_PASSWORD', 'SuperAdminLpa#2026')),
                'role' => UserRole::SuperAdmin,
                'is_active' => true,
                'email_verified_at' => now(),
            ],
        );
    }
}

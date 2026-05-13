<?php

use App\Enums\UserRole;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk();
});

test('admins and super admins can visit notifications', function (UserRole $role) {
    $user = User::factory()->create([
        'role' => $role,
    ]);

    $this->actingAs($user);

    $response = $this->get(route('notifications'));
    $response->assertOk();
})->with([
    'admin' => UserRole::Admin,
    'super admin' => UserRole::SuperAdmin,
]);

test('notifications use the correct sidebar for the authenticated role', function (UserRole $role, string $expectedMenu) {
    $user = User::factory()->create([
        'role' => $role,
    ]);

    $this->actingAs($user);

    $response = $this->get(route('notifications'));
    $response->assertOk()->assertSee($expectedMenu);
})->with([
    'admin' => [UserRole::Admin, 'Input Laporan'],
    'super admin' => [UserRole::SuperAdmin, 'Manajemen Jenis Laporan'],
]);

test('admin loading state pages can be rendered', function (string $routeName) {
    $user = User::factory()->create([
        'role' => UserRole::Admin,
    ]);

    $this->actingAs($user);

    $response = $this->get(route($routeName));
    $response->assertOk();
})->with([
    'my reports' => 'reports.mine',
    'monthly finance form' => 'reports.forms.keuangan-bulanan',
]);

test('super admin loading state pages can be rendered', function () {
    $user = User::factory()->create([
        'role' => UserRole::SuperAdmin,
    ]);

    $this->actingAs($user);

    $response = $this->get(route('superadmin.monitoring'));
    $response->assertOk();
});

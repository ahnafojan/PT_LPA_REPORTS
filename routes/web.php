<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');

Route::middleware(['auth', 'no.auth.cache', 'role:admin,super_admin'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('reports/input', 'reports.input')->name('reports.input');
    Route::view('reports/input/keuangan-bulanan', 'reports.forms.keuangan-bulanan')->name('reports.forms.keuangan-bulanan');
    Route::view('reports/saya', 'reports.mine')->name('reports.mine');
    Route::view('reports/riwayat', 'reports.history')->name('reports.history');
    Route::view('reports/export', 'reports.export')->name('reports.export');
    Route::view('notifications', 'notifications.index')->name('notifications');
    Route::view('profile', 'profile')->name('profile');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
});

Route::middleware(['auth', 'no.auth.cache', 'role:super_admin'])->group(function () {
    Route::view('superadmin', 'superadmin.dashboard')->name('superadmin.dashboard');
    Route::view('superadmin/jenis-laporan', 'superadmin.report-types')->name('superadmin.report-types');
    Route::view('superadmin/fields', 'superadmin.fields')->name('superadmin.fields');
    Route::view('superadmin/admins', 'superadmin.admins')->name('superadmin.admins');
    Route::view('superadmin/monitoring', 'superadmin.monitoring')->name('superadmin.monitoring');
    Route::view('superadmin/periods', 'superadmin.periods')->name('superadmin.periods');
    Route::view('superadmin/exports', 'superadmin.exports')->name('superadmin.exports');
    Route::view('superadmin/logs', 'superadmin.logs')->name('superadmin.logs');
    Route::redirect('superadmin/menu-builder', 'superadmin/jenis-laporan')->name('superadmin.menu-builder');
    Route::redirect('superadmin/form-builder', 'superadmin/fields')->name('superadmin.form-builder');
});

require __DIR__ . '/settings.php';

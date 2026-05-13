<?php

return [
    'areas' => [
        'admin' => [
            'title' => 'Admin',
            'brand_route' => 'dashboard',
            'profile_area' => 'admin',
            'items' => [
                ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard', 'icon' => 'dashboard'],
                ['label' => 'Input Laporan', 'route' => 'reports.input', 'active' => 'reports.input', 'icon' => 'input'],
                ['label' => 'Daftar Laporan Saya', 'route' => 'reports.mine', 'active' => 'reports.mine', 'icon' => 'list'],
                ['label' => 'Riwayat Laporan', 'route' => 'reports.history', 'active' => 'reports.history', 'icon' => 'archive'],
                ['label' => 'Laporan & Export', 'route' => 'reports.export', 'active' => 'reports.export', 'icon' => 'export'],
            ],
        ],

        'superadmin' => [
            'title' => 'Super Admin',
            'brand_route' => 'superadmin.dashboard',
            'profile_area' => 'superadmin',
            'items' => [
                ['label' => 'Dashboard', 'route' => 'superadmin.dashboard', 'active' => 'superadmin.dashboard', 'icon' => 'dashboard'],
                ['label' => 'Manajemen Jenis Laporan', 'route' => 'superadmin.report-types', 'active' => 'superadmin.report-types', 'icon' => 'report-types'],
                ['label' => 'Manajemen Field / Kolom', 'route' => 'superadmin.fields', 'active' => 'superadmin.fields', 'icon' => 'form-builder'],
                ['label' => 'Manajemen Admin', 'route' => 'superadmin.admins', 'active' => 'superadmin.admins', 'icon' => 'users'],
                ['label' => 'Monitoring Laporan', 'route' => 'superadmin.monitoring', 'active' => 'superadmin.monitoring', 'icon' => 'monitor'],
                ['label' => 'Pengaturan Periode', 'route' => 'superadmin.periods', 'active' => 'superadmin.periods', 'icon' => 'calendar'],
                ['label' => 'Laporan & Export', 'route' => 'superadmin.exports', 'active' => 'superadmin.exports', 'icon' => 'export'],
                ['label' => 'Log Aktivitas', 'route' => 'superadmin.logs', 'active' => 'superadmin.logs', 'icon' => 'activity'],
            ],
        ],
    ],
];

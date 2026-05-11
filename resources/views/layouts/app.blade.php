@php
$isSuperadminArea = request()->routeIs('superadmin.*')
    || request('area') === 'superadmin'
    || (request()->routeIs('profile') && auth()->user()?->isSuperAdmin());

$adminMenuItems = [
    ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard', 'icon' => 'dashboard'],
    ['label' => 'Input Laporan', 'route' => 'reports.input', 'active' => 'reports.input', 'icon' => 'input'],
    ['label' => 'Daftar Laporan Saya', 'route' => 'reports.mine', 'active' => 'reports.mine', 'icon' => 'list'],
    ['label' => 'Riwayat Laporan', 'route' => 'reports.history', 'active' => 'reports.history', 'icon' => 'archive'],
    ['label' => 'Notifikasi', 'route' => 'notifications', 'active' => 'notifications', 'icon' => 'bell'],
    ['label' => 'Laporan & Export', 'route' => 'reports.export', 'active' => 'reports.export', 'icon' => 'export'],
];

$superadminMenuItems = [
    ['label' => 'Dashboard', 'route' => 'superadmin.dashboard', 'active' => 'superadmin.dashboard', 'icon' => 'dashboard'],
    ['label' => 'Manajemen Jenis Laporan', 'route' => 'superadmin.report-types', 'active' => 'superadmin.report-types', 'icon' => 'report-types'],
    ['label' => 'Manajemen Field / Kolom', 'route' => 'superadmin.fields', 'active' => 'superadmin.fields', 'icon' => 'form-builder'],
    ['label' => 'Manajemen Admin', 'route' => 'superadmin.admins', 'active' => 'superadmin.admins', 'icon' => 'users'],
    ['label' => 'Monitoring Laporan', 'route' => 'superadmin.monitoring', 'active' => 'superadmin.monitoring', 'icon' => 'monitor'],
    ['label' => 'Pengaturan Periode', 'route' => 'superadmin.periods', 'active' => 'superadmin.periods', 'icon' => 'calendar'],
    ['label' => 'Laporan & Export', 'route' => 'superadmin.exports', 'active' => 'superadmin.exports', 'icon' => 'export'],
    ['label' => 'Log Aktivitas', 'route' => 'superadmin.logs', 'active' => 'superadmin.logs', 'icon' => 'activity'],
];

$menuItems = $isSuperadminArea ? $superadminMenuItems : $adminMenuItems;
$brandRoute = $isSuperadminArea ? 'superadmin.dashboard' : 'dashboard';
$sectionTitle = $isSuperadminArea ? 'Super Admin' : 'Admin';
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body
    x-data="{
        sidebarOpen: false,
        sidebarCollapsed: localStorage.getItem('lpa-sidebar-collapsed') === 'true',
        darkMode: document.documentElement.classList.contains('dark'),
        toggleDarkMode() {
            this.darkMode = ! this.darkMode;
            localStorage.setItem('lpa-theme', this.darkMode ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', this.darkMode);
        },
    }"
    x-init="$watch('sidebarCollapsed', value => localStorage.setItem('lpa-sidebar-collapsed', value ? 'true' : 'false'))"
    class="min-h-screen bg-white text-slate-800 antialiased dark:bg-slate-950 dark:text-slate-100"
    style="font-family: Poppins, ui-sans-serif, system-ui, sans-serif;">
    <div
        class="min-h-screen transition-[grid-template-columns] duration-200 lg:grid"
        :class="sidebarCollapsed ? 'lg:grid-cols-[4.75rem_minmax(0,1fr)]' : 'lg:grid-cols-[18rem_minmax(0,1fr)]'">
        <button
            type="button"
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-30 bg-slate-900/35 lg:hidden"
            aria-label="Tutup sidebar"></button>

        @include('layouts.app.sidebar')

        <div class="min-w-0">
            <header class="sticky top-0 z-20 border-b border-[#e4f1e2] bg-white/85 px-4 py-3 backdrop-blur dark:border-slate-800 dark:bg-slate-950/85 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex min-w-0 items-center gap-3">
                        <button
                            type="button"
                            @click="sidebarOpen = true"
                            class="grid h-10 w-10 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] transition hover:bg-[#eef8ec] dark:bg-slate-900 dark:text-emerald-300 dark:ring-slate-700 dark:hover:bg-slate-800 lg:hidden"
                            aria-label="Buka sidebar">
                            <x-sidebar-icon name="menu" class="h-5 w-5" />
                        </button>

                        <button
                            type="button"
                            @click="sidebarCollapsed = ! sidebarCollapsed"
                            class="hidden h-10 w-10 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] transition hover:bg-[#eef8ec] dark:bg-slate-900 dark:text-emerald-300 dark:ring-slate-700 dark:hover:bg-slate-800 lg:grid"
                            aria-label="Toggle sidebar">
                            <x-sidebar-icon name="menu" class="h-5 w-5" />
                        </button>

                        <div class="min-w-0">
                            <h1 class="truncate text-xl font-semibold text-slate-900 dark:text-slate-100">{{ $title ?? 'Dashboard' }}</h1>
                        </div>
                    </div>

                    <div class="hidden flex-col items-end gap-0.5 md:flex">
                        <span class="text-sm font-semibold text-slate-800 dark:text-slate-200">
                            {{ now()->translatedFormat('l, d M Y') }}
                        </span>
                        <span
                            class="text-xs text-slate-400 tabular-nums dark:text-slate-500"
                            x-data="{
                                time: '',
                                tick() {
                                    this.time = new Intl.DateTimeFormat('id-ID', {
                                        hour: '2-digit',
                                        minute: '2-digit',
                                        second: '2-digit',
                                        hour12: false,
                                    }).format(new Date());
                                },
                                init() {
                                    this.tick();
                                    setInterval(() => this.tick(), 1000);
                                },
                            }"
                            x-text="time"></span>
                    </div>
                </div>
            </header>

            <main class="p-4 sm:p-6 lg:p-8">
                <flux:main>
                    {{ $slot }}
                </flux:main>
            </main>
        </div>
    </div>

    @persist('toast')
    <flux:toast.group>
        <flux:toast />
    </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>

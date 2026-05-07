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
    x-data="{ sidebarOpen: false, sidebarCollapsed: localStorage.getItem('lpa-sidebar-collapsed') === 'true' }"
    x-init="$watch('sidebarCollapsed', value => localStorage.setItem('lpa-sidebar-collapsed', value ? 'true' : 'false'))"
    class="min-h-screen bg-[#f7fbf6] text-slate-800 antialiased"
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

        <aside
            class="fixed inset-y-0 left-0 z-40 flex h-screen w-72 -translate-x-full flex-col border-r border-[#dcefd9] bg-white px-3 py-4 shadow-xl transition duration-200 lg:sticky lg:top-0 lg:w-auto lg:translate-x-0 lg:shadow-sm"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
            <div class="flex items-center gap-3 border-b border-[#dcefd9] pb-4">
                <a href="{{ route($brandRoute) }}" class="flex min-w-0 flex-1 items-center gap-3" wire:navigate>
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="PT Lucky Print Abadi"
                        width="40"
                        height="40"
                        class="h-10 w-10 shrink-0 rounded-md object-contain">
                    <span class="min-w-0" :class="sidebarCollapsed ? 'lg:hidden' : ''">
                        <span class="block truncate text-sm font-semibold leading-tight text-slate-900">PT Lucky Print Abadi</span>
                        <span class="block text-xs font-medium text-[#004D26]">{{ $sectionTitle }}</span>
                    </span>
                </a>
            </div>

            <nav class="mt-5 flex-1 space-y-1 overflow-y-auto">
                <p class="px-3 pb-2 text-xs font-semibold uppercase tracking-[0.16em] text-slate-400" :class="sidebarCollapsed ? 'lg:hidden' : ''">
                    {{ $sectionTitle }}
                </p>

                @foreach ($menuItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    wire:navigate
                    title="{{ $item['label'] }}"
                    @click="sidebarOpen = false"
                    @class([ 'group flex min-h-11 items-center gap-3 rounded-md px-3 py-2 text-sm font-semibold transition' , 'bg-[#e8f7e6] text-[#004D26] ring-1 ring-[#c9e9c8]'=> request()->routeIs($item['active']),
                    'text-slate-600 hover:bg-[#f2faf0] hover:text-[#004D26]' => ! request()->routeIs($item['active']),
                    ])
                    >
                    <span @class([ 'grid h-8 w-8 shrink-0 place-items-center rounded-md transition' , 'bg-[#004D26] text-white'=> request()->routeIs($item['active']),
                        'bg-white text-[#004D26] ring-1 ring-[#d8edd8] group-hover:bg-[#e8f7e6]' => ! request()->routeIs($item['active']),
                        ])>
                        <x-sidebar-icon :name="$item['icon']" class="h-4.5 w-4.5" />
                    </span>
                    <span class="truncate" :class="sidebarCollapsed ? 'lg:hidden' : ''">{{ $item['label'] }}</span>
                </a>
                @endforeach
            </nav>

            <div class="mt-4 border-t border-[#dcefd9] pt-4">
                <a
                    href="{{ route('profile', ['area' => $isSuperadminArea ? 'superadmin' : 'admin']) }}"
                    @click="sidebarOpen = false"
                    @class([ 'flex items-center gap-3 rounded-md px-3 py-2 text-sm font-semibold ring-1 transition' , 'bg-[#e8f7e6] text-[#004D26] ring-[#c9e9c8]'=> request()->routeIs('profile'),
                    'bg-white text-slate-600 ring-[#d8edd8] hover:bg-[#f7fbf6] hover:text-[#004D26]' => ! request()->routeIs('profile'),
                    ])
                    wire:navigate>
                    <span @class([ 'grid h-8 w-8 shrink-0 place-items-center rounded-md ring-1 transition' , 'bg-[#004D26] text-white ring-[#004D26]'=> request()->routeIs('profile'),
                        'bg-[#f7fbf6] text-[#004D26] ring-[#d8edd8]' => ! request()->routeIs('profile'),
                        ])>
                        <x-sidebar-icon name="profile" class="h-4.5 w-4.5" />
                    </span>
                    <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Profile</span>
                </a>
                <form id="sidebar-logout-form" method="POST" action="{{ route('logout') }}" class="mt-2" x-data="{ confirmLogoutOpen: false }">
                    @csrf
                    <button
                        type="button"
                        @click="confirmLogoutOpen = true"
                        class="flex w-full items-center gap-3 rounded-md bg-white px-3 py-2 text-left text-sm font-semibold text-slate-600 ring-1 ring-[#d8edd8] transition hover:bg-[#f7fbf6] hover:text-[#004D26]">
                        <span class="grid h-8 w-8 shrink-0 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8]">
                            <x-sidebar-icon name="logout" class="h-4.5 w-4.5" />
                        </span>
                        <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Logout</span>
                    </button>

                    <template x-teleport="body">
                        <div
                            x-cloak
                            x-show="confirmLogoutOpen"
                            x-transition.opacity
                            @keydown.escape.window="confirmLogoutOpen = false"
                            class="fixed inset-0 z-50 grid place-items-center bg-slate-900/35 px-4">
                            <div
                                x-show="confirmLogoutOpen"
                                x-transition.scale.origin.center
                                @click.outside="confirmLogoutOpen = false"
                                class="w-full max-w-sm rounded-md bg-white p-6 shadow-xl ring-1 ring-[#d8edd8]">
                                <div class="flex items-start gap-3">
                                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8]">
                                        <x-sidebar-icon name="logout" class="h-5 w-5" />
                                    </span>
                                    <div class="min-w-0">
                                        <h2 class="text-lg font-semibold text-slate-900">Keluar dari akun?</h2>
                                        <p class="mt-1 text-sm leading-6 text-slate-500">Sesi kamu akan diakhiri dan kamu perlu login kembali.</p>
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end gap-2">
                                    <button
                                        type="button"
                                        @click="confirmLogoutOpen = false"
                                        class="rounded-md bg-white px-4 py-2 text-sm font-bold text-slate-600 ring-1 ring-[#d8edd8] transition hover:bg-[#f7fbf6] hover:text-[#004D26]">
                                        Batal
                                    </button>
                                    <button
                                        type="submit"
                                        form="sidebar-logout-form"
                                        class="rounded-md bg-[#004D26] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#003D1F]">
                                        Ya, logout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </form>
            </div>
        </aside>

        <div class="min-w-0">
            <header class="sticky top-0 z-20 border-b border-[#e4f1e2] bg-white/85 px-4 py-3 backdrop-blur sm:px-6 lg:px-8">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex min-w-0 items-center gap-3">
                        <button
                            type="button"
                            @click="sidebarOpen = true"
                            class="grid h-10 w-10 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] transition hover:bg-[#eef8ec] lg:hidden"
                            aria-label="Buka sidebar">
                            <x-sidebar-icon name="menu" class="h-5 w-5" />
                        </button>

                        <button
                            type="button"
                            @click="sidebarCollapsed = ! sidebarCollapsed"
                            class="hidden h-10 w-10 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] transition hover:bg-[#eef8ec] lg:grid"
                            aria-label="Toggle sidebar">
                            <x-sidebar-icon name="menu" class="h-5 w-5" />
                        </button>

                        <div class="min-w-0">
                            <h1 class="truncate text-xl font-semibold text-slate-900">{{ $title ?? 'Dashboard' }}</h1>
                        </div>
                    </div>

                    <div class="hidden flex-col items-end gap-0.5 md:flex">
                        <span class="text-sm font-semibold text-slate-800">
                            {{ now()->translatedFormat('l, d M Y') }}
                        </span>
                        <span
                            class="text-xs text-slate-400 tabular-nums"
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
                {{ $slot }}
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

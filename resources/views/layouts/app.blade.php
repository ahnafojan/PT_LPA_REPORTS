@php
    $isSuperadminArea = request()->routeIs('superadmin.*')
        || request('area') === 'superadmin'
        || (request()->routeIs('profile') && auth()->user()?->isSuperAdmin());

    $navigationArea = $isSuperadminArea ? 'superadmin' : 'admin';
    $navigation = config("navigation.areas.{$navigationArea}");

    $menuItems = $navigation['items'];
    $brandRoute = $navigation['brand_route'];
    $profileArea = $navigation['profile_area'];
    $sectionTitle = $navigation['title'];
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
            const theme = this.darkMode ? 'light' : 'dark';
            this.darkMode = theme === 'dark';
            localStorage.setItem('flux.appearance', theme);
            window.Flux?.applyAppearance?.(theme);
            window.Flux && (window.Flux.appearance = theme);
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

        @include('partials.sidebar')

        <div class="min-w-0">
            @include('partials.app-header')

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

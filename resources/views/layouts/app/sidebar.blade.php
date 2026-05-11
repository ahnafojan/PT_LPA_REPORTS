<aside
    class="fixed inset-y-0 left-0 z-40 flex h-screen w-72 -translate-x-full flex-col border-r border-[#dcefd9] bg-white px-3 py-4 shadow-xl transition duration-200 dark:border-slate-800 dark:bg-slate-950 lg:sticky lg:top-0 lg:w-auto lg:translate-x-0 lg:shadow-sm"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="flex items-center gap-3 border-b border-[#dcefd9] pb-4 dark:border-slate-800">
        <a href="{{ route($brandRoute) }}" class="flex min-w-0 flex-1 items-center gap-3" wire:navigate>
            <img
                src="{{ asset('logo.png') }}"
                alt="PT Lucky Print Abadi"
                width="40"
                height="40"
                class="h-10 w-10 shrink-0 rounded-md object-contain">
            <span class="min-w-0" :class="sidebarCollapsed ? 'lg:hidden' : ''">
                <span class="block truncate text-sm font-semibold leading-tight text-slate-900 dark:text-slate-100">PT Lucky Print Abadi</span>
                <span class="block text-xs font-medium text-[#004D26] dark:text-emerald-300">{{ $sectionTitle }}</span>
            </span>
        </a>
    </div>

    <nav class="mt-5 flex-1 space-y-1 overflow-y-auto">
        <p class="px-3 pb-2 text-xs font-semibold uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500" :class="sidebarCollapsed ? 'lg:hidden' : ''">
            {{ $sectionTitle }}
        </p>

        @foreach ($menuItems as $item)
            <a
                href="{{ route($item['route']) }}"
                wire:navigate
                title="{{ $item['label'] }}"
                @click="sidebarOpen = false"
                @class([
                    'group flex min-h-11 items-center gap-3 rounded-md px-3 py-2 text-sm font-semibold transition',
                    'bg-[#e8f7e6] text-[#004D26] ring-1 ring-[#c9e9c8]' => request()->routeIs($item['active']),
                    'text-slate-600 hover:bg-[#f2faf0] hover:text-[#004D26]' => ! request()->routeIs($item['active']),
                ])>
                <span @class([
                    'grid h-8 w-8 shrink-0 place-items-center rounded-md transition',
                    'bg-[#004D26] text-white' => request()->routeIs($item['active']),
                    'bg-white text-[#004D26] ring-1 ring-[#d8edd8] group-hover:bg-[#e8f7e6]' => ! request()->routeIs($item['active']),
                ])>
                    <x-sidebar-icon :name="$item['icon']" class="h-4.5 w-4.5" />
                </span>
                <span class="truncate" :class="sidebarCollapsed ? 'lg:hidden' : ''">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="mt-4 border-t border-[#dcefd9] pt-4 dark:border-slate-800">
        <a
            href="{{ route('profile', ['area' => $isSuperadminArea ? 'superadmin' : 'admin']) }}"
            @click="sidebarOpen = false"
            @class([
                'flex items-center gap-3 rounded-md px-3 py-2 text-sm font-semibold ring-1 transition',
                'bg-[#e8f7e6] text-[#004D26] ring-[#c9e9c8]' => request()->routeIs('profile'),
                'bg-white text-slate-600 ring-[#d8edd8] hover:bg-[#f7fbf6] hover:text-[#004D26]' => ! request()->routeIs('profile'),
            ])
            wire:navigate>
            <span @class([
                'grid h-8 w-8 shrink-0 place-items-center rounded-md ring-1 transition',
                'bg-[#004D26] text-white ring-[#004D26]' => request()->routeIs('profile'),
                'bg-[#f7fbf6] text-[#004D26] ring-[#d8edd8]' => ! request()->routeIs('profile'),
            ])>
                <x-sidebar-icon name="profile" class="h-4.5 w-4.5" />
            </span>
            <span :class="sidebarCollapsed ? 'lg:hidden' : ''">Profile</span>
        </a>
        <button
            type="button"
            @click="toggleDarkMode()"
            :title="darkMode ? 'Mode terang' : 'Mode gelap'"
            class="mt-2 flex w-full items-center gap-3 rounded-md bg-white px-3 py-2 text-left text-sm font-semibold text-slate-600 ring-1 ring-[#d8edd8] transition hover:bg-[#f7fbf6] hover:text-[#004D26] dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-700 dark:hover:bg-slate-800 dark:hover:text-emerald-300">
            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] dark:bg-slate-800 dark:text-emerald-300 dark:ring-slate-700">
                <x-sidebar-icon x-show="! darkMode" name="moon" class="h-4.5 w-4.5" />
                <x-sidebar-icon x-cloak x-show="darkMode" name="sun" class="h-4.5 w-4.5" />
            </span>
            <span :class="sidebarCollapsed ? 'lg:hidden' : ''" x-text="darkMode ? 'Light mode' : 'Dark mode'"></span>
        </button>
        <form id="sidebar-logout-form" method="POST" action="{{ route('logout') }}" class="mt-2" x-data="{ confirmLogoutOpen: false }">
            @csrf
            <button
                type="button"
                @click="confirmLogoutOpen = true"
                class="flex w-full items-center gap-3 rounded-md bg-white px-3 py-2 text-left text-sm font-semibold text-slate-600 ring-1 ring-[#d8edd8] transition hover:bg-[#f7fbf6] hover:text-[#004D26] dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-700 dark:hover:bg-slate-800 dark:hover:text-emerald-300">
                <span class="grid h-8 w-8 shrink-0 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] dark:bg-slate-800 dark:text-emerald-300 dark:ring-slate-700">
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
                    class="fixed inset-0 z-50 grid place-items-center bg-slate-900/35 px-4 dark:bg-slate-950/70">
                    <div
                        x-show="confirmLogoutOpen"
                        x-transition.scale.origin.center
                        @click.outside="confirmLogoutOpen = false"
                        class="w-full max-w-sm rounded-md bg-white p-6 shadow-xl ring-1 ring-[#d8edd8] dark:bg-slate-900 dark:ring-slate-700">
                        <div class="flex items-start gap-3">
                            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-md bg-[#f7fbf6] text-[#004D26] ring-1 ring-[#d8edd8] dark:bg-slate-800 dark:text-emerald-300 dark:ring-slate-700">
                                <x-sidebar-icon name="logout" class="h-5 w-5" />
                            </span>
                            <div class="min-w-0">
                                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Keluar dari akun?</h2>
                                <p class="mt-1 text-sm leading-6 text-slate-500 dark:text-slate-400">Sesi kamu akan diakhiri dan kamu perlu login kembali.</p>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end gap-2">
                            <button
                                type="button"
                                @click="confirmLogoutOpen = false"
                                class="rounded-md bg-white px-4 py-2 text-sm font-bold text-slate-600 ring-1 ring-[#d8edd8] transition hover:bg-[#f7fbf6] hover:text-[#004D26] dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-700 dark:hover:bg-slate-800 dark:hover:text-emerald-300">
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

<aside
    class="fixed inset-y-0 left-0 z-40 flex h-screen w-72 -translate-x-full flex-col border-r border-[#F2F4F7] bg-white px-3 py-4 shadow-xl transition duration-200 dark:border-slate-800 dark:bg-slate-950 lg:sticky lg:top-0 lg:w-auto lg:translate-x-0 lg:shadow-sm"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="flex items-center gap-3 border-b border-[#F2F4F7] pb-4 dark:border-slate-800">
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
            @php
                $isActive = request()->routeIs($item['active']);
            @endphp

            <a
                href="{{ route($item['route']) }}"
                wire:navigate
                title="{{ $item['label'] }}"
                @click="sidebarOpen = false"
                @class([
                    'group flex min-h-11 items-center gap-3 rounded-md px-3 py-2 text-sm font-semibold transition',
                    'bg-[#F2F4F7] text-[#004D26] ring-1 ring-[#F2F4F7]' => $isActive,
                    'text-slate-600 hover:bg-[#F2F4F7] hover:text-[#004D26]' => ! $isActive,
                ])>
                <span @class([
                    'grid h-8 w-8 shrink-0 place-items-center rounded-md transition',
                    'bg-[#004D26] text-white' => $isActive,
                    'bg-white text-[#004D26] ring-1 ring-[#F2F4F7] group-hover:bg-[#F2F4F7]' => ! $isActive,
                ])>
                    <x-sidebar-icon :name="$item['icon']" class="h-4.5 w-4.5" />
                </span>
                <span class="truncate" :class="sidebarCollapsed ? 'lg:hidden' : ''">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="mt-4 border-t border-[#F2F4F7] pt-4 dark:border-slate-800">
        @php
            $user = auth()->user();
            $profilePhotoUrl = $user?->profilePhotoUrl();
            $userName = $user?->name ?? 'User';
            $userInitials = strtoupper($user?->initials() ?: 'U');
            $userRoleLabel = $user?->role?->label() ?? $sectionTitle;
        @endphp

        <form id="sidebar-logout-form" method="POST" action="{{ route('logout') }}" x-data="{ confirmLogoutOpen: false }">
            @csrf

            <div
                class="flex items-center gap-2 rounded-md bg-[#F8FAFC] p-2 ring-1 ring-[#E5E7EB] transition dark:bg-[#101827] dark:ring-slate-800"
                :class="sidebarCollapsed ? 'lg:justify-center lg:bg-transparent lg:p-0 lg:ring-0 lg:dark:bg-transparent' : ''">
                <a
                    href="{{ route('profile', ['area' => $profileArea]) }}"
                    @click="sidebarOpen = false"
                    title="{{ $userName }}"
                    class="group/profile flex min-w-0 flex-1 items-center gap-3 rounded-md p-1.5 transition hover:bg-white dark:hover:bg-[#172033]"
                    :class="sidebarCollapsed ? 'lg:flex-none lg:justify-center lg:p-0 lg:hover:bg-transparent lg:dark:hover:bg-transparent' : ''"
                    wire:navigate>
                    @if ($profilePhotoUrl)
                        <span
                            class="relative block shrink-0 overflow-hidden rounded-full ring-1 ring-[#E5E7EB] transition group-hover/profile:ring-[#004D26]/30 dark:ring-slate-700 dark:group-hover/profile:ring-emerald-400/40"
                            style="width: 2.75rem; height: 2.75rem; border-radius: 9999px;">
                            <img
                                src="{{ $profilePhotoUrl }}"
                                alt="{{ $userName }}"
                                width="44"
                                height="44"
                                class="absolute inset-0 object-cover"
                                style="width: 100%; height: 100%; border-radius: 9999px;">
                        </span>
                    @else
                        <span
                            class="grid shrink-0 place-items-center rounded-full bg-slate-900 text-sm font-bold text-white ring-1 ring-[#E5E7EB] transition group-hover/profile:ring-[#004D26]/30 dark:bg-slate-800 dark:text-emerald-100 dark:ring-slate-700 dark:group-hover/profile:ring-emerald-400/40"
                            style="width: 2.75rem; height: 2.75rem; border-radius: 9999px;">
                            {{ $userInitials }}
                        </span>
                    @endif

                    <span class="min-w-0" :class="sidebarCollapsed ? 'lg:hidden' : ''">
                        <span class="block truncate text-sm font-semibold leading-tight text-slate-900 dark:text-slate-100">{{ $userName }}</span>
                        <span class="mt-0.5 block truncate text-xs font-medium text-slate-500 dark:text-slate-400">{{ $userRoleLabel }}</span>
                    </span>
                </a>

                <button
                    type="button"
                    @click="confirmLogoutOpen = true"
                    title="Logout"
                    class="grid h-10 w-10 shrink-0 place-items-center rounded-md bg-white text-slate-500 ring-1 ring-[#E5E7EB] transition hover:bg-red-50 hover:text-red-600 dark:bg-slate-900 dark:text-slate-400 dark:ring-slate-700 dark:hover:bg-red-950/30 dark:hover:text-red-300"
                    :class="sidebarCollapsed ? 'lg:hidden' : ''">
                    <x-sidebar-icon name="logout" class="h-4.5 w-4.5" />
                </button>
            </div>

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
                        class="w-full max-w-sm rounded-md bg-white p-6 shadow-xl ring-1 ring-[#F2F4F7] dark:bg-slate-900 dark:ring-slate-700">
                        <div class="flex items-start gap-3">
                            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-md bg-[#F2F4F7] text-[#004D26] ring-1 ring-[#F2F4F7] dark:bg-slate-800 dark:text-emerald-300 dark:ring-slate-700">
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
                                class="rounded-md bg-white px-4 py-2 text-sm font-bold text-slate-600 ring-1 ring-[#F2F4F7] transition hover:bg-[#F2F4F7] hover:text-[#004D26] dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-700 dark:hover:bg-slate-800 dark:hover:text-emerald-300">
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

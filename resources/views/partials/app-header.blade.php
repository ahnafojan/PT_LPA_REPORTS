<header class="sticky top-0 z-20 border-b border-[#F2F4F7] bg-white/85 px-4 py-3 backdrop-blur dark:border-slate-800 dark:bg-slate-950/85 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between gap-4">
        <div class="flex min-w-0 items-center gap-3">
            <button
                type="button"
                @click="sidebarOpen = true"
                class="grid h-10 w-10 place-items-center rounded-md bg-[#F2F4F7] text-[#004D26] ring-1 ring-[#F2F4F7] transition hover:bg-[#F2F4F7] dark:bg-slate-900 dark:text-emerald-300 dark:ring-slate-700 dark:hover:bg-slate-800 lg:hidden"
                aria-label="Buka sidebar">
                <x-sidebar-icon name="menu" class="h-5 w-5" />
            </button>

            <button
                type="button"
                @click="sidebarCollapsed = ! sidebarCollapsed"
                class="hidden h-10 w-10 place-items-center rounded-md bg-[#F2F4F7] text-[#004D26] ring-1 ring-[#F2F4F7] transition hover:bg-[#F2F4F7] dark:bg-slate-900 dark:text-emerald-300 dark:ring-slate-700 dark:hover:bg-slate-800 lg:grid"
                aria-label="Toggle sidebar">
                <x-sidebar-icon name="menu" class="h-5 w-5" />
            </button>

            <div class="min-w-0">
                <h1 class="truncate text-xl font-semibold text-slate-900 dark:text-slate-100">{{ $title ?? 'Dashboard' }}</h1>
            </div>
        </div>

        <div class="flex shrink-0 items-center gap-2 sm:gap-3">
            <div class="hidden flex-col items-end justify-center leading-none md:flex">
                <span class="text-sm font-semibold text-slate-800 dark:text-slate-100">
                    {{ now()->translatedFormat('l, d M Y') }}
                </span>
                <span
                    class="mt-1 text-xs font-medium tabular-nums text-slate-400 dark:text-slate-500"
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

            <div class="flex items-center gap-1 rounded-full bg-[#F2F4F7] p-1 ring-1 ring-[#F2F4F7] dark:bg-slate-900 dark:ring-slate-800">
                <div class="relative" x-data="{ notificationsOpen: false }" @keydown.escape.window="notificationsOpen = false">
                    <button
                        type="button"
                        @click="notificationsOpen = ! notificationsOpen"
                        :aria-expanded="notificationsOpen.toString()"
                        aria-label="Buka notifikasi"
                        title="Notifikasi"
                        class="relative grid h-9 w-9 place-items-center rounded-full bg-white text-[#004D26] shadow-sm ring-1 ring-black/5 transition hover:text-[#003D1F] focus:outline-none focus:ring-2 focus:ring-[#004D26]/30 dark:bg-slate-950 dark:text-emerald-300 dark:ring-slate-800 dark:hover:text-emerald-200">
                        <x-sidebar-icon name="bell" class="h-4.5 w-4.5" />
                        <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-amber-400 ring-2 ring-white dark:ring-slate-950"></span>
                    </button>

                    <div
                        x-cloak
                        x-show="notificationsOpen"
                        x-transition.origin.top.right
                        @click.outside="notificationsOpen = false"
                        class="absolute right-0 z-50 mt-3 w-[min(calc(100vw-2rem),22rem)] overflow-hidden rounded-md bg-white shadow-xl ring-1 ring-[#F2F4F7] dark:bg-slate-900 dark:ring-slate-700">
                        <div class="flex items-center justify-between border-b border-[#F2F4F7] px-4 py-3 dark:border-slate-700">
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">Notifikasi</p>
                                <p class="mt-0.5 text-xs text-slate-500 dark:text-slate-400">3 aktivitas terbaru</p>
                            </div>
                            <span class="rounded-md bg-[#F2F4F7] px-2 py-1 text-xs font-bold text-[#004D26] ring-1 ring-[#F2F4F7] dark:bg-slate-800 dark:text-emerald-300 dark:ring-slate-700">
                                Baru
                            </span>
                        </div>

                        <div class="max-h-80 overflow-y-auto p-2">
                            @foreach ([
                                ['Deadline mendekat', 'Laporan Kehadiran harus dikirim sebelum 17:00.', 'warning'],
                                ['Jenis laporan baru', 'Laporan Keuangan Bulanan tersedia untuk periode Mei 2026.', 'aktif'],
                                ['Periode dikunci', 'Periode April 2026 sudah dikunci oleh Super Admin.', 'selesai'],
                            ] as $notification)
                                <a
                                    href="{{ route('notifications') }}"
                                    wire:navigate
                                    @click="notificationsOpen = false"
                                    class="flex gap-3 rounded-md px-3 py-3 transition hover:bg-[#F2F4F7] dark:hover:bg-slate-800">
                                    <span class="mt-1 h-2 w-2 shrink-0 rounded-full @if ($notification[2] === 'warning') bg-amber-400 @else bg-emerald-400 @endif"></span>
                                    <span class="min-w-0">
                                        <span class="block text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $notification[0] }}</span>
                                        <span class="mt-1 block text-xs leading-5 text-slate-500 dark:text-slate-400">{{ $notification[1] }}</span>
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        <div class="border-t border-[#F2F4F7] p-2 dark:border-slate-700">
                            <a
                                href="{{ route('notifications') }}"
                                wire:navigate
                                @click="notificationsOpen = false"
                                class="flex items-center justify-center rounded-md px-3 py-2 text-sm font-bold text-[#004D26] transition hover:bg-[#F2F4F7] dark:text-emerald-300 dark:hover:bg-slate-800">
                                Lihat semua
                            </a>
                        </div>
                    </div>
                </div>

                <button
                    type="button"
                    role="switch"
                    @click="toggleDarkMode()"
                    :aria-checked="darkMode.toString()"
                    :aria-label="darkMode ? 'Aktifkan mode terang' : 'Aktifkan mode gelap'"
                    :title="darkMode ? 'Mode terang' : 'Mode gelap'"
                    class="relative inline-flex h-9 w-[4.5rem] shrink-0 items-center rounded-full p-1 transition focus:outline-none focus:ring-2 focus:ring-[#004D26]/30 dark:focus:ring-emerald-400/30"
                    :class="darkMode ? 'bg-slate-950' : 'bg-white'">
                    <span class="absolute left-2 text-[#004D26] dark:text-slate-500">
                        <x-sidebar-icon name="sun" class="h-3.5 w-3.5" />
                    </span>
                    <span class="absolute right-2 text-slate-400 dark:text-emerald-300">
                        <x-sidebar-icon name="moon" class="h-3.5 w-3.5" />
                    </span>
                    <span
                        class="relative z-10 grid h-7 w-7 place-items-center rounded-full bg-white shadow-sm ring-1 ring-black/5 transition-transform dark:bg-slate-100"
                        :class="darkMode ? 'translate-x-9 text-slate-900' : 'translate-x-0 text-[#004D26]'">
                        <x-sidebar-icon x-show="! darkMode" name="sun" class="h-4 w-4" />
                        <x-sidebar-icon x-cloak x-show="darkMode" name="moon" class="h-4 w-4" />
                    </span>
                </button>
            </div>
        </div>
    </div>
</header>

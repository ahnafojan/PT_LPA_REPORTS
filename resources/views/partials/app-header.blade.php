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

        <div class="flex shrink-0 items-center gap-3">
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

            <button
                type="button"
                role="switch"
                @click="toggleDarkMode()"
                :aria-checked="darkMode.toString()"
                :aria-label="darkMode ? 'Aktifkan mode terang' : 'Aktifkan mode gelap'"
                :title="darkMode ? 'Mode terang' : 'Mode gelap'"
                class="relative inline-flex h-9 w-[4.5rem] shrink-0 items-center rounded-full p-1 ring-1 transition focus:outline-none focus:ring-2 focus:ring-[#004D26]/40"
                :class="darkMode ? 'bg-slate-900 ring-slate-700' : 'bg-[#e8f7e6] ring-[#c9e9c8]'">
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
</header>

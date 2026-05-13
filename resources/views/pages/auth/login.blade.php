<x-layouts::auth :title="__('Login')">
    <div class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7] dark:bg-[#101827] dark:shadow-2xl dark:shadow-black/20 dark:ring-slate-800">
        <form method="POST" action="{{ route('login.store') }}" class="space-y-5" x-data="{ submitting: false }" @submit="submitting = true">
            @csrf

            @if ($errors->any())
                <div class="rounded-md bg-red-50 px-4 py-3 text-sm font-semibold text-red-700 ring-1 ring-red-200 dark:bg-red-950/35 dark:text-red-200 dark:ring-red-900/60">
                    Email atau password tidak sesuai.
                </div>
            @endif

            <div>
                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-100">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    value="{{ old('email') }}"
                    autocomplete="email"
                    placeholder="contoh@email.com"
                    class="w-full rounded-md border border-[#F2F4F7] bg-white px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60 dark:border-slate-700 dark:bg-[#0b1220] dark:text-slate-100 dark:placeholder:text-slate-500 dark:focus:border-emerald-400 dark:focus:ring-emerald-400/25">
            </div>

            <div>
                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-100">Password</label>
                <div class="relative" x-data="{ show: false }">
                    <input
                        id="password"
                        name="password"
                        :type="show ? 'text' : 'password'"
                        required
                        autocomplete="current-password"
                        placeholder="Masukkan password"
                        class="w-full rounded-md border border-[#F2F4F7] bg-white px-4 py-3 pr-11 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60 dark:border-slate-700 dark:bg-[#0b1220] dark:text-slate-100 dark:placeholder:text-slate-500 dark:focus:border-emerald-400 dark:focus:ring-emerald-400/25">
                    <button
                        type="button"
                        @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 hover:text-[#004D26] focus:outline-none dark:text-slate-500 dark:hover:text-emerald-300"
                        :aria-label="show ? 'Sembunyikan password' : 'Tampilkan password'">
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.573-4.255M6.228 6.228A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.347 2.687M6.228 6.228L3 3m3.228 3.228l3.65 3.65M17.772 17.772l3.228 3.228m-3.228-3.228l-3.65-3.65" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 font-medium text-slate-600 dark:text-slate-300">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        class="h-4 w-4 rounded border-[#F2F4F7] text-[#004D26] focus:ring-[#004D26] dark:border-slate-600 dark:bg-[#0b1220] dark:text-emerald-500 dark:focus:ring-emerald-400">
                    Ingat saya
                </label>
                <a href="{{ route('password.request') }}" class="font-semibold text-[#004D26] hover:text-[#1e6b3a] dark:text-emerald-300 dark:hover:text-emerald-200" wire:navigate>Lupa password?</a>
            </div>

            <button
                type="submit"
                :disabled="submitting"
                class="flex w-full items-center justify-center gap-2 rounded-md bg-[#004D26] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#003D1F] focus:outline-none focus:ring-2 focus:ring-[#004D26] disabled:cursor-wait disabled:opacity-80 dark:bg-emerald-600 dark:hover:bg-emerald-500 dark:focus:ring-emerald-400/40">
                <x-loading-spinner x-cloak x-show="submitting" />
                <span x-text="submitting ? 'Memproses...' : 'Masuk'">Masuk</span>
            </button>
        </form>
    </div>
</x-layouts::auth>

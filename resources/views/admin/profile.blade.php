@php
    $user = auth()->user();
    $isSuperadminProfile = request('area') === 'superadmin' || $user?->isSuperAdmin();
    $name = $user?->name ?: 'Admin LPA';
    $email = $user?->email ?: 'admin@lpa.local';
    $photoUrl = $user?->profilePhotoUrl();
    $initials = $user?->initials() ?: collect(explode(' ', $name))
        ->filter()
        ->take(2)
        ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
        ->implode('');
@endphp

<x-layouts::app :title="__('Profile')">
    <div class="space-y-6">
        @if (session('status') || session('photo_status') || session('password_status'))
            <div class="rounded-md bg-[#F2F4F7] px-4 py-3 text-sm font-semibold text-[#004D26] ring-1 ring-[#F2F4F7]">
                {{ session('status') ?? session('photo_status') ?? session('password_status') }}
            </div>
        @endif

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7] lg:p-7">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Akun pengguna</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">Profile</h2>
                    <p class="mt-2 max-w-2xl text-sm text-slate-500">Kelola informasi dasar akun, foto profil, dan password.</p>
                </div>

                <div class="rounded-md bg-[#F2F4F7] px-4 py-3 text-sm font-semibold text-[#004D26] ring-1 ring-[#F2F4F7]">
                    {{ $isSuperadminProfile ? 'Super Admin' : 'Admin' }}
                </div>
            </div>
        </section>

        <div class="grid gap-6 xl:grid-cols-[360px_1fr]">
            <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]" x-data="{ photoPreview: @js($photoUrl) }">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Foto profile</p>

                <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="mt-6 flex flex-col items-center text-center">
                    @csrf

                    <div class="grid h-28 w-28 shrink-0 place-items-center overflow-hidden rounded-md bg-[#F2F4F7] text-3xl font-bold text-[#004D26] ring-1 ring-[#F2F4F7]" style="height: 7rem; width: 7rem;">
                        <img
                            x-cloak
                            x-show="photoPreview"
                            :src="photoPreview"
                            alt="Preview foto profile"
                            class="h-full w-full object-cover"
                            style="display: block; height: 100%; width: 100%; object-fit: cover;">
                        <span x-show="! photoPreview">{{ $initials }}</span>
                    </div>

                    <p class="mt-4 text-lg font-semibold text-slate-900">{{ $name }}</p>
                    <p class="mt-1 text-sm text-slate-500">{{ $email }}</p>

                    <label class="mt-5 inline-flex cursor-pointer rounded-md bg-white px-4 py-2 text-sm font-bold text-[#004D26] ring-1 ring-[#F2F4F7] transition hover:bg-[#F2F4F7]">
                        Ubah foto
                        <input
                            name="profile_photo"
                            type="file"
                            accept="image/*"
                            class="sr-only"
                            @change="
                                const file = $event.target.files[0];
                                if (! file) return;
                                photoPreview = URL.createObjectURL(file);
                            ">
                    </label>

                    @error('profile_photo')
                        <p class="mt-3 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="mt-4 rounded-md bg-[#004D26] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#006b36]">
                        Simpan foto
                    </button>
                    <p class="mt-3 text-xs text-slate-400">Format JPG, PNG, atau WebP. Maksimal 2 MB.</p>
                </form>
            </section>

            <div class="space-y-6">
                <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Informasi profile</p>
                        <h3 class="mt-2 text-xl font-semibold text-slate-900">Nama dan email</h3>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 grid gap-5 md:grid-cols-2">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Nama</label>
                            <input
                                name="name"
                                type="text"
                                value="{{ old('name', $name) }}"
                                class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                            @error('name')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                            <input
                                name="email"
                                type="email"
                                value="{{ old('email', $email) }}"
                                class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                            @error('email')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit" class="rounded-md bg-[#004D26] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#006b36]">
                                Simpan profile
                            </button>
                        </div>
                    </form>
                </section>

                <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Keamanan</p>
                        <h3 class="mt-2 text-xl font-semibold text-slate-900">Change password</h3>
                    </div>

                    <form method="POST" action="{{ route('profile.password.update') }}" class="mt-6 grid gap-5 md:grid-cols-2">
                        @csrf
                        @method('PUT')

                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Password saat ini</label>
                            <input
                                name="current_password"
                                type="password"
                                placeholder="Masukkan password saat ini"
                                class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                            @error('current_password')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Password baru</label>
                            <input
                                name="password"
                                type="password"
                                placeholder="Password baru"
                                class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                            @error('password')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Konfirmasi password</label>
                            <input
                                name="password_confirmation"
                                type="password"
                                placeholder="Ulangi password baru"
                                class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                        </div>

                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit" class="rounded-md bg-slate-900 px-5 py-3 text-sm font-bold text-white transition hover:bg-slate-800">
                                Update password
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-layouts::app>

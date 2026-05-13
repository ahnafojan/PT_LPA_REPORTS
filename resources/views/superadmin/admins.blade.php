@php
    $accessOptions = ['Laporan Keuangan Bulanan', 'Laporan Kehadiran', 'Semua laporan'];

    $adminRows = [
        ['name' => 'Andi', 'access' => 'Kehadiran, KWH', 'status' => 'aktif'],
        ['name' => 'Sari', 'access' => 'Keuangan', 'status' => 'aktif'],
        ['name' => 'Budi', 'access' => 'Produksi', 'status' => 'nonaktif'],
    ];
@endphp

<x-layouts::app :title="__('Manajemen Admin')">
    <div class="grid gap-6 xl:grid-cols-[380px_1fr]">
        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Akun admin</p>
            <form class="mt-5 space-y-4">
                <input type="text" placeholder="Nama admin" class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
                <input type="email" placeholder="Email" class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
                <x-alpine-dropdown
                    name="akses_laporan"
                    :options="$accessOptions" />
                <button type="button" class="w-full rounded-md bg-[#004D26] px-4 py-3 text-sm font-bold text-white">Tambah Admin</button>
            </form>
        </section>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
            <h2 class="text-2xl font-semibold text-slate-900">Daftar admin</h2>
            <div class="mt-6 overflow-hidden rounded-md ring-1 ring-[#F2F4F7]">
                <table class="w-full text-left text-sm">
                    <thead class="bg-[#F2F4F7] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                        <tr>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Akses</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F2F4F7]">
                        @foreach ($adminRows as $admin)
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">{{ $admin['name'] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $admin['access'] }}</td>
                                <td class="px-4 py-3"><x-status-badge :status="$admin['status']" /></td>
                                <td class="px-4 py-3"><button class="font-bold text-[#004D26]">Reset Password</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layouts::app>

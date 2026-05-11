<x-layouts::app :title="__('Daftar Laporan Saya')">
    <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Rekap</p>
                <h2 class="mt-2 text-2xl font-semibold text-slate-900">Laporan yang pernah diisi</h2>
            </div>
            <div class="flex flex-wrap gap-2">
                <input type="search" placeholder="Cari..." class="rounded-md border border-[#d6ead5] px-4 py-2 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
                <x-alpine-dropdown
                    class="min-w-40"
                    button-class="py-2"
                    name="status"
                    :options="['Semua status', 'Draft', 'Terkirim', 'Terlambat']" />
            </div>
        </div>

        <div class="relative mt-6 overflow-hidden rounded-md ring-1 ring-[#d8edd8]">
            <div class="absolute inset-0 hidden items-center justify-center bg-white/70 text-sm font-bold text-[#004D26]" wire:loading.flex>
                Memuat data...
            </div>
            <table class="w-full text-left text-sm">
                <thead class="bg-[#f2faf0] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                    <tr>
                        <th class="px-4 py-3">Laporan</th>
                        <th class="px-4 py-3">Periode</th>
                        <th class="px-4 py-3">Tanggal isi</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#d8edd8]">
                    @foreach ([
                    ['Laporan Kehadiran', 'Mei 2026', '6 Mei 2026', 'terkirim', 'Lihat'],
                    ['Pemakaian Bahan Bakar', 'Mei 2026', '6 Mei 2026', 'draft', 'Edit'],
                    ['Pencatatan KWH', 'Mei 2026', '5 Mei 2026', 'terlambat', 'Lihat'],
                    ] as $row)
                    <tr class="bg-white">
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $row[0] }}</td>
                        <td class="px-4 py-3 text-slate-500">{{ $row[1] }}</td>
                        <td class="px-4 py-3 text-slate-500">{{ $row[2] }}</td>
                        <td class="px-4 py-3"><x-status-badge :status="$row[3]" /></td>
                        <td class="px-4 py-3"><button type="button" class="font-bold text-[#004D26]">{{ $row[4] }}</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
            <span>Menampilkan 1-3 dari 24 data</span>
            <div class="flex gap-2">
                <button class="rounded-md bg-white px-3 py-2 ring-1 ring-[#d8edd8]">Prev</button>
                <button class="rounded-md bg-white px-3 py-2 ring-1 ring-[#d8edd8]">Next</button>
            </div>
        </div>
    </section>
</x-layouts::app>

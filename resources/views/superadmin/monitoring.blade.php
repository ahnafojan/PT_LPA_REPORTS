<x-layouts::app :title="__('Monitoring Laporan')">
    <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Real-time status</p>
                <h2 class="mt-2 text-2xl font-semibold text-slate-900">Pantau progres laporan</h2>
            </div>
            <div class="flex flex-wrap gap-2">
                <x-alpine-dropdown class="min-w-36" button-class="py-2" name="admin" :options="['Semua admin']" />
                <x-alpine-dropdown class="min-w-36" button-class="py-2" name="jenis" :options="['Semua jenis']" />
                <x-alpine-dropdown class="min-w-32" button-class="py-2" name="periode" :options="['Mei 2026']" />
            </div>
        </div>

        <div class="relative mt-6 overflow-hidden rounded-md ring-1 ring-[#d8edd8]">
            <div class="absolute inset-0 hidden items-center justify-center bg-white/70 text-sm font-bold text-[#004D26]" wire:loading.flex>
                Memuat monitoring...
            </div>
            <table class="w-full text-left text-sm">
                <thead class="bg-[#f2faf0] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                    <tr>
                        <th class="px-4 py-3">Admin</th>
                        <th class="px-4 py-3">Jenis laporan</th>
                        <th class="px-4 py-3">Periode</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#d8edd8]">
                    @foreach ([['Andi', 'Kehadiran', 'Mei 2026', 'terkirim'], ['Sari', 'Keuangan', 'Mei 2026', 'proses'], ['Budi', 'Produksi', 'Mei 2026', 'belum'], ['Rina', 'KWH', 'Mei 2026', 'terlambat']] as $row)
                        <tr>
                            <td class="px-4 py-3 font-semibold text-slate-800">{{ $row[0] }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $row[1] }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $row[2] }}</td>
                            <td class="px-4 py-3"><x-status-badge :status="$row[3]" /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layouts::app>

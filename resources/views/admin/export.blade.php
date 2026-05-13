<x-layouts::app :title="__('Laporan & Export')">
    <div class="grid gap-6 xl:grid-cols-[380px_1fr]">
        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Filter export</p>
            <form class="mt-5 space-y-4">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Jenis laporan</label>
                    <x-alpine-dropdown
                        name="jenis_laporan"
                        :options="['Semua laporan', 'Laporan Keuangan Bulanan', 'Laporan Kehadiran']" />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Dari</label>
                        <x-date-picker name="tanggal_mulai" placeholder="Pilih tanggal mulai" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Sampai</label>
                        <x-date-picker name="tanggal_selesai" placeholder="Pilih tanggal selesai" />
                    </div>
                </div>
                <x-export-buttons class="pt-2" excel-label="Export Excel" pdf-label="Export PDF" />
            </form>
        </section>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
            <h2 class="text-2xl font-semibold text-slate-900">Preview rekap</h2>
            <div class="mt-6 overflow-hidden rounded-md ring-1 ring-[#F2F4F7]">
                <table class="w-full text-left text-sm">
                    <thead class="bg-[#F2F4F7] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                        <tr>
                            <th class="px-4 py-3">Jenis</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Terkirim</th>
                            <th class="px-4 py-3">Terlambat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F2F4F7]">
                        @foreach ([['Kehadiran', 28, 26, 2], ['Keuangan', 12, 11, 1], ['Produksi', 31, 30, 1]] as $row)
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">{{ $row[0] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $row[1] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $row[2] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $row[3] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layouts::app>

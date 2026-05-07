<x-layouts::app :title="__('Manajemen Field / Kolom')">
    <div class="grid gap-6 xl:grid-cols-[420px_1fr]">
        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Field builder</p>
            <h2 class="mt-2 text-2xl font-semibold text-slate-900">Atur kolom isian</h2>
            <form class="mt-6 space-y-4">
                <x-alpine-dropdown
                    name="jenis_laporan"
                    :options="['Laporan Keuangan Bulanan', 'Laporan Kehadiran']" />
                <input type="text" placeholder="Label field" class="w-full rounded-md border border-[#d6ead5] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
                <x-alpine-dropdown
                    name="tipe_field"
                    :options="['Text', 'Number', 'Date', 'Dropdown']" />
                <input type="number" placeholder="Urutan" class="w-full rounded-md border border-[#d6ead5] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
                <label class="flex items-center gap-2 rounded-md bg-[#f7fbf6] px-4 py-3 text-sm font-semibold text-slate-600 ring-1 ring-[#d8edd8]">
                    <input type="checkbox" checked class="h-4 w-4 rounded border-[#b9dcb8] text-[#004D26]">
                    Wajib diisi
                </label>
                <button type="button" class="w-full rounded-md bg-[#004D26] px-4 py-3 text-sm font-bold text-white">Tambah Field</button>
            </form>
        </section>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
            <h2 class="text-2xl font-semibold text-slate-900">Field Laporan Keuangan Bulanan</h2>
            <div class="mt-6 overflow-hidden rounded-md ring-1 ring-[#d8edd8]">
                <table class="w-full text-left text-sm">
                    <thead class="bg-[#f2faf0] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                        <tr>
                            <th class="px-4 py-3">Field</th>
                            <th class="px-4 py-3">Tipe</th>
                            <th class="px-4 py-3">Wajib</th>
                            <th class="px-4 py-3">Urutan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d8edd8]">
                        @foreach ([['Periode', 'date', 'Ya', 1], ['Total Pemasukan', 'number', 'Ya', 2], ['Kategori', 'dropdown', 'Ya', 3], ['Catatan', 'text', 'Tidak', 4]] as $row)
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

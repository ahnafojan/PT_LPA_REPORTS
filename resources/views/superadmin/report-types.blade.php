@php
    $reportTypeRows = [
        ['name' => 'Laporan Keuangan Bulanan', 'fields_count' => 12, 'admins_count' => 4, 'status' => 'aktif'],
        ['name' => 'Laporan Kehadiran', 'fields_count' => 8, 'admins_count' => 12, 'status' => 'aktif'],
        ['name' => 'Laporan Audit Mesin', 'fields_count' => 6, 'admins_count' => 2, 'status' => 'nonaktif'],
    ];
@endphp

<x-layouts::app :title="__('Manajemen Jenis Laporan')">
    <div class="grid gap-6 xl:grid-cols-[420px_1fr]">
        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Template laporan</p>
            <h2 class="mt-2 text-2xl font-semibold text-slate-900">Buat jenis laporan</h2>
            <form class="mt-6 space-y-4">
                <div>
                    <label for="report-name" class="mb-2 block text-sm font-semibold text-slate-700">Nama laporan</label>
                    <input id="report-name" name="name" type="text" placeholder="Laporan Keuangan Bulanan" class="w-full rounded-md border border-[#d6ead5] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
                </div>
                <div>
                    <label for="report-description" class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi</label>
                    <textarea id="report-description" name="description" rows="4" class="w-full rounded-md border border-[#d6ead5] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 rounded-md bg-[#f7fbf6] px-4 py-3 text-sm font-semibold text-slate-600 ring-1 ring-[#d8edd8]">
                        <input type="checkbox" name="is_active" checked class="h-4 w-4 rounded border-[#b9dcb8] text-[#004D26]">
                        Aktif
                    </label>
                    <label class="flex items-center gap-2 rounded-md bg-[#f7fbf6] px-4 py-3 text-sm font-semibold text-slate-600 ring-1 ring-[#d8edd8]">
                        <input type="checkbox" name="is_required" checked class="h-4 w-4 rounded border-[#b9dcb8] text-[#004D26]">
                        Wajib
                    </label>
                </div>
                <button type="button" class="w-full rounded-md bg-[#004D26] px-4 py-3 text-sm font-bold text-white">Simpan Template</button>
            </form>
        </section>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-2xl font-semibold text-slate-900">Daftar jenis laporan</h2>
                <input type="search" name="search" placeholder="Cari template..." class="rounded-md border border-[#d6ead5] px-4 py-2 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">
            </div>
            <div class="mt-6 overflow-hidden rounded-md ring-1 ring-[#d8edd8]">
                <table class="w-full text-left text-sm">
                    <thead class="bg-[#f2faf0] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                        <tr>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Field</th>
                            <th class="px-4 py-3">Admin</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#d8edd8]">
                        @foreach ($reportTypeRows as $reportType)
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">{{ $reportType['name'] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $reportType['fields_count'] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $reportType['admins_count'] }}</td>
                                <td class="px-4 py-3"><x-status-badge :status="$reportType['status']" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layouts::app>

<x-layouts::app :title="__('Dashboard Admin')">
    <div class="space-y-6">
        <section class="grid gap-4 md:grid-cols-3">
            @foreach ([
            ['label' => 'Harus diisi hari ini', 'value' => '5', 'note' => '2 mendekati deadline'],
            ['label' => 'Sudah selesai', 'value' => '3', 'note' => 'Periode berjalan'],
            ['label' => 'Belum diisi', 'value' => '2', 'note' => 'Perlu tindak lanjut'],
            ] as $card)
            <div class="rounded-md bg-white p-5 shadow-sm ring-1 ring-[#d8edd8]">
                <p class="text-sm font-semibold text-slate-500">{{ $card['label'] }}</p>
                <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $card['value'] }}</p>
                <p class="mt-2 text-xs font-semibold text-[#004D26]">{{ $card['note'] }}</p>
            </div>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-[1fr_360px]">
            <div class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Tugas laporan</p>
                        <h2 class="mt-2 text-2xl font-semibold text-slate-900">Laporan yang perlu diisi</h2>
                    </div>
                    <a href="{{ route('reports.input') }}" class="inline-flex items-center justify-center rounded-md bg-[#004D26] px-4 py-2 text-sm font-bold text-white" wire:navigate>
                        Input Laporan
                    </a>
                </div>

                <div class="mt-6 overflow-hidden rounded-md ring-1 ring-[#d8edd8]">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-[#f2faf0] text-xs font-semibold uppercase tracking-[0.12em] text-[#004D26]">
                            <tr>
                                <th class="px-4 py-3">Jenis laporan</th>
                                <th class="px-4 py-3">Deadline</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#d8edd8]">
                            @foreach ([
                            ['Laporan Keuangan Bulanan', '10 Mei 2026', 'draft'],
                            ['Laporan Kehadiran', 'Hari ini 17:00', 'belum'],
                            ['Pencatatan KWH', 'Hari ini 16:00', 'terkirim'],
                            ['Pemakaian Bahan Bakar', 'Hari ini 18:00', 'proses'],
                            ] as $row)
                            <tr class="bg-white">
                                <td class="px-4 py-3 font-semibold text-slate-800">{{ $row[0] }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ $row[1] }}</td>
                                <td class="px-4 py-3"><x-status-badge :status="$row[2]" /></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <aside class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Deadline dekat</p>
                <div class="mt-5 space-y-3">
                    @foreach ([
                    ['Laporan Kehadiran', '17:00'],
                    ['Pemakaian Bahan Bakar', '18:00'],
                    ['Laporan Produksi', '20:00'],
                    ] as $item)
                    <div class="flex items-center justify-between rounded-md bg-[#f7fbf6] px-4 py-3 ring-1 ring-[#d8edd8]">
                        <p class="text-sm font-bold text-slate-800">{{ $item[0] }}</p>
                        <p class="text-xs font-semibold text-[#004D26]">{{ $item[1] }}</p>
                    </div>
                    @endforeach
                </div>
            </aside>
        </section>
    </div>
</x-layouts::app>
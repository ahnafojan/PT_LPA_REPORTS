<x-layouts::app :title="__('Riwayat Laporan')">
    <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Arsip final</p>
                <h2 class="mt-2 text-2xl font-semibold text-slate-900">Periode sebelumnya</h2>
            </div>
            <x-export-buttons />
        </div>

        <div class="mt-6 grid gap-3 md:grid-cols-2 xl:grid-cols-3">
            @foreach ([
                ['April 2026', '36 laporan terkunci'],
                ['Maret 2026', '34 laporan terkunci'],
                ['Februari 2026', '31 laporan terkunci'],
                ['Januari 2026', '33 laporan terkunci'],
            ] as $item)
                <div class="rounded-md bg-[#f7fbf6] p-4 ring-1 ring-[#d8edd8]">
                    <p class="font-semibold text-slate-900">{{ $item[0] }}</p>
                    <p class="mt-1 text-sm text-slate-500">{{ $item[1] }}</p>
                    <x-status-badge status="selesai" class="mt-4">Final</x-status-badge>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts::app>

<x-layouts::app :title="__('Log Aktivitas')">
    <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Audit trail</p>
                <h2 class="mt-2 text-2xl font-semibold text-slate-900">Rekam jejak sistem</h2>
            </div>
            <input type="search" placeholder="Cari aktivitas..." class="rounded-md border border-[#F2F4F7] px-4 py-2 text-sm">
        </div>
        <div class="mt-6 space-y-3">
            @foreach ([
                ['Super Admin', 'mengubah field Total Pemasukan', '6 Mei 2026 08:25'],
                ['Andi', 'mengirim Laporan Kehadiran', '6 Mei 2026 08:10'],
                ['Sari', 'login ke sistem', '6 Mei 2026 07:58'],
                ['Super Admin', 'menonaktifkan Laporan Audit Mesin', '5 Mei 2026 16:20'],
            ] as $log)
                <div class="grid gap-2 rounded-md bg-[#F2F4F7] p-4 ring-1 ring-[#F2F4F7] md:grid-cols-[180px_1fr_180px]">
                    <p class="font-semibold text-slate-900">{{ $log[0] }}</p>
                    <p class="text-sm text-slate-600">{{ $log[1] }}</p>
                    <p class="text-sm font-semibold text-slate-500">{{ $log[2] }}</p>
                </div>
            @endforeach
        </div>
    </section>
</x-layouts::app>

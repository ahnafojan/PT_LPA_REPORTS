<x-layouts::app :title="__('Notifikasi')">
    <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Pemberitahuan</p>
        <h2 class="mt-2 text-2xl font-semibold text-slate-900">Aktivitas terbaru</h2>

        <div class="mt-6 space-y-3">
            @foreach ([
                ['Deadline mendekat', 'Laporan Kehadiran harus dikirim sebelum 17:00.', 'warning'],
                ['Jenis laporan baru', 'Laporan Keuangan Bulanan sudah tersedia untuk periode Mei 2026.', 'aktif'],
                ['Pengumuman', 'Periode April 2026 sudah dikunci oleh Super Admin.', 'selesai'],
            ] as $item)
                <div class="flex flex-col gap-3 rounded-md bg-[#f7fbf6] p-4 ring-1 ring-[#d8edd8] sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="font-semibold text-slate-900">{{ $item[0] }}</p>
                        <p class="mt-1 text-sm text-slate-500">{{ $item[1] }}</p>
                    </div>
                    <x-status-badge :status="$item[2]" />
                </div>
            @endforeach
        </div>
    </section>
</x-layouts::app>

<x-layouts::app :title="__('Input Laporan')">
    <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7] lg:p-7">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Jenis laporan tersedia</p>
                <h2 class="mt-2 text-2xl font-semibold text-slate-900">Pilih laporan untuk diisi</h2>
            </div>
            <div class="flex flex-wrap gap-2">
                <input type="search" placeholder="Cari..." class="w-48 rounded-md border border-[#F2F4F7] px-4 py-2 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
            </div>
        </div>

        <div class="mt-6 max-h-[calc(100vh-17rem)] overflow-y-auto pr-1">
            <div class="grid gap-4 md:grid-cols-2 2xl:grid-cols-3">
                @foreach ([
                    ['Laporan Keuangan Bulanan', 'Deadline 10 Mei 2026', 'draft', 'reports.forms.keuangan-bulanan'],
                    ['Laporan Kehadiran', 'Deadline hari ini 17:00', 'belum', null],
                    ['Pencatatan KWH', 'Form operasional harian', 'terkirim', null],
                    ['Pemakaian Bahan Bakar', 'Deadline hari ini 18:00', 'proses', null],
                    ['Laporan Produksi', 'Deadline hari ini 20:00', 'belum', null],
                    ['Laporan Maintenance', 'Deadline 12 Mei 2026', 'draft', null],
                    ['Laporan Gudang', 'Deadline 15 Mei 2026', 'belum', null],
                    ['Laporan Safety', 'Deadline 16 Mei 2026', 'terkirim', null],
                ] as $item)
                    <div class="flex min-h-40 flex-col justify-between rounded-md bg-[#F2F4F7] p-5 ring-1 ring-[#F2F4F7]">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                <p class="font-semibold text-slate-900">{{ $item[0] }}</p>
                                <p class="mt-2 text-sm text-slate-500">{{ $item[1] }}</p>
                            </div>
                            <x-status-badge :status="$item[2]" />
                        </div>

                        @if ($item[3])
                            <a href="{{ route($item[3]) }}" class="mt-5 inline-flex w-fit items-center justify-center rounded-md bg-[#004D26] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#003D1F]" wire:navigate>
                                Isi Form
                            </a>
                        @else
                            <button type="button" class="mt-5 w-fit rounded-md bg-[#004D26] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#003D1F]">
                                Isi Form
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts::app>

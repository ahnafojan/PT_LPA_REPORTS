<x-layouts::app :title="__('Dashboard Super Admin')">
    <div class="space-y-6">
        <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @foreach ([
                ['label' => 'Total laporan masuk', 'value' => '128', 'note' => 'Periode berjalan'],
                ['label' => 'Sudah diisi', 'value' => '94', 'note' => '73% selesai'],
                ['label' => 'Belum diisi', 'value' => '26', 'note' => 'Butuh reminder'],
                ['label' => 'Terlambat', 'value' => '8', 'note' => 'Lewat deadline'],
            ] as $card)
                <div class="rounded-md bg-white p-5 shadow-sm ring-1 ring-[#d8edd8]">
                    <p class="text-sm font-semibold text-slate-500">{{ $card['label'] }}</p>
                    <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $card['value'] }}</p>
                    <p class="mt-2 text-xs font-semibold text-[#004D26]">{{ $card['note'] }}</p>
                </div>
            @endforeach
        </section>

        <section class="grid gap-6 xl:grid-cols-[1fr_380px]">
            <div class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Tren per periode</p>
                        <h2 class="mt-2 text-2xl font-semibold text-slate-900">Laporan masuk 6 periode terakhir</h2>
                    </div>
                    <a href="{{ route('superadmin.monitoring') }}" class="inline-flex rounded-md bg-[#004D26] px-4 py-2 text-sm font-bold text-white" wire:navigate>
                        Monitoring
                    </a>
                </div>

                <div class="mt-8 flex h-64 items-end gap-3 border-b border-l border-[#d8edd8] px-4 pb-4">
                    @foreach (['h-24', 'h-36', 'h-32', 'h-44', 'h-40', 'h-48'] as $index => $height)
                        <div class="flex flex-1 flex-col items-center gap-2">
                            <div class="{{ $height }} w-full rounded-t-md bg-[#004D26]"></div>
                            <span class="text-xs font-semibold text-slate-500">P{{ $index + 1 }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <aside class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Pusat kendali</p>
                <div class="mt-5 space-y-3">
                    @foreach ([
                        ['Manajemen Jenis Laporan', 'superadmin.report-types'],
                        ['Manajemen Field / Kolom', 'superadmin.fields'],
                        ['Pengaturan Periode', 'superadmin.periods'],
                        ['Laporan & Export', 'superadmin.exports'],
                    ] as $item)
                        <a href="{{ route($item[1]) }}" class="flex items-center justify-between rounded-md bg-[#f7fbf6] px-4 py-3 text-sm font-bold text-slate-800 ring-1 ring-[#d8edd8]" wire:navigate>
                            {{ $item[0] }}
                            <span class="text-[#004D26]">-&gt;</span>
                        </a>
                    @endforeach
                </div>
            </aside>
        </section>
    </div>
</x-layouts::app>

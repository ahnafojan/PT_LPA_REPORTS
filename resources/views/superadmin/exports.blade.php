<x-layouts::app :title="__('Laporan & Export')">
    <div class="grid gap-6 xl:grid-cols-[380px_1fr]">
        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Export global</p>
            <form class="mt-5 space-y-4">
                <x-alpine-dropdown name="jenis_laporan" :options="['Semua jenis laporan']" />
                <x-alpine-dropdown name="admin" :options="['Semua admin']" />
                <div class="grid grid-cols-2 gap-3">
                    <x-date-picker name="tanggal_mulai" placeholder="Tanggal mulai" />
                    <x-date-picker name="tanggal_selesai" placeholder="Tanggal selesai" />
                </div>
                <x-export-buttons excel-label="Download Excel" pdf-label="Download PDF" />
            </form>
        </section>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#d8edd8]">
            <h2 class="text-2xl font-semibold text-slate-900">Rekap semua laporan</h2>
            <div class="mt-6 grid gap-4 md:grid-cols-3">
                @foreach ([['Total data', 128], ['Terkirim', 94], ['Terlambat', 8]] as $item)
                    <div class="rounded-md bg-[#f7fbf6] p-5 ring-1 ring-[#d8edd8]">
                        <p class="text-sm font-semibold text-slate-500">{{ $item[0] }}</p>
                        <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $item[1] }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layouts::app>

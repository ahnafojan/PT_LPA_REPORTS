<x-layouts::app :title="__('Pengaturan Periode')">
    <div class="grid gap-6 xl:grid-cols-[420px_1fr]">
        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Deadline laporan</p>
            <form class="mt-5 space-y-4">
                <x-alpine-dropdown name="jenis_laporan" :options="['Laporan Keuangan Bulanan']" />
                <div class="grid grid-cols-2 gap-3">
                    <x-date-picker name="tanggal_mulai" placeholder="Tanggal mulai" />
                    <x-date-picker name="tanggal_selesai" placeholder="Tanggal selesai" />
                </div>
                <x-alpine-dropdown name="frekuensi" :options="['Bulanan', 'Mingguan', 'Harian']" />
                <button type="button" class="w-full rounded-md bg-[#004D26] px-4 py-3 text-sm font-bold text-white">Simpan Periode</button>
            </form>
        </section>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7]">
            <h2 class="text-2xl font-semibold text-slate-900">Periode aktif</h2>
            <div class="mt-6 grid gap-3 md:grid-cols-2">
                @foreach ([['Kehadiran', 'Harian', '17:00'], ['Keuangan', 'Bulanan', '10 Mei 2026'], ['Produksi', 'Harian', '20:00'], ['Audit Mesin', 'Mingguan', 'Setiap Jumat']] as $item)
                    <div class="rounded-md bg-[#F2F4F7] p-4 ring-1 ring-[#F2F4F7]">
                        <p class="font-semibold text-slate-900">{{ $item[0] }}</p>
                        <p class="mt-1 text-sm text-slate-500">{{ $item[1] }} - deadline {{ $item[2] }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layouts::app>

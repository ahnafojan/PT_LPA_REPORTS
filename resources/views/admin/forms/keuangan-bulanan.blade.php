<x-layouts::app :title="__('Laporan Keuangan Bulanan')">
    <div class="space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#004D26]">Input laporan</p>
                <h2 class="mt-2 text-2xl font-semibold text-slate-900">Laporan Keuangan Bulanan</h2>
                <p class="mt-2 text-sm text-slate-500">Form statis sementara sebelum field dinamis terhubung ke database.</p>
            </div>
            <a href="{{ route('reports.input') }}" class="inline-flex w-fit rounded-md bg-white px-4 py-2 text-sm font-semibold text-[#004D26] ring-1 ring-[#F2F4F7]" wire:navigate>
                Kembali
            </a>
        </div>

        <section class="rounded-md bg-white p-6 shadow-sm ring-1 ring-[#F2F4F7] lg:p-7">
            <form class="grid gap-5 md:grid-cols-2" x-data="{ savingDraft: false, sendingReport: false }">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Periode laporan</label>
                    <x-date-picker name="periode_laporan" mode="month" placeholder="Pilih periode" />
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Tanggal pengisian</label>
                    <x-date-picker name="tanggal_pengisian" placeholder="Pilih tanggal pengisian" />
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Total pemasukan</label>
                    <input type="number" placeholder="0" class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Total pengeluaran</label>
                    <input type="number" placeholder="0" class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Saldo akhir</label>
                    <input type="number" placeholder="0" class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Status verifikasi</label>
                    <x-alpine-dropdown
                        name="status_verifikasi"
                        button-class="focus:ring-[#004D26]/25"
                        :options="['Belum diverifikasi', 'Sudah diverifikasi']" />
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Catatan laporan</label>
                    <textarea rows="5" placeholder="Tambahkan catatan bila ada..." class="w-full rounded-md border border-[#F2F4F7] px-4 py-3 text-sm outline-none focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/25"></textarea>
                </div>

                <div class="md:col-span-2 flex flex-col gap-3 sm:flex-row sm:justify-end">
                    <button type="reset" class="rounded-md bg-white px-5 py-3 text-sm font-semibold text-[#004D26] ring-1 ring-[#F2F4F7]">
                        Reset
                    </button>
                    <button
                        type="button"
                        @click="savingDraft = true; setTimeout(() => savingDraft = false, 900)"
                        :disabled="savingDraft || sendingReport"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-[#004D26] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#003D1F] disabled:cursor-wait disabled:opacity-80">
                        <x-loading-spinner x-cloak x-show="savingDraft" />
                        <span x-text="savingDraft ? 'Menyimpan...' : 'Simpan Draft'">Simpan Draft</span>
                    </button>
                    <button
                        type="button"
                        @click="sendingReport = true; setTimeout(() => sendingReport = false, 900)"
                        :disabled="savingDraft || sendingReport"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 disabled:cursor-wait disabled:opacity-80 dark:bg-slate-100 dark:text-slate-950 dark:hover:bg-white">
                        <x-loading-spinner x-cloak x-show="sendingReport" />
                        <span x-text="sendingReport ? 'Mengirim...' : 'Kirim Laporan'">Kirim Laporan</span>
                    </button>
                </div>
            </form>
        </section>
    </div>
</x-layouts::app>

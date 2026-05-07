@props([
    'name' => 'confirmModal',
    'title' => 'Konfirmasi',
    'confirmLabel' => 'Ya, lanjutkan',
])

<div x-data="{ open: false }" @open-{{ $name }}.window="open = true">
    {{ $trigger ?? '' }}

    <div x-show="open" x-transition.opacity class="fixed inset-0 z-50 grid place-items-center bg-slate-900/35 px-4">
        <div @click.outside="open = false" class="w-full max-w-md rounded-md bg-white p-6 shadow-xl ring-1 ring-slate-200">
            <h2 class="text-lg font-black text-slate-950">{{ $title }}</h2>
            <div class="mt-3 text-sm leading-6 text-slate-600">
                {{ $slot }}
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <button type="button" @click="open = false" class="rounded-md bg-white px-4 py-2 text-sm font-bold text-slate-600 ring-1 ring-slate-200">
                    Batal
                </button>
                <button type="button" @click="open = false" class="rounded-md bg-[#004D26] px-4 py-2 text-sm font-bold text-white">
                    {{ $confirmLabel }}
                </button>
            </div>
        </div>
    </div>
</div>

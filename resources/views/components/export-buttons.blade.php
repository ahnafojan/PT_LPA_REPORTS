@props([
    'excelLabel' => 'Excel',
    'pdfLabel' => 'PDF',
])

<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-2']) }}>
    <button type="button" class="inline-flex items-center gap-2 rounded-md bg-[#004D26] px-4 py-2 text-xs font-bold text-white transition hover:bg-[#003D1F]" wire:loading.attr="disabled">
        <x-sidebar-icon name="export" class="h-4 w-4" />
        {{ $excelLabel }}
    </button>
    <button type="button" class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-xs font-bold text-[#004D26] ring-1 ring-[#d8edd8] transition hover:bg-[#f2faf0]" wire:loading.attr="disabled">
        <x-sidebar-icon name="report" class="h-4 w-4" />
        {{ $pdfLabel }}
    </button>
    <span class="hidden text-xs font-semibold text-slate-500" wire:loading.inline>Memproses export...</span>
</div>

@props([
    'excelLabel' => 'Excel',
    'pdfLabel' => 'PDF',
])

<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-2']) }}>
    <button type="button" class="inline-flex items-center gap-2 rounded-md bg-[#004D26] px-4 py-2 text-xs font-bold text-white transition hover:bg-[#003D1F] disabled:cursor-wait disabled:opacity-80" wire:loading.attr="disabled">
        <x-loading-spinner class="hidden h-4 w-4" wire:loading.class.remove="hidden" />
        <x-sidebar-icon name="export" class="h-4 w-4" wire:loading.class="hidden" />
        <span wire:loading.remove>{{ $excelLabel }}</span>
        <span wire:loading>Menyiapkan...</span>
    </button>
    <button type="button" class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-xs font-bold text-[#004D26] ring-1 ring-[#F2F4F7] transition hover:bg-[#F2F4F7] disabled:cursor-wait disabled:opacity-70 dark:bg-slate-900 dark:ring-slate-700" wire:loading.attr="disabled">
        <x-loading-spinner class="hidden h-4 w-4" wire:loading.class.remove="hidden" />
        <x-sidebar-icon name="report" class="h-4 w-4" wire:loading.class="hidden" />
        <span wire:loading.remove>{{ $pdfLabel }}</span>
        <span wire:loading>Menyiapkan...</span>
    </button>
</div>

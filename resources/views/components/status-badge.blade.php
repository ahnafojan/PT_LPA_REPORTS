@props([
    'status' => 'draft',
])

@php
    $label = str($status)->replace('-', ' ')->title();

    $classes = match ($status) {
        'terkirim', 'aktif', 'selesai' => 'bg-[#e8f7e6] text-[#004D26] ring-[#c9e9c8]',
        'terlambat', 'error', 'nonaktif' => 'bg-red-50 text-red-700 ring-red-200',
        'proses', 'draft' => 'bg-amber-50 text-amber-700 ring-amber-200',
        'belum' => 'bg-slate-100 text-slate-600 ring-slate-200',
        default => 'bg-[#f2faf0] text-[#004D26] ring-[#d8edd8]',
    };
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md px-2.5 py-1 text-xs font-bold ring-1 '.$classes]) }}>
    {{ $slot->isEmpty() ? $label : $slot }}
</span>

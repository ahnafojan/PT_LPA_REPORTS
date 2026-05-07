@props([
    'name',
    'value' => null,
    'mode' => 'date',
    'placeholder' => 'Pilih tanggal',
])

<div
    {{ $attributes->merge(['class' => 'relative']) }}
    x-data="lpaDatePicker({ mode: @js($mode), defaultDate: @js($value) })">
    <input
        x-ref="input"
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        readonly
        class="block w-full cursor-pointer rounded-md border border-[#d6ead5] bg-white px-4 py-3 pr-11 text-sm outline-none transition placeholder:text-slate-400 focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60">

    <button
        type="button"
        class="absolute inset-y-0 right-0 grid w-11 place-items-center text-[#004D26]"
        @click="picker?.open()"
        aria-label="Pilih tanggal">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.25 3.75v3M16.75 3.75v3M4.75 8.25h14.5M6.25 5.25h11.5a1.5 1.5 0 0 1 1.5 1.5v11a1.5 1.5 0 0 1-1.5 1.5H6.25a1.5 1.5 0 0 1-1.5-1.5v-11a1.5 1.5 0 0 1 1.5-1.5Z" />
        </svg>
    </button>
</div>

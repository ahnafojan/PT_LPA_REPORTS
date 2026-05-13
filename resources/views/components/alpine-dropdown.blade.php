@props([
    'options' => [],
    'selected' => null,
    'name' => null,
    'buttonClass' => '',
])

@php
    $items = collect($options)
        ->map(function ($option) {
            if (is_array($option)) {
                $label = $option['label'] ?? $option[0] ?? '';
                $value = $option['value'] ?? $option[1] ?? $label;

                return ['label' => (string) $label, 'value' => (string) $value];
            }

            return ['label' => (string) $option, 'value' => (string) $option];
        })
        ->values();

    $selectedItem = $items->firstWhere('value', $selected) ?? $items->first();
@endphp

<div
    {{ $attributes->merge(['class' => 'relative']) }}
    x-data="{
        open: false,
        selected: @js($selectedItem),
        options: @js($items),
    }"
    @keydown.escape.window="open = false">
    @if ($name)
        <input type="hidden" name="{{ $name }}" :value="selected.value">
    @endif

    <button
        type="button"
        class="flex w-full items-center justify-between gap-3 rounded-md border border-[#F2F4F7] bg-white px-4 py-3 text-left text-sm outline-none transition focus:border-[#004D26] focus:ring-2 focus:ring-[#004D26]/60 {{ $buttonClass }}"
        @click="open = ! open"
        :aria-expanded="open.toString()">
        <span class="truncate" x-text="selected.label"></span>
        <svg
            class="h-4 w-4 shrink-0 text-[#004D26] transition"
            :class="open ? 'rotate-180' : ''"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
        </svg>
    </button>

    <div
        x-cloak
        x-show="open"
        x-transition.origin.top
        @click.outside="open = false"
        class="absolute left-0 right-0 z-50 mt-1 max-h-56 overflow-y-auto rounded-md border border-[#F2F4F7] bg-white p-1 shadow-lg">
        <template x-for="option in options" :key="option.value">
            <button
                type="button"
                class="flex w-full items-center rounded-md px-3 py-2 text-left text-sm text-slate-600 transition hover:bg-[#F2F4F7] hover:text-[#004D26]"
                :class="selected.value === option.value ? 'bg-[#F2F4F7] font-semibold text-[#004D26]' : ''"
                @click="selected = option; open = false; $dispatch('dropdown-change', option)">
                <span class="truncate" x-text="option.label"></span>
            </button>
        </template>
    </div>
</div>

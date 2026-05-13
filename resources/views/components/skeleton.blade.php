@props([
    'lines' => 1,
])

<div {{ $attributes->merge(['class' => 'animate-pulse space-y-3']) }} aria-hidden="true">
    @for ($line = 0; $line < $lines; $line++)
        <div class="h-3 rounded-md bg-slate-200 dark:bg-slate-800"></div>
    @endfor
</div>

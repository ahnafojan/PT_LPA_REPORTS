<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
    {{ filled($title ?? null) ? $title.' - '.config('app.name', 'PT Lucky Print Abadi') : config('app.name', 'PT Lucky Print Abadi') }}
</title>

<link rel="icon" href="/logo.png" sizes="any">
<link rel="icon" href="/logo.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/logo.png">
<link rel="stylesheet" href="{{ asset('vendor/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/flatpickr/monthSelect.css') }}">

<script>
    (() => {
        const storedTheme = localStorage.getItem('lpa-theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const shouldUseDark = storedTheme ? storedTheme === 'dark' : prefersDark;

        document.documentElement.classList.toggle('dark', shouldUseDark);
    })();
</script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="{{ asset('vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('vendor/flatpickr/monthSelect.js') }}"></script>
<script src="{{ asset('vendor/flatpickr/lpa-date-picker.js') }}"></script>
@fluxAppearance

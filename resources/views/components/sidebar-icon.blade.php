@props([
    'name' => 'dashboard',
])

<svg {{ $attributes->merge(['class' => 'h-5 w-5']) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
    @switch($name)
        @case('dashboard')
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.75h6.5v6.5h-6.5v-6.5ZM13.75 4.75h6.5v4.5h-6.5v-4.5ZM13.75 12.75h6.5v6.5h-6.5v-6.5ZM3.75 14.75h6.5v4.5h-6.5v-4.5Z" />
            @break

        @case('kwh')
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 2.75 5.75 13h5.5L11 21.25 18.25 11h-5.5L13 2.75Z" />
            @break

        @case('fuel')
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3.75h7.5v16.5h-7.5V3.75ZM8.75 6.25h3.5M14.25 8.75l3 3v6.25a2.25 2.25 0 0 0 4.5 0v-5.75l-3.25-3.25M14.25 20.25h-7.5" />
            @break

        @case('production')
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 19.25V9.75l5 3v-3l5 3v-3l6.5 3.75v5.75H3.75ZM6.75 16.25h2.5M11.25 16.25h2.5M15.75 16.25h2.5M5.75 9.25l1-4.5h3l1 6" />
            @break

        @case('report')
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.25 3.75h7.5l4 4v12.5H7.25V3.75ZM14.75 3.75v4h4M9.75 12.25h6.5M9.75 15.25h6.5M9.75 18.25h3.5" />
            @break

        @case('report-types')
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.25 4.75h11.5v14.5H6.25V4.75ZM8.75 8.25h6.5M8.75 11.75h6.5M8.75 15.25h4.5M4.75 7.25h1.5M4.75 12h1.5M4.75 16.75h1.5" />
            @break

        @case('input')
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 19.25h13.5M7.25 15.75l8.9-8.9a2.12 2.12 0 0 1 3 3l-8.9 8.9h-3v-3ZM14.75 8.25l3 3" />
            @break

        @case('list')
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h11M8.25 12h11M8.25 17.25h11M4.75 6.75h.01M4.75 12h.01M4.75 17.25h.01" />
            @break

        @case('archive')
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.75 7.25h14.5v3H4.75v-3ZM6.25 10.25v8h11.5v-8M9.25 13.25h5.5M7.25 4.75h9.5l1 2.5H6.25l1-2.5Z" />
            @break

        @case('bell')
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.25 17.75a3.25 3.25 0 0 1-6.5 0M5.75 16.25h12.5l-1.5-2v-3.5a4.75 4.75 0 0 0-9.5 0v3.5l-1.5 2ZM12 4.25v-1" />
            @break

        @case('export')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.75v9M8.75 8 12 4.75 15.25 8M5.25 13.25v5h13.5v-5M8.25 18.25h7.5" />
            @break

        @case('users')
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 11.25a3.25 3.25 0 1 0 0-6.5 3.25 3.25 0 0 0 0 6.5ZM3.75 19.25a6 6 0 0 1 12 0M16.25 6.25a2.75 2.75 0 0 1 0 5.5M17.75 14.25a4.5 4.5 0 0 1 2.5 5" />
            @break

        @case('monitor')
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.75 5.25h14.5v10.5H4.75V5.25ZM9.25 19.25h5.5M12 15.75v3.5M8.25 12.25l2.25-2.5 2 2 3.25-4" />
            @break

        @case('calendar')
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.25 3.75v3M16.75 3.75v3M4.75 8.25h14.5M6.25 5.25h11.5a1.5 1.5 0 0 1 1.5 1.5v11a1.5 1.5 0 0 1-1.5 1.5H6.25a1.5 1.5 0 0 1-1.5-1.5v-11a1.5 1.5 0 0 1 1.5-1.5ZM8.25 11.75h2M13.75 11.75h2M8.25 15.75h2M13.75 15.75h2" />
            @break

        @case('activity')
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.75 12h3l2-5.5 4.5 11 2-5.5h3M5.25 4.75h13.5v14.5H5.25V4.75Z" />
            @break

        @case('switch')
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.75 7.25h11M15.75 3.75l3.5 3.5-3.5 3.5M16.25 16.75h-11M8.25 13.25l-3.5 3.5 3.5 3.5" />
            @break

        @case('admin')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.75 5.25 6.5v5.25c0 4.25 2.75 7.5 6.75 8.5 4-1 6.75-4.25 6.75-8.5V6.5L12 3.75ZM9.75 12.25l1.5 1.5 3.25-3.5" />
            @break

        @case('profile')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12.25a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM4.75 20.25a7.25 7.25 0 0 1 14.5 0" />
            @break

        @case('menu-builder')
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 6.75h13.5M5.25 12h13.5M5.25 17.25h8.5M17.75 15.25v4M15.75 17.25h4" />
            @break

        @case('menu')
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.75 6.75h14.5M4.75 12h14.5M4.75 17.25h14.5" />
            @break

        @case('form-builder')
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.25 4.75h11.5v14.5H6.25V4.75ZM8.75 8.25h6.5M8.75 11.75h6.5M8.75 15.25h3.5M16.25 15.25h1.5" />
            @break

        @case('logout')
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 6.75V5.25a1.5 1.5 0 0 1 1.5-1.5h7v16.5h-7a1.5 1.5 0 0 1-1.5-1.5v-1.5M4.25 12h10M7.75 8.5 4.25 12l3.5 3.5" />
            @break

        @case('moon')
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.25 14.25A7.25 7.25 0 0 1 9.75 4.75 7.25 7.25 0 1 0 19.25 14.25Z" />
            @break

        @case('sun')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.75a4.25 4.25 0 1 1 0 8.5 4.25 4.25 0 0 1 0-8.5ZM12 3.75v1.5M12 18.75v1.5M20.25 12h-1.5M5.25 12h-1.5M17.85 6.15l-1.1 1.1M7.25 16.75l-1.1 1.1M17.85 17.85l-1.1-1.1M7.25 7.25l-1.1-1.1" />
            @break

        @case('collapse')
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.25 5.75 9 12l6.25 6.25M4.75 5.75v12.5" />
            @break

        @default
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5.25v13.5M5.25 12h13.5" />
    @endswitch
</svg>

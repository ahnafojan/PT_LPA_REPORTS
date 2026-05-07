<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-[#004D26] font-sans text-slate-800 antialiased">
    <main class="flex min-h-screen items-center justify-center px-5 py-10">
        <section class="w-full max-w-sm">
            <div class="mb-7 flex justify-center">
                <a href="{{ route('home') }}" class="flex w-full items-center justify-center gap-3" wire:navigate>
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="PT Lucky Print Abadi"
                        width="64"
                        height="64"
                        class="h-16 w-16 shrink-0 rounded-full object-contain">
                    <span class="w-[11.75rem] text-white">
                        <span class="block whitespace-nowrap text-3xl font-light leading-none tracking-wide">
                            <span class="font-black">LUCKY</span>TEX
                        </span>
                        <span class="mt-1 flex w-full items-center justify-between whitespace-nowrap text-[10px] font-black uppercase leading-none tracking-normal">
                            <span class="font-light">LUCKY TEXTILE GROUP - SINCE 1970</span>
                        </span>
                    </span>
                </a>
            </div>

            {{ $slot }}
        </section>
    </main>

    @persist('toast')
    <flux:toast.group>
        <flux:toast />
    </flux:toast.group>
    @endpersist

    @fluxScripts
</body>

</html>
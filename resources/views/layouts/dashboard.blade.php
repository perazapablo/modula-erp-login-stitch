<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-canvas-alt text-ink">
        <div class="flex min-h-screen">
            @include('layouts.partials.app-rail')

            <div class="flex-1">
                <header class="flex items-center justify-between border-b border-line bg-white px-6 py-3">
                    <div class="flex items-center gap-2 text-sm text-ink/60">
                        <span class="font-semibold text-ink">MODULA</span>
                        <span>/</span>
                        {{ $breadcrumb ?? 'Configuración de Cuenta' }}
                    </div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Sesión corporativa segura
                    </span>
                </header>

                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>

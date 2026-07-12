<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-50">

    <div class="flex min-h-screen items-center justify-center px-6">

        <div class="w-full max-w-md">

            <div class="mb-8 text-center">
                <a href="{{ url('/') }}">
                    <h1 class="text-4xl font-bold text-sky-500">
                        PractiHub
                    </h1>

                    <p class="mt-2 text-slate-500">
                        Encuentra tus primeras prácticas profesionales
                    </p>
                </a>
            </div>

            <div class="rounded-2xl bg-white p-8 shadow-lg border border-slate-100">
                {{ $slot }}
            </div>

        </div>

    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'PractiHub') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-700 antialiased">

    <header class="sticky top-0 z-50 bg-white/70 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="#" class="flex items-center gap-2">
                <div class="w-10 h-10 rounded-xl bg-sky-200 flex items-center justify-center text-xl">
                    🎓
                </div>

                <span class="font-bold text-xl text-slate-800">
                    PractiHub
                </span>
            </a>

            <div class="flex items-center gap-3">

                @auth

                    <a href="{{ url('/dashboard') }}"
                       class="px-4 py-2 rounded-xl bg-sky-200 text-sky-800 font-medium hover:bg-sky-300 transition">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="px-4 py-2 text-slate-600 hover:text-sky-600 transition">
                        Entrar
                    </a>

                    @if(Route::has('register'))

                        <a href="{{ route('register') }}"
                           class="px-4 py-2 rounded-xl bg-sky-200 text-sky-800 font-medium hover:bg-sky-300 transition">
                            Crear cuenta
                        </a>

                    @endif

                @endauth

            </div>

        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 pt-20 pb-16">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div>

                <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-medium mb-6">
                    🚀 Nuevas oportunidades cada semana
                </span>


                <h1 class="text-5xl font-bold leading-tight text-slate-800 mb-6">
                    Encuentra tus primeras
                    <span class="text-sky-500">
                        prácticas profesionales
                    </span>
                </h1>


                <p class="text-lg text-slate-600 mb-8 max-w-xl">
                    Conecta con empresas, descubre oportunidades
                    y consigue la experiencia que necesitas para empezar tu carrera
                </p>

                

            </div>

            <div class="relative">

                <div class="bg-white rounded-3xl shadow-xl p-8">

                    <div class="grid grid-cols-2 gap-4">


                        <div class="bg-sky-100 rounded-2xl p-6">
                            <div class="text-3xl mb-3">
                                💼
                            </div>

                            <p class="font-semibold">
                                230+
                            </p>

                            <span class="text-sm text-slate-600">
                                prácticas activas
                            </span>
                        </div>

                        <div class="bg-violet-100 rounded-2xl p-6">
                            <div class="text-3xl mb-3">
                                🏢
                            </div>

                            <p class="font-semibold">
                                Empresas
                            </p>

                            <span class="text-sm text-slate-600">
                                buscando talento
                            </span>
                        </div>

                        <div class="bg-emerald-100 rounded-2xl p-6">
                            <div class="text-3xl mb-3">
                                🎓
                            </div>

                            <p class="font-semibold">
                                Estudiantes
                            </p>

                            <span class="text-sm text-slate-600">
                                conectados
                            </span>
                        </div>

                        <div class="bg-amber-100 rounded-2xl p-6">
                            <div class="text-3xl mb-3">
                                ⭐
                            </div>

                            <p class="font-semibold">
                                Primer empleo
                            </p>

                            <span class="text-sm text-slate-600">
                                más cerca
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-3xl font-bold text-center text-slate-800 mb-10">
            Encuentra prácticas por categoria
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-6 gap-4">

            @foreach([
                ['💻','Informática'],
                ['📢','Marketing'],
                ['🎨','Diseño'],
                ['⚙️','Ingeniería'],
                ['💰','Finanzas'],
                ['🏥','Sanidad']
            ] as $category)

                <div class="bg-white rounded-2xl shadow-sm p-5 text-center hover:-translate-y-1 transition">

                    <div class="text-3xl mb-3">
                        {{ $category[0] }}
                    </div>

                    <p class="font-medium">
                        {{ $category[1] }}
                    </p>

                </div>

            @endforeach

        </div>

    </section>

    
    <section id="como-funciona" class="bg-white py-16 scroll-mt-24">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center text-slate-800 mb-12">
                ¿Cómo funciona?
            </h2>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="text-center">

                    <div class="mx-auto mb-4 w-14 h-14 rounded-2xl bg-sky-200 flex items-center justify-center text-2xl">
                        👤
                    </div>

                    <h3 class="font-bold mb-2">
                        Crea tu perfil
                    </h3>

                    <p class="text-slate-600">
                        Añade tus estudios, habilidades y experiencia
                    </p>

                </div>

                <div class="text-center">

                    <div class="mx-auto mb-4 w-14 h-14 rounded-2xl bg-violet-200 flex items-center justify-center text-2xl">
                        🔎
                    </div>

                    <h3 class="font-bold mb-2">
                        Encuentra oportunidades
                    </h3>

                    <p class="text-slate-600">
                        Busca prácticas adaptadas a tu perfil
                    </p>

                </div>

                <div class="text-center">

                    <div class="mx-auto mb-4 w-14 h-14 rounded-2xl bg-emerald-200 flex items-center justify-center text-2xl">
                        🚀
                    </div>

                    <h3 class="font-bold mb-2">
                        Empieza tu carrera
                    </h3>

                    <p class="text-slate-600">
                        Contacta con empresas y gana experiencia
                    </p>

                </div>

            </div>

        </div>

    </section>

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="rounded-3xl bg-sky-200 p-10 text-center">

            <h2 class="text-3xl font-bold text-slate-800 mb-4">
                Tu primera oportunidad empieza aquí
            </h2>

            <p class="mb-8">
                Únete a estudiantes y empresas que ya están conectando.
            </p>

            @guest

                <a href="{{ route('register') }}"
                   class="inline-block px-8 py-3 rounded-xl bg-white font-semibold shadow hover:shadow-lg transition">
                    Crear cuenta gratis
                </a>

            @endguest

        </div>

    </section>

</body>
</html>

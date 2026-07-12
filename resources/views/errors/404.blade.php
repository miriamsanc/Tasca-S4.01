<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - PractiHub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-pink-50">

    <div class="max-w-xl rounded-3xl bg-white p-10 shadow-lg text-center border border-pink-100">

        <div class="text-7xl mb-4">🌸</div>

        <h1 class="text-7xl font-bold text-pink-300">404</h1>

        <h2 class="mt-4 text-3xl font-bold text-slate-700">
            Página no encontrada
        </h2>

        <p class="mt-4 text-slate-600">
            La página que buscas no existe o ha sido eliminada.
        </p>

        <a href="{{ url('/') }}"
           class="inline-block mt-8 rounded-xl bg-sky-200 px-6 py-3 font-semibold text-slate-700 hover:bg-sky-300 transition">
            Volver al inicio
        </a>

    </div>

</body>
</html>
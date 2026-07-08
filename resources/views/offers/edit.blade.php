<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-200">
                ✏️
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-slate-700">
                    {{ __('Editar publicación') }}
                </h2>

                <p class="text-sm text-slate-500">
                    Actualiza la información de tu publicación.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-3xl px-6">

            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                <form method="POST" action="{{ route('offers.update', $offer) }}">
                    @csrf
                    @method('PUT')

                    <!-- Tipo de publicación -->

                    <div class="mb-8">

                        <label class="mb-3 block text-sm font-semibold text-slate-700">
                            Tipo de publicación
                        </label>

                        <div class="grid gap-4 md:grid-cols-2">

                            <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-slate-200 p-4 transition hover:border-sky-300 hover:bg-sky-50">

                                <input
                                    type="radio"
                                    name="type"
                                    value="buscando_practicas"
                                    class="text-sky-500 focus:ring-sky-300"
                                    {{ old('type', $offer->type) == 'buscando_practicas' ? 'checked' : '' }}
                                    required>

                                <div>
                                    <p class="font-medium text-slate-700">
                                        🎓 Busco prácticas
                                    </p>

                                    <p class="text-sm text-slate-500">
                                        Soy estudiante y busco una empresa.
                                    </p>
                                </div>

                            </label>

                            <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-slate-200 p-4 transition hover:border-sky-300 hover:bg-sky-50">

                                <input
                                    type="radio"
                                    name="type"
                                    value="ofreciendo_practicas"
                                    class="text-sky-500 focus:ring-sky-300"
                                    {{ old('type', $offer->type) == 'ofreciendo_practicas' ? 'checked' : '' }}
                                    required>

                                <div>
                                    <p class="font-medium text-slate-700">
                                        🏢 Ofrezco prácticas
                                    </p>

                                    <p class="text-sm text-slate-500">
                                        Mi empresa busca estudiantes.
                                    </p>
                                </div>

                            </label>

                        </div>

                    </div>

                    <!-- Título -->

                    <div class="mb-6">

                        <label
                            for="title"
                            class="mb-2 block text-sm font-semibold text-slate-700">

                            Título

                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $offer->title) }}"
                            required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">

                    </div>

                    <!-- Categoría + Ubicación -->

                    <div class="mb-6 grid gap-6 md:grid-cols-2">

                        <div>

                            <label
                                for="category"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Categoría

                            </label>

                            <input
                                id="category"
                                type="text"
                                name="category"
                                value="{{ old('category', $offer->category) }}"
                                required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">

                        </div>

                        <div>

                            <label
                                for="location"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Ubicación

                            </label>

                            <input
                                id="location"
                                type="text"
                                name="location"
                                value="{{ old('location', $offer->location) }}"
                                required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">

                        </div>

                    </div>

                    <!-- Descripción -->

                    <div class="mb-8">

                        <label
                            for="description"
                            class="mb-2 block text-sm font-semibold text-slate-700">

                            Descripción detallada

                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">{{ old('description', $offer->description) }}</textarea>

                    </div>

                    <!-- Estado -->

                    <div class="mb-8">

                        <label class="mb-3 block text-sm font-semibold text-slate-700">
                            Estado de la publicación
                        </label>

                        <div class="grid gap-4 md:grid-cols-2">

                            <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-slate-200 p-4 transition hover:border-emerald-300 hover:bg-emerald-50">

                                <input
                                    type="radio"
                                    name="is_active"
                                    value="1"
                                    class="text-emerald-500 focus:ring-emerald-300"
                                    {{ old('is_active', $offer->is_active) == 1 ? 'checked' : '' }}
                                    required>

                                <div>

                                    <p class="font-medium text-slate-700">
                                        🟢 Abierta
                                    </p>

                                    <p class="text-sm text-slate-500">
                                        Visible para todos los usuarios.
                                    </p>

                                </div>

                            </label>

                            <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-slate-200 p-4 transition hover:border-pink-300 hover:bg-pink-50">

                                <input
                                    type="radio"
                                    name="is_active"
                                    value="0"
                                    class="text-pink-500 focus:ring-pink-300"
                                    {{ old('is_active', $offer->is_active) == 0 ? 'checked' : '' }}
                                    required>

                                <div>

                                    <p class="font-medium text-slate-700">
                                        🔒 Cerrada
                                    </p>

                                    <p class="text-sm text-slate-500">
                                        Ya no acepta nuevas solicitudes.
                                    </p>

                                </div>

                            </label>

                        </div>

                    </div>

                    <!-- Botones -->

                    <div class="flex items-center justify-end gap-4 border-t border-slate-200 pt-6">

                        <a
                            href="{{ route('offers.index') }}"
                            class="rounded-xl px-5 py-3 text-slate-500 transition hover:bg-slate-100">

                            Cancelar

                        </a>

                        <button
                            type="submit"
                            class="rounded-xl bg-violet-300 px-6 py-3 font-medium text-slate-800 shadow-sm transition-all duration-300 hover:bg-violet-400 hover:shadow-md">

                            Guardar cambios

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>

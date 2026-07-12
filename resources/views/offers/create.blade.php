<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-200">
                💼
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-slate-700">
                    {{ __('Crear nueva publicación') }}
                </h2>

                <p class="text-sm text-slate-500">
                    Publica una oferta de prácticas o busca una oportunidad.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 py-10">
        <div class="mx-auto max-w-3xl px-6">

            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                <form method="POST" action="{{ route('offers.store') }}">
                    @csrf

                    
                    <div class="mb-8">

                        <label class="mb-3 block text-sm font-semibold text-slate-700">
                            ¿Qué deseas publicar?
                        </label>

                        <div class="grid gap-4 md:grid-cols-2">

                            <label
                                class="flex cursor-pointer items-center gap-3 rounded-2xl border border-slate-200 p-4 transition hover:border-sky-300 hover:bg-sky-50">

                                <input
                                    type="radio"
                                    name="type"
                                    value="buscando_practicas"
                                    class="text-sky-500 focus:ring-sky-300"
                                    {{ old('type') == 'buscando_practicas' ? 'checked' : '' }}
                                    required>

                                <div>
                                    <p class="font-medium text-slate-700">
                                        Busco prácticas
                                    </p>

                                    <p class="text-sm text-slate-500">
                                        Soy estudiante 
                                    </p>
                                </div>

                            </label>

                            <label
                                class="flex cursor-pointer items-center gap-3 rounded-2xl border border-slate-200 p-4 transition hover:border-sky-300 hover:bg-sky-50">

                                <input
                                    type="radio"
                                    name="type"
                                    value="ofreciendo_practicas"
                                    class="text-sky-500 focus:ring-sky-300"
                                    {{ old('type') == 'ofreciendo_practicas' ? 'checked' : '' }}
                                    required>

                                <div>
                                    <p class="font-medium text-slate-700">
                                        Ofrezco prácticas
                                    </p>

                                    <p class="text-sm text-slate-500">
                                        Mi empresa busca estudiantes
                                    </p>
                                </div>

                            </label>

                        </div>

                        @error('type')
                            <p class="mt-2 text-sm text-pink-500">{{ $message }}</p>
                        @enderror

                    </div>

                    
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
                            value="{{ old('title') }}"
                            placeholder="Ej: Se ofrece puesto de atención al cliente con idioma chino..."
                            required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-slate-700 shadow-sm focus:border-sky-300 focus:ring-sky-300">

                        @error('title')
                            <p class="mt-2 text-sm text-pink-500">{{ $message }}</p>
                        @enderror

                    </div>

                    
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
                                value="{{ old('category') }}"
                                placeholder="Ej: Turismo"
                                required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">

                            @error('category')
                                <p class="mt-2 text-sm text-pink-500">{{ $message }}</p>
                            @enderror

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
                                value="{{ old('location') }}"
                                placeholder="Ej: Barcelona"
                                required
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">

                            @error('location')
                                <p class="mt-2 text-sm text-pink-500">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>

                    
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
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-pink-500">{{ $message }}</p>
                        @enderror

                    </div>

                    
                    <div class="flex items-center justify-end gap-4 border-t border-slate-200 pt-6">

                        <a
                            href="{{ route('offers.index') }}"
                            class="rounded-xl px-5 py-3 text-slate-500 transition hover:bg-slate-100">

                            Cancelar

                        </a>

                        <button
                            type="submit"
                            class="rounded-xl bg-sky-300 px-6 py-3 font-medium text-slate-800 shadow-sm transition-all duration-300 hover:bg-sky-400 hover:shadow-md">

                            Publicar

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-200">
                💼
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-slate-700">
                    {{ __('Explora oportunidades de prácticas') }}
                </h2>

                <p class="text-sm text-slate-500">
                    Encuentra empresas o estudiantes según lo que estás buscando.
                </p>
            </div>
        </div>
    </x-slot>


    <div class="bg-slate-50 py-10">

        <div class="mx-auto max-w-7xl px-6">


            <!-- Contenedor principal -->

            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">


                <!-- Tabs + botón crear -->

                <div class="mb-8 flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


                    <nav class="flex rounded-2xl bg-slate-100 p-1"
                         aria-label="Tabs">


                        <a href="{{ route('offers.index', ['tab' => 'ofreciendo_practicas']) }}"
                           class="rounded-xl px-5 py-3 text-sm font-medium transition
                           {{ $activeTab === 'ofreciendo_practicas'
                                ? 'bg-sky-200 text-slate-800 shadow-sm'
                                : 'text-slate-500 hover:bg-white hover:text-slate-700' }}">

                            🏢 Empresas ofreciendo prácticas

                        </a>


                        <a href="{{ route('offers.index', ['tab' => 'buscando_practicas']) }}"
                           class="rounded-xl px-5 py-3 text-sm font-medium transition
                           {{ $activeTab === 'buscando_practicas'
                                ? 'bg-violet-200 text-slate-800 shadow-sm'
                                : 'text-slate-500 hover:bg-white hover:text-slate-700' }}">

                            🎓 Candidatos buscando prácticas

                        </a>


                    </nav>



                    <a href="{{ route('offers.create') }}"
                       class="inline-flex items-center justify-center rounded-xl bg-sky-300 px-6 py-3 font-medium text-slate-800 shadow-sm transition-all duration-300 hover:bg-sky-400 hover:shadow-md">

                        + Nueva publicación

                    </a>


                </div>




                <!-- Buscador -->


                <div class="mb-10 rounded-2xl border border-slate-200 bg-slate-50 p-6">


                    <div class="mb-4 flex items-center gap-2">

                        <span class="text-xl">
                            🔍
                        </span>

                        <h3 class="font-semibold text-slate-700">
                            Buscar oportunidades
                        </h3>

                    </div>



                    <form action="{{ route('offers.index') }}"
                          method="GET"
                          class="grid gap-5 md:grid-cols-3">


                        <input type="hidden"
                               name="tab"
                               value="{{ $activeTab }}">



                        <div>

                            <label for="category"
                                   class="mb-2 block text-sm font-medium text-slate-700">

                                Categoría

                            </label>


                            <input
                                type="text"
                                name="category"
                                id="category"
                                value="{{ request('category') }}"
                                placeholder="Ej. Programación, turismo..."
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">


                        </div>




                        <div>

                            <label for="location"
                                   class="mb-2 block text-sm font-medium text-slate-700">

                                Ubicación

                            </label>


                            <input
                                type="text"
                                name="location"
                                id="location"
                                value="{{ request('location') }}"
                                placeholder="Ej. Barcelona, Madrid..."
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 shadow-sm focus:border-sky-300 focus:ring-sky-300">


                        </div>





                        <div class="flex items-end gap-3">


                            <button
                                type="submit"
                                class="rounded-xl bg-sky-300 px-6 py-3 font-medium text-slate-800 transition hover:bg-sky-400">

                                Buscar

                            </button>



                            <a href="{{ route('offers.index', ['tab' => $activeTab]) }}"
                               class="rounded-xl border border-slate-300 bg-white px-6 py-3 font-medium text-slate-600 transition hover:bg-slate-100">

                                Limpiar

                            </a>


                        </div>



                    </form>


                </div>





                <!-- Lista de ofertas -->


                <div class="grid gap-6 md:grid-cols-2">


                    @foreach($offers as $offer)


                        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">



                            <div class="mb-4 flex items-start justify-between">


                                <div>


                                    <h3 class="text-xl font-bold text-slate-700">

                                        {{ $offer->title }}

                                    </h3>


                                    <p class="mt-2 text-sm text-slate-500">

                                        👤 Publicado por:

                                        <span class="font-medium text-slate-700">
                                            {{ $offer->user->name }}
                                        </span>

                                    </p>


                                </div>



                                @if($offer->type === 'ofreciendo_practicas')

                                    <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-medium text-emerald-700">

                                        Empresa

                                    </span>

                                @else

                                    <span class="rounded-full bg-violet-100 px-3 py-1 text-xs font-medium text-violet-700">

                                        Estudiante

                                    </span>

                                @endif



                            </div>





                            <div class="mb-5 flex flex-wrap gap-2">


                                <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-medium text-sky-700">

                                    📍 {{ $offer->location }}

                                </span>



                                <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-medium text-amber-700">

                                    🏷 {{ $offer->category }}

                                </span>


                            </div>





                            @if($offer->description)

                                <p class="mb-5 line-clamp-2 text-sm text-slate-600">

                                    {{ $offer->description }}

                                </p>

                            @endif






                            <div class="flex items-center justify-between border-t border-slate-200 pt-5">



                                <a href="{{ route('offers.show', $offer) }}"
                                   class="font-semibold text-sky-600 transition hover:text-sky-800">

                                    Ver oferta →

                                </a>





                                @if(auth()->check() && auth()->id() === $offer->user_id)


                                    <div class="flex gap-2">


                                        <a href="{{ route('offers.edit', $offer) }}"
                                           class="rounded-lg bg-violet-200 px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-violet-300">

                                            Editar

                                        </a>





                                        <form action="{{ route('offers.destroy', $offer) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta publicación? Esta acción no se puede deshacer.');">


                                            @csrf

                                            @method('DELETE')



                                            <button
                                                type="submit"
                                                class="rounded-lg bg-pink-200 px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-pink-300">

                                                Eliminar

                                            </button>


                                        </form>



                                    </div>


                                @endif



                            </div>



                        </div>



                    @endforeach



                </div>






                <!-- Sin resultados -->


                @if($offers->isEmpty())


                    <div class="py-16 text-center">


                        <div class="mb-4 text-5xl">
                            📭
                        </div>


                        <h3 class="mb-2 text-xl font-semibold text-slate-700">

                            No hay publicaciones disponibles

                        </h3>


                        <p class="mb-6 text-slate-500">

                            Sé el primero en crear una oportunidad.

                        </p>



                        <a href="{{ route('offers.create') }}"
                           class="rounded-xl bg-sky-300 px-6 py-3 font-medium text-slate-800 transition hover:bg-sky-400">

                            Crear publicación

                        </a>


                    </div>


                @endif




            </div>


        </div>


    </div>


</x-app-layout>

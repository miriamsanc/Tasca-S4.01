<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-200">
                💼
            </div>

            <div>

                <h2 class="text-2xl font-semibold text-slate-700">
                    Detalle de la publicación
                </h2>
        
            </div>

        </div>

    </x-slot>


    <div class="bg-slate-50 py-10">

        <div class="mx-auto max-w-5xl px-6">

            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">


                <div class="mb-8 flex flex-col gap-5 border-b border-slate-200 pb-6 md:flex-row md:items-start md:justify-between">

                    <div>

                        <h1 class="text-3xl font-bold text-slate-700">
                            {{ $offer->title }}
                        </h1>


                        <p class="mt-3 text-slate-500">

                            Publicado por:

                            <span class="font-semibold text-slate-700">
                                {{ $offer->user->name }}
                            </span>

                        </p>

                    </div>


                    <div class="flex flex-wrap gap-2">

                        @if($offer->type === 'buscando_practicas')

                            <span class="rounded-full bg-violet-100 px-4 py-2 text-sm font-medium text-violet-700">
                                Candidato buscando prácticas
                            </span>

                        @else

                            <span class="rounded-full bg-sky-100 px-4 py-2 text-sm font-medium text-sky-700">
                                Empresa ofreciendo prácticas
                            </span>

                        @endif


                        @if($offer->is_active)

                            <span class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-medium text-emerald-700">
                                🟢 Abierta
                            </span>

                        @else

                            <span class="rounded-full bg-pink-100 px-4 py-2 text-sm font-medium text-pink-700">
                                🔒 Cerrada
                            </span>

                        @endif


                    </div>

                </div>


                <div class="mb-8 grid gap-5 md:grid-cols-2">


                    <div class="rounded-2xl bg-sky-50 p-5">


                        <p class="mb-2 text-sm font-medium text-slate-500">
                            Categoría
                        </p>

                        <p class="text-lg font-semibold text-slate-700">
                            {{ $offer->category }}
                        </p>

                    </div>


                    <div class="rounded-2xl bg-violet-50 p-5">


                        <p class="mb-2 text-sm font-medium text-slate-500">
                            Ubicación
                        </p>

                        <p class="text-lg font-semibold text-slate-700">
                            {{ $offer->location }}
                        </p>


                    </div>


                </div>


                <div class="mb-8 rounded-2xl border border-slate-200 p-6">


                    <h3 class="mb-4 text-xl font-semibold text-slate-700">
                        Descripción
                    </h3>

                    <p class="whitespace-pre-line leading-relaxed text-slate-600">
                        {{ $offer->description }}
                    </p>


                </div>


                <div class="flex flex-col gap-5 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-between">


                    <a href="{{ route('offers.index', ['tab' => $offer->type]) }}"
                       class="text-slate-500 transition hover:text-slate-700">

                        ← Volver a ofertas

                    </a>

                    <div>

                        @auth

                            @if (Auth::id() !== $offer->user_id)


                                @php

                                    $isApplied = $offer->applications->contains('user_id', Auth::id());

                                @endphp


                                @if ($isApplied)


                                    <form action="{{ route('applications.destroy', $offer) }}"
                                          method="POST">


                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-xl bg-pink-300 px-6 py-3 font-medium text-slate-800 shadow-sm transition hover:bg-pink-400">

                                            Cancelar inscripción

                                        </button>


                                    </form>

                                @else

                                    <form action="{{ route('applications.store', $offer) }}"
                                          method="POST">


                                        @csrf

                                        <button
                                            type="submit"
                                            class="rounded-xl bg-sky-300 px-8 py-3 font-semibold text-slate-800 shadow-sm transition-all duration-300 hover:bg-sky-400 hover:shadow-md">

                                            Inscribirse 

                                        </button>

                                    </form>

                                @endif


                            @else

                                <div class="rounded-xl bg-slate-100 px-5 py-3 text-sm text-slate-600">

                                    Eres el creador de esta oferta

                                </div>


                            @endif


                        @else


                            <p class="rounded-xl bg-amber-100 px-5 py-3 text-sm text-amber-800">


                                Debes

                                <a href="{{ route('login') }}"
                                   class="font-bold underline">

                                    iniciar sesión

                                </a>

                                para inscribirte.


                            </p>


                        @endauth


                    </div>


                </div>


            </div>


        </div>

    </div>

</x-app-layout>

<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-200">
                👤
            </div>

            <div>

                <h2 class="text-2xl font-semibold text-slate-700">
                    Mi actividad
                </h2>

                <p class="text-sm text-slate-500">
                    Gestiona tus publicaciones y tus inscripciones.
                </p>

            </div>

        </div>

    </x-slot>


    <div class="bg-slate-50 py-10">

        <div class="mx-auto max-w-7xl px-6">


            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">



                <!-- Resumen -->

                <div class="mb-8 grid gap-4 md:grid-cols-2">


                    <div class="rounded-2xl bg-sky-100 p-5">

                        <div class="text-3xl font-bold text-slate-700">
                            {{ $createdOffers->count() }}
                        </div>

                        <p class="text-sm text-slate-600">
                            Publicaciones creadas
                        </p>

                    </div>



                    <div class="rounded-2xl bg-violet-100 p-5">

                        <div class="text-3xl font-bold text-slate-700">
                            {{ $applications->count() }}
                        </div>

                        <p class="text-sm text-slate-600">
                            Inscripciones realizadas
                        </p>

                    </div>


                </div>




                <!-- Tabs -->


                <div class="mb-8 flex rounded-2xl bg-slate-100 p-1">


                    <a href="{{ route('offers.my-offers', ['tab' => 'creadas']) }}"
                       class="rounded-xl px-5 py-3 text-sm font-medium transition
                       {{ $tab === 'creadas'
                            ? 'bg-sky-200 text-slate-800 shadow-sm'
                            : 'text-slate-500 hover:bg-white' }}">

                        💼 Ofertas publicadas
                        ({{ $createdOffers->count() }})

                    </a>




                    <a href="{{ route('offers.my-offers', ['tab' => 'inscripciones']) }}"
                       class="rounded-xl px-5 py-3 text-sm font-medium transition
                       {{ $tab === 'inscripciones'
                            ? 'bg-violet-200 text-slate-800 shadow-sm'
                            : 'text-slate-500 hover:bg-white' }}">

                        🎓 Mis inscripciones
                        ({{ $applications->count() }})

                    </a>



                </div>






                <!-- Publicaciones creadas -->


                @if ($tab === 'creadas')


                    @if($createdOffers->isEmpty())


                        <div class="py-14 text-center">

                            <div class="mb-4 text-5xl">
                                📭
                            </div>


                            <h3 class="mb-2 text-xl font-semibold text-slate-700">
                                No tienes publicaciones todavía
                            </h3>


                            <p class="mb-6 text-slate-500">
                                Crea una oferta para empezar a recibir candidatos.
                            </p>


                            <a href="{{ route('offers.create') }}"
                               class="rounded-xl bg-sky-300 px-6 py-3 font-medium text-slate-800 transition hover:bg-sky-400">

                                Crear publicación

                            </a>


                        </div>



                    @else



                        <div class="grid gap-5 md:grid-cols-2">


                            @foreach($createdOffers as $offer)


                                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">


                                    <div class="mb-4 flex justify-between gap-4">


                                        <a href="{{ route('offers.show', $offer) }}"
                                           class="text-xl font-bold text-slate-700 hover:text-sky-600">

                                            {{ $offer->title }}

                                        </a>



                                        @if($offer->is_active)

                                            <span class="h-fit rounded-full bg-emerald-100 px-3 py-1 text-xs font-medium text-emerald-700">
                                                Abierta
                                            </span>

                                        @else

                                            <span class="h-fit rounded-full bg-pink-100 px-3 py-1 text-xs font-medium text-pink-700">
                                                Cerrada
                                            </span>

                                        @endif


                                    </div>



                                    <div class="mb-5 text-sm text-slate-500">

                                        📅 Publicada el
                                        {{ $offer->created_at->format('d/m/Y') }}

                                    </div>




                                    <div class="flex justify-between border-t border-slate-200 pt-4">


                                        <a href="{{ route('offers.show', $offer) }}"
                                           class="font-medium text-sky-600 hover:text-sky-800">

                                            Ver oferta →

                                        </a>



                                        <a href="{{ route('offers.edit', $offer) }}"
                                           class="rounded-xl bg-violet-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-violet-300">

                                            Editar

                                        </a>



                                    </div>



                                </div>


                            @endforeach


                        </div>



                    @endif



                @endif







                <!-- Inscripciones -->


                @if ($tab === 'inscripciones')


                    @if($applications->isEmpty())


                        <div class="py-14 text-center">


                            <div class="mb-4 text-5xl">
                                🎓
                            </div>


                            <h3 class="mb-2 text-xl font-semibold text-slate-700">
                                No tienes inscripciones todavía
                            </h3>


                            <p class="text-slate-500">
                                Explora ofertas y solicita tus primeras prácticas.
                            </p>


                        </div>



                    @else



                        <div class="grid gap-5 md:grid-cols-2">


                            @foreach($applications as $application)



                                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">


                                    <a href="{{ route('offers.show', $application->offer) }}"
                                       class="text-xl font-bold text-slate-700 hover:text-violet-600">

                                        {{ $application->offer->title }}

                                    </a>



                                    <p class="mt-3 text-sm text-slate-500">

                                        📅 Inscrito el:

                                        {{ $application->created_at->format('d/m/Y') }}

                                    </p>




                                    <div class="mt-5 border-t border-slate-200 pt-4">


                                        <a href="{{ route('offers.show', $application->offer) }}"
                                           class="font-medium text-sky-600 hover:text-sky-800">

                                            Ver oferta →

                                        </a>


                                    </div>



                                </div>




                            @endforeach


                        </div>



                    @endif



                @endif



            </div>


        </div>


    </div>


</x-app-layout>

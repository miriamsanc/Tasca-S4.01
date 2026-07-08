<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="text-3xl font-bold text-slate-700">
                Hola, {{ Auth::user()->name }} 👋
            </h2>

            <p class="mt-2 text-slate-500">
                Gestiona tus prácticas, publicaciones y oportunidades profesionales.
            </p>

        </div>

    </x-slot>



    <div class="bg-slate-50 py-10">


        <div class="mx-auto max-w-7xl px-6">



            <!-- Tarjetas resumen -->


            <div class="mb-8 grid gap-6 md:grid-cols-3">



                <div class="rounded-2xl bg-sky-100 p-6 shadow-sm">

                    <div class="mb-3 text-4xl">
                        💼
                    </div>


                    <h3 class="text-lg font-semibold text-slate-700">
                        Mis publicaciones
                    </h3>


                    <p class="mt-2 text-sm text-slate-600">
                        Consulta y gestiona tus ofertas creadas.
                    </p>


                    <a href="{{ route('offers.my-offers') }}"
                       class="mt-5 inline-block rounded-xl bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">

                        Ver actividad →

                    </a>


                </div>





                <div class="rounded-2xl bg-violet-100 p-6 shadow-sm">


                    <div class="mb-3 text-4xl">
                        🎓
                    </div>


                    <h3 class="text-lg font-semibold text-slate-700">
                        Buscar prácticas
                    </h3>


                    <p class="mt-2 text-sm text-slate-600">
                        Explora nuevas oportunidades profesionales.
                    </p>


                    <a href="{{ route('offers.index') }}"
                       class="mt-5 inline-block rounded-xl bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">

                        Explorar ofertas →

                    </a>


                </div>





                <div class="rounded-2xl bg-emerald-100 p-6 shadow-sm">


                    <div class="mb-3 text-4xl">
                        🚀
                    </div>


                    <h3 class="text-lg font-semibold text-slate-700">
                        Publicar oportunidad
                    </h3>


                    <p class="mt-2 text-sm text-slate-600">
                        Crea una nueva oferta de prácticas.
                    </p>


                    <a href="{{ route('offers.create') }}"
                       class="mt-5 inline-block rounded-xl bg-white px-4 py-2 text-sm text-slate-700 shadow-sm transition hover:bg-slate-50">

                        Crear oferta →

                    </a>


                </div>



            </div>







            <!-- Bienvenida -->


            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">


                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">



                    <div>


                        <h3 class="text-2xl font-bold text-slate-700">
                            Tu espacio profesional
                        </h3>


                        <p class="mt-3 max-w-xl text-slate-500">

                            Desde aquí puedes encontrar prácticas,
                            gestionar tus publicaciones y conectar con empresas
                            o estudiantes.

                        </p>


                    </div>




                    <div class="rounded-2xl bg-amber-100 p-6 text-center">


                        <div class="text-4xl">
                            🌱
                        </div>


                        <p class="mt-2 text-sm font-medium text-slate-700">

                            Empieza a construir tu experiencia profesional

                        </p>


                    </div>



                </div>


            </div>



        </div>


    </div>


</x-app-layout>

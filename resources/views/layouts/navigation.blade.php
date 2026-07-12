<nav x-data="{ open: false }"
     class="sticky top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur-md">


    <div class="mx-auto max-w-7xl px-6">


        <div class="flex h-20 items-center justify-between">



            <!-- Logo + navegación -->


            <div class="flex items-center gap-10">


                <!-- Logo -->


                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3">


                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-200 text-xl">

                        🎓

                    </div>


                    <div class="hidden sm:block">

                        <div class="font-bold text-slate-700">
                            PractiHub
                        </div>

                        <div class="text-xs text-slate-500">
                            Tu primera experiencia profesional
                        </div>

                    </div>


                </a>


                <!-- Desktop links -->


                <div class="hidden items-center gap-2 sm:flex">


                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="rounded-xl px-4 py-2">

                        🏠 Dashboard

                    </x-nav-link>



                    <x-nav-link
                        :href="route('offers.index')"
                        :active="request()->routeIs('offers.index')"
                        class="rounded-xl px-4 py-2">

                        🔍 Explorar

                    </x-nav-link>


                    <x-nav-link
                        :href="route('offers.my-offers')"
                        :active="request()->routeIs('offers.my-offers')"
                        class="rounded-xl px-4 py-2">

                        💼 Mi actividad

                    </x-nav-link>


                </div>


            </div>


            <!-- Usuario -->


            <div class="hidden items-center sm:flex">


                <x-dropdown align="right" width="56">


                    <x-slot name="trigger">


                        <button
                            class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-600 shadow-sm transition hover:bg-slate-50">


                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-violet-200">

                                👤

                            </div>


                            <span>
                                {{ Auth::user()->name }}
                            </span>


                            <svg class="h-4 w-4 text-slate-400"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">

                                <path fill-rule="evenodd"
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                      clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">


                        <x-dropdown-link :href="route('profile.edit')">

                            ⚙️ Perfil

                        </x-dropdown-link>


                        <form method="POST" action="{{ route('logout') }}">

                            @csrf


                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                🚪 Cerrar sesión

                            </x-dropdown-link>


                        </form>


                    </x-slot>


                </x-dropdown>


            </div>

            <!-- Mobile button -->


            <div class="-me-2 flex items-center sm:hidden">


                <button
                    @click="open = ! open"
                    class="rounded-xl p-3 text-slate-500 transition hover:bg-slate-100">


                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">


                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>


                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>


                    </svg>


                </button>


            </div>



        </div>


    </div>


    <!-- Menú móvil -->


    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden border-t border-slate-200 bg-white sm:hidden">


        <div class="space-y-1 px-6 py-4">


            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                🏠 Dashboard

            </x-responsive-nav-link>



            <x-responsive-nav-link
                :href="route('offers.index')"
                :active="request()->routeIs('offers.index')">

                🔍 Explorar ofertas

            </x-responsive-nav-link>


            <x-responsive-nav-link
                :href="route('offers.my-offers')"
                :active="request()->routeIs('offers.my-offers')">

                💼 Mi actividad

            </x-responsive-nav-link>


        </div>

        <div class="border-t border-slate-200 px-6 py-4">


            <div>

                <div class="font-medium text-slate-700">

                    {{ Auth::user()->name }}

                </div>


                <div class="text-sm text-slate-500">

                    {{ Auth::user()->email }}

                </div>


            </div>


            <div class="mt-4 space-y-1">


                <x-responsive-nav-link :href="route('profile.edit')">

                    ⚙️ Perfil

                </x-responsive-nav-link>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf


                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">

                        🚪 Cerrar sesión

                    </x-responsive-nav-link>

                </form>


            </div>

        </div>

    </div>


</nav>

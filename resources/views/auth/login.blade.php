<x-guest-layout>

    <!-- Estado de la sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <x-input-label for="email" value="Correo electrónico" />

            <x-text-input
                id="email"
                class="mt-1 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />

            <x-text-input
                id="password"
                class="mt-1 block w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme -->
        <div class="mt-4 flex items-center">
            <input
                id="remember_me"
                type="checkbox"
                name="remember"
                class="rounded border-slate-300 text-sky-500 focus:ring-sky-400"
            >

            <label for="remember_me" class="ml-2 text-sm text-slate-600">
                Mantener la sesión iniciada
            </label>
        </div>

        <div class="mt-6 flex items-center justify-between">

            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-sky-600 hover:text-sky-700 hover:underline"
                >
                    ¿Has olvidado tu contraseña?
                </a>
            @endif

            <x-primary-button>
                Iniciar sesión
            </x-primary-button>

        </div>

      

    </form>

</x-guest-layout>

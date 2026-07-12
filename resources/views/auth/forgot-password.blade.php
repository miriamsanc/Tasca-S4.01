<x-guest-layout>

    <div class="mb-8 text-center">

        <h1 class="text-2xl font-semibold text-slate-700">
        Recuperar contraseña
        </h1>

        <p class="mt-2 text-slate-500">
            Introduce tu correo electrónico y te enviaremos un enlace para crear una nueva contraseña.
        </p>

    </div>

    <!-- Estado de la sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
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

        <div class="mt-6 flex justify-end">

            <x-primary-button>
                Enviar enlace
            </x-primary-button>

        </div>


    </form>

</x-guest-layout>

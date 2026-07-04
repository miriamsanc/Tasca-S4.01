<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nueva publicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('offers.store') }}">
                    @csrf <div class="mb-4">
                        
                        <div class="mt-2 flex space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="type" value="buscando_practicas" class="form-radio border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('type') == 'buscando_practicas' ? 'checked' : '' }} required>
                                <span class="ml-2 text-sm text-gray-600">Busco prácticas</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="ofreciendo_practicas" class="form-radio border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('type') == 'ofreciendo_practicas' ? 'checked' : '' }} required>
                                <span class="ml-2 text-sm text-gray-600">Ofrezco prácticas </span>
                            </label>
                        </div>
                        @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700">Título</label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Ej: Se ofrece puesto att cliente con idioma chino en aeropuerto bcn ..." required>
                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="category" class="block font-medium text-sm text-gray-700">Categoría</label>
                            <input id="category" type="text" name="category" value="{{ old('category') }}" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Ej: Turismo" required>
                            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="location" class="block font-medium text-sm text-gray-700">Ubicación</label>
                            <input id="location" type="text" name="location" value="{{ old('location') }}" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Ej: Barcelona" required>
                            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block font-medium text-sm text-gray-700">Descripción detallada</label>
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end border-t pt-4">
                        <a href="{{ route('offers.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Publicar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
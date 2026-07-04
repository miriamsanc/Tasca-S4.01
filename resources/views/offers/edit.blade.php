<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Publicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('offers.update', $offer) }}">
                    @csrf 
                    @method('PUT') <div class="mb-4">
                        
                        <div class="mt-2 flex space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="type" value="buscando_practicas" class="form-radio" {{ old('type', $offer->type) == 'buscando_practicas' ? 'checked' : '' }} required>
                                <span class="ml-2 text-sm text-gray-600">Busco prácticas</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="ofreciendo_practicas" class="form-radio" {{ old('type', $offer->type) == 'ofreciendo_practicas' ? 'checked' : '' }} required>
                                <span class="ml-2 text-sm text-gray-600">Ofrezco prácticas (Empresa)</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700">Título</label>
                        <input id="title" type="text" name="title" value="{{ old('title', $offer->title) }}" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="category" class="block font-medium text-sm text-gray-700">Categoría</label>
                            <input id="category" type="text" name="category" value="{{ old('category', $offer->category) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label for="location" class="block font-medium text-sm text-gray-700">Ubicación</label>
                            <input id="location" type="text" name="location" value="{{ old('location', $offer->location) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block font-medium text-sm text-gray-700">Descripción detallada</label>
                        <textarea id="description" name="description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $offer->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Estado de la publicación</label>
                        <div class="mt-2 flex space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="is_active" value="1" class="form-radio border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('is_active', $offer->is_active) == 1 ? 'checked' : '' }} required>
                                <span class="ml-2 text-sm text-gray-600">Abierta</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="is_active" value="0" class="form-radio border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('is_active', $offer->is_active) == 0 ? 'checked' : '' }} required>
                                <span class="ml-2 text-sm text-gray-600">Cerrada</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-end border-t pt-4">
                        <a href="{{ route('offers.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">Cancelar</a>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Actualizar Publicación
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
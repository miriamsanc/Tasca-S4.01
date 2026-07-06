<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Ofertas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                    <nav class="-mb-px flex space-x-8 overflow-x-auto" aria-label="Tabs">
                        <a href="{{ route('offers.index', ['tab' => 'ofreciendo_practicas']) }}"
                            class="{{ $activeTab === 'ofreciendo_practicas' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Empresas ofreciendo prácticas
                        </a>

                        <a href="{{ route('offers.index', ['tab' => 'buscando_practicas']) }}"
                            class="{{ $activeTab === 'buscando_practicas' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Candidatos buscando prácticas
                        </a>
                    </nav>

                    <div class="mt-4 sm:mt-0 pb-4 sm:pb-0">
                        <a href="{{ route('offers.create') }}" class="inline-flex items-center justify-center bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 text-sm font-medium transition-colors">
                             Nueva Publicación
                        </a>
                    </div>
                </div>
                
                <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <form action="{{ route('offers.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                        
                        <input type="hidden" name="tab" value="{{ $activeTab }}">

                        <div class="flex-1">
                            <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <input type="text" name="category" id="category" value="{{ request('category') }}" placeholder="Ej. Programación, turismo..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        
                        <div class="flex-1">
                            <label for="location" class="block text-sm font-medium text-gray-700">Ubicación</label>
                            <input type="text" name="location" id="location" value="{{ request('location') }}" placeholder="Ej. Barcelona, Madrid..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>

                        <div class="flex items-end gap-2 mt-4 md:mt-0">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm font-medium transition-colors shadow-sm">
                                Buscar
                            </button>
                            <a href="{{ route('offers.index', ['tab' => $activeTab]) }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors shadow-sm">
                                Limpiar
                            </a>
                        </div>
                    </form>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($offers as $offer)
                        <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <h4 class="font-bold text-xl">{{ $offer->title }}</h4>
                            <p class="text-sm text-gray-500 mb-1">
                                👤 Publicado por: <span class="font-medium text-gray-700">{{ $offer->user->name }}</span>
                            </p>
                            <p class="text-gray-600 mb-2">{{ $offer->category }} - {{ $offer->location }}</p>
                            
                            <div class="mt-4 flex items-center justify-between border-t pt-4">
                                <a href="{{ route('offers.show', $offer) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">
                                    Ver detalles &rarr;
                                </a>

                                @if(auth()->check() && auth()->id() === $offer->user_id)
                                    <div class="flex space-x-2">
                                        <a href="{{ route('offers.edit', $offer) }}" class="text-sm bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition-colors">
                                            Editar
                                        </a>
            
                                        <form action="{{ route('offers.destroy', $offer) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta publicación? Esta acción no se puede deshacer.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($offers->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">
                            No hay ofertas publicadas en estos momentos.
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

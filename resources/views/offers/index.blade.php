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
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($offers as $offer)
                        <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <h4 class="font-bold text-xl">{{ $offer->title }}</h4>
                            <p class="text-gray-600 mb-2">{{ $offer->category }} - {{ $offer->location }}</p>
                            
                            <div class="mt-4">
                                <a href="{{ route('offers.show', $offer) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">
                                    Ver detalles &rarr;
                                </a>
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

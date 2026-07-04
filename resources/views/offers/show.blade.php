<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $offer->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6">
                    
                    <span class="inline-block px-3 py-1 bg-gray-200 text-gray-800 text-sm font-bold rounded-full">
                        {{ $offer->type === 'buscando_practicas' ? 'Candidato buscando prácticas' : 'Empresa ofreciendo prácticas' }}
                    </span>
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-sm font-bold rounded-full ml-2">
                        Estado: {{ $offer->is_active ? 'Abierta' : 'Cerrada' }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="font-bold text-gray-700">Categoría</h3>
                        <p>{{ $offer->category }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-700">Ubicación</h3>
                        <p>{{ $offer->location }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="font-bold text-gray-700 mb-2">Descripción</h3>
                    <p class="text-gray-600 whitespace-pre-line">{{ $offer->description }}</p>
                </div>

                <div class="flex items-center justify-between border-t pt-4">
                    
                    <a href="{{ route('offers.index', ['tab' => $offer->type]) }}" class="text-gray-500 hover:text-gray-700">
                        &larr; Volver a la lista de ofertas
                    </a>
                                    
                    <button class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 opacity-50 cursor-not-allowed" title="">
                        Inscribirse
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
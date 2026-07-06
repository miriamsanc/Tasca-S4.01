<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mi Actividad
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <a href="{{ route('offers.my-offers', ['tab' => 'creadas']) }}" 
                           class="{{ $tab === 'creadas' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Ofertas Publicadas ({{ $createdOffers->count() }})
                        </a>
                        <a href="{{ route('offers.my-offers', ['tab' => 'inscripciones']) }}" 
                           class="{{ $tab === 'inscripciones' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Mis Inscripciones ({{ $applications->count() }})
                        </a>
                    </nav>
                </div>

                @if ($tab === 'creadas')
                    <div>
                        @if($createdOffers->isEmpty())
                            <p class="text-gray-500">No has publicado ninguna oferta todavía.</p>
                        @else
                            <ul class="divide-y divide-gray-200">
                                @foreach($createdOffers as $offer)
                                    <li class="py-4 flex justify-between items-center">
                                        <div>
                                            <a href="{{ route('offers.show', $offer) }}" class="text-lg font-bold text-blue-600 hover:underline">
                                                {{ $offer->title }}
                                            </a>
                                            <p class="text-sm text-gray-500">{{ $offer->created_at->format('d/m/Y') }} - Estado: {{ $offer->is_active ? 'Abierta' : 'Cerrada' }}</p>
                                        </div>
                                        <a href="{{ route('offers.edit', $offer) }}" class="text-sm bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded">Editar</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif

                @if ($tab === 'inscripciones')
                    <div>
                        @if($applications->isEmpty())
                            <p class="text-gray-500">No te has inscrito a ninguna oferta todavía.</p>
                        @else
                            <ul class="divide-y divide-gray-200">
                                @foreach($applications as $application)
                                    <li class="py-4">
                                        <a href="{{ route('offers.show', $application->offer) }}" class="text-lg font-bold text-blue-600 hover:underline">
                                            {{ $application->offer->title }}
                                        </a>
                                        <p class="text-sm text-gray-500">Te has inscrito el: {{ $application->created_at->format('d/m/Y') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
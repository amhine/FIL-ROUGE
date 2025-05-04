
@extends('layouts.hebergeur')

@section('title', 'Mes Hébergements')

@section('content')

    <div class="flex justify-end mb-8">
        <a href="{{ route('hebergeur.hebergement.ajouter') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 shadow-md">
            Ajouter une annonce
        </a>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @if($hotels->count() > 0)
            @foreach($hotels as $hotel)
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transform transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <img src="{{ $hotel->image }}" alt="Image de l'hôtel" class="w-full h-56 object-cover">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow">
                            {{ $hotel->prix_nuit }} DH/nuit
                        </div>
                        <div class="absolute bottom-4 left-4 bg-green-500 text-white px-4 py-1.5 rounded-full text-xs font-semibold shadow">
                            {{ $hotel->disponibilite }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $hotel->nom_hotel }}</h3>
                        <div class="flex items-center text-gray-600 mb-3">
                            <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                            <span class="text-sm">{{ $hotel->adress }}, {{ $hotel->ville }}</span>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm line-clamp-3">
                            {{ $hotel->description }}
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <i class="fas fa-bed mr-1.5 text-red-600"></i>
                                    <span class="text-sm">{{ $hotel->nombre_chambre }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bath mr-1.5 text-red-600"></i>
                                    <span class="text-sm">{{ $hotel->nombre_salle_debain }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-t pt-4">
                            <div class="flex justify-around">
                                @foreach($hotel->equipements as $equip)
                                    <div class="text-center">
                                        <i class="fas fa-{{ $equip->image }} text-green-600 text-lg mb-1"></i>
                                        <p class="text-xs text-gray-600">{{ $equip->nom_equipe }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-nowrap space-x-4 mt-6">
                            <a href="{{ route('hebergeur.hebergement.edit', $hotel->id) }}" 
                               class="flex-1 text-center bg-gradient-to-r from-blue-600 to-blue-500 text-white py-2.5 rounded-lg font-medium hover:from-blue-700 hover:to-blue-600 transition duration-300 shadow-sm">
                                Modifier
                            </a>
                            <form action="{{ route('hebergeur.hebergement.delete', $hotel->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-red-600 to-red-500 text-white py-2.5 rounded-lg font-medium hover:from-red-700 hover:to-red-600 transition duration-300 shadow-sm">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-xl font-medium">Aucune annonce disponible.</p>
            </div>
        @endif
    </div>
@endsection
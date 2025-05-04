@extends('layouts.hebergeur')

@section('title', 'Détails Hôtel')

@section('content')
    <div class="relative bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 max-w-2xl mx-auto">
        <div class="relative">
            <img src="{{ $hotel->image }}" alt="Image de l'hôtel" class="w-full h-64 object-cover">
            <a href="{{ route('hebergeur.statistiques') }}" class="absolute top-4 right-4 text-red-600 hover:text-red-800 transition-colors">
                <i class="fa-solid fa-x fa-lg"></i>
            </a>
            <div class="absolute top-4 right-16 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                {{ $hotel->prix_nuit }} DH/nuit
            </div>
            <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                {{ $hotel->disponibilite }}
            </div>
        </div>
        <div class="p-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $hotel->nom_hotel }}</h3>
            <div class="flex items-center text-gray-600 mb-3">
                <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                <span>{{ $hotel->adress }}, {{ $hotel->ville }}</span>
            </div>
            <p class="text-gray-600 mb-4 text-sm">
                {{ $hotel->description }}
            </p>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <i class="fas fa-bed mr-1 text-red-600"></i>
                        <span>{{ $hotel->nombre_chambre }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bath mr-1 text-red-600"></i>
                        <span>{{ $hotel->nombre_salle_debain }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t pt-4">
                <div class="flex justify-around">
                    @if($hotel->equipements->isEmpty())
                        <p class="text-gray-500 text-sm">Aucun équipement disponible.</p>
                    @else
                        @foreach($hotel->equipements as $equip)
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-{{ $equip->image }} text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">{{ $equip->nom_equipe }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
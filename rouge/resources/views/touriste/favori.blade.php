@extends('layouts.touriste')

@section('title', 'Accueil')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-6 lg:px-8 pt-20">
        @if($hotels->count() > 0)
            @foreach($hotels as $hotel)
        
        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="relative">
                <img src="{{ ( $hotel->image) }}" alt="Appartement avec vue" class="w-full h-48 object-cover">
                <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                    {{ ( $hotel->prix_nuit) }} DH/nuit
                </div>
                <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                    {{ ( $hotel->disponibilite) }}
                </div>

                <form action="{{ route('favoris.hotel', $hotel->id) }}" method="POST" class="absolute top-4 left-4">
                    @csrf
                    <button type="submit" class="favorite-btn text-white bg-gray-800 bg-opacity-60 p-2 rounded-full hover:bg-red-500 transition">
                        <i class="fas fa-heart {{ $hotel->isFavorited() ? 'text-red-500' : 'text-white' }}"></i>
                    </button>
                </form>
                
            </div>
            
            <div class="p-5">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ ( $hotel->nom_hotel) }}</h3>
                <div class="flex items-center text-gray-600 mb-2">
                    <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                    <span>{{ ( $hotel->adress) }}, {{ ( $hotel->ville) }}</span>
                </div>
                
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ ( $hotel->description) }} 
                </p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="flex items-center mr-4">
                            <i class="fas fa-bed mr-1 text-red-600"></i>
                            <span>{{ ( $hotel->nombre_chambre) }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bath mr-1 text-red-600"></i>
                            <span>{{ ( $hotel->nombre_salle_debain) }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="border-t pt-4">
                    <div class="flex justify-around">
                        @foreach($hotel->equipements as $equip)

                        <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                            <i class="fas fa-{{ $equip->image }} text-green-600 text-xl mb-1"></i>
                            <p class="text-xs">{{ $equip->nom_equipe }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <button class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300 transform hover:scale-105 ">
                  Réserver
              </button>
            </div>
        </div>
        @endforeach
        @else
            <div class="col-span-4 text-center py-10">
                <p class="text-gray-500 text-xl">Aucune Hotel en  favoris.</p>
            </div>
        @endif
        
    </div>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 p-4">
        @if($restaurants->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($restaurants as $resteaux)
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $resteaux->image }}" alt="Restaurant" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                        {{ $resteaux->prix }} DH/nuit
                    </div>
                    <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        {{ $resteaux->type_cuisine }}
                    </div>
                    <form action="{{ route('favoris.restaurant', $resteaux->id) }}" method="POST" class="absolute top-4 left-4">
                        @csrf
                        <button type="submit" class="favorite-btn text-white bg-gray-800 bg-opacity-60 p-2 rounded-full hover:bg-red-500 transition">
                            <i class="fas fa-heart {{ $resteaux->isFavorited() ? 'text-red-500' : 'text-white' }}"></i>
                        </button>
                    </form>
                    

              
                </div>
                <div class="p-6 flex-grow">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $resteaux->nom_resteau }}</h3>
                    <div class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                        <span>{{ $resteaux->localisation }}</span>
                    </div>
                    <p class="text-gray-600 mb-4">{{ $resteaux->description }}</p>
                    <button class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300 transform hover:scale-105">
                        Réserver
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        
        @else
        <div class="text-center py-10">
            <p class="text-gray-500 text-xl">Aucune Restaurant en  favoris</p>
        </div>
        @endif
    </section>
   @endsection
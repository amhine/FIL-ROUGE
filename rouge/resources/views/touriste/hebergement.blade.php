@extends('layouts.touriste')

@section('title', 'Hotel')

@section('content')

     
    <section id="hebergements" class="pt-[76px] bg-gray-50">
        <div class="max-w-full mx-auto">
            <div class="relative h-[550px] overflow-hidden">
                <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_events_slider/public/thumbnails/image/hebergement_0.jpg?itok=zcq4oX1X" 
                    alt="Moroccan accommodation experience" 
                    class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-105"/>
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
                
                <!-- Hero Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">
                        Un Hébergement pour Toutes les Envies et Tous les Budgets
                    </h1>
                    <p class="text-lg md:text-xl max-w-2xl mx-auto animate-fade-in-delay">
                        Découvrez les meilleures options d'hébergement au Maroc pour la Coupe du Monde 2030.
                    </p>
                </div>
            </div>
        </div>
    </section>

        
        <section class="max-w-7xl mx-auto px-4 py-10">
            <form class="flex flex-col md:flex-row items-center gap-4 bg-white p-6 rounded-xl shadow-md" method="GET" action="{{ route('hotel') }}" ">
                
                <div class="relative w-full md:flex-1">
                    <input type="text" name="nom_hotel" placeholder="Nom d'hotel" class="w-full pl-12 py-3 px-4 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C02626] focus:border-transparent transition">
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                </div>
                <div class="relative w-full md:flex-1">
                    <input  type="date" name="disponibilite"  placeholder="Type du restaurant"  class="w-full pl-12 py-3 px-4 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C02626] focus:border-transparent transition">
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                </div>
        
               
                <button 
                    type="submit" 
                    class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-[#A42020] transition duration-300 transform hover:scale-105">
                    Rechercher
                </button>
            </form>
        </section>

        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-6 lg:px-8">
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
                    
                    <form action="{{ route('reservations.hotel.create', $hotel->id) }}" method="GET">
                        <button type="submit" class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300 transform hover:scale-105">
                            Réserver
                        </button>
                    </form>
                    
                </div>
            </div>
            @endforeach
            @else
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-xl">Aucune annonce disponible.</p>
                </div>
            @endif
            
        </div>

        
        <div class="flex justify-center mt-8 space-x-2 pb-4">
            
            @if ($hotels->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg">Précédent</span>
            @else
                <a href="{{  $hotels->previousPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-red-700 transition duration-300">Précédent</a>
            @endif
        
            
            @foreach ($hotels->getUrlRange(1, $hotels->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="px-4 py-2 {{ $hotels->currentPage() == $page ? 'bg-red-700 font-bold' : 'bg-green-600' }} text-white rounded-lg hover:bg-red-700 transition duration-300">
                    {{ $page }}
                </a>
            @endforeach
        
           
            @if ($hotels->hasMorePages())
                <a href="{{ $hotels->nextPageUrl() }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-red-700 transition duration-300">Suivant</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg">Suivant</span>
            @endif
        </div>
      

@endsection

<style>
    .animate-fade-in {
        animation: fadeIn 1s ease-in-out;
    }
    .animate-fade-in-delay {
        animation: fadeIn 1s ease-in-out 0.3s;
        animation-fill-mode: both;
    }
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
    



        


  


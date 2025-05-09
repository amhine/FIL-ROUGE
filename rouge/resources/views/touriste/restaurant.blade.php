@extends('layouts.touriste')

@section('title', 'Restaurants')

@section('content')
    <!-- Hero Section -->
    <section id="restaurants" class="pt-[76px] bg-gray-50">
        <div class="max-w-full mx-auto ">
            <div class="relative h-[550px]  overflow-hidden ">
                <img src="https://www.visitmorocco.com/sites/default/files/styles/thumbnail_events_slider/public/thumbnails/image/se-nourrir-au-maroc_1.jpg?itok=MoCChSDy" 
                     alt="Moroccan culinary experience" 
                     class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-105"/>
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
                
                <!-- Hero Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">
                        Découvrez les Saveurs du Maroc
                    </h1>
                    <p class="text-lg md:text-xl max-w-2xl mx-auto animate-fade-in-delay">
                        Explorez les meilleurs restaurants proposant une cuisine marocaine authentique pendant la Coupe du Monde 2030.
                    </p>
                </div>
                
            </div>

            
        </div>
    </section>

    <!-- Search Form Section -->
    <section class="max-w-7xl mx-auto px-4 py-10">
        <form class="flex flex-col md:flex-row items-center gap-4 bg-white p-6 rounded-xl shadow-lg" 
              method="GET" 
              action="{{ route('restaurants.search') }}">
            <div class="relative w-full md:flex-1">
                <input type="text" 
                       name="nom_resteau" 
                       placeholder="Nom du restaurant" 
                       class="w-full pl-12 py-3 px-4 text-gray-700 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none" 
                     fill="none" 
                     stroke="currentColor" 
                     stroke-width="2" 
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <div class="relative w-full md:flex-1">
                <input type="text" 
                       name="type_cuisine" 
                       placeholder="Type de cuisine" 
                       class="w-full pl-12 py-3 px-4 text-gray-700 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none" 
                     fill="none" 
                     stroke="currentColor" 
                     stroke-width="2" 
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <div class="relative w-full md:flex-1">
                <input type="text" 
                       name="localisation" 
                       placeholder="Localisation" 
                       class="w-full pl-12 py-3 px-4 text-gray-700 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-300">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none" 
                     fill="none" 
                     stroke="currentColor" 
                     stroke-width="2" 
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <button type="submit" 
                    class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300 transform hover:scale-105">
                Rechercher
            </button>
        </form>
    </section>

    <!-- Restaurant Listings Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4">
        @if($resteau->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($resteau as $resteaux)
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col transition-transform duration-300 hover:scale-105">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $resteaux->image }}" 
                                 alt="Restaurant" 
                                 class="w-full h-full object-cover transform transition-transform duration-300 hover:scale-110">
                            <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                {{ $resteaux->prix }} DH
                            </div>
                            <div class="absolute bottom-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                Type : {{ $resteaux->type_cuisine }}
                            </div>
                            <form action="{{ route('favoris.restaurant', $resteaux->id) }}" 
                                  method="POST" 
                                  class="absolute top-4 left-4">
                                @csrf
                                <button type="submit" 
                                        class="favorite-btn text-white bg-gray-800 bg-opacity-60 p-2 rounded-full hover:bg-red-500 transition">
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
                            <form action="{{ route('reservations.resteau.create', $resteaux->id) }}" 
                                  method="GET">
                                <button class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:bg-red-700 transition duration-300 transform hover:scale-105">
                                    Réserver
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500 text-xl">Aucune annonce disponible.</p>
            </div>
        @endif
    </section>

    <!-- Pagination -->
    <div class="flex justify-center mt-8 space-x-2 pb-4">
        @if ($resteau->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg">Précédent</span>
        @else
            <a href="{{ $resteau->previousPageUrl() }}" 
               class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                Précédent
            </a>
        @endif

        @foreach ($resteau->getUrlRange(1, $resteau->lastPage()) as $page => $url)
            <a href="{{ $url }}" 
               class="px-4 py-2 {{ $resteau->currentPage() == $page ? 'bg-red-700 font-bold' : 'bg-red-600' }} text-white rounded-lg hover:bg-red-700 transition duration-300">
                {{ $page }}
            </a>
        @endforeach

        @if ($resteau->hasMorePages())
            <a href="{{ $resteau->nextPageUrl() }}" 
               class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                Suivant
            </a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg">Suivant</span>
        @endif
    </div>
@endsection

<!-- Custom CSS for Animations -->
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
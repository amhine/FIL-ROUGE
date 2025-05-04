@extends('layouts.resteaurateur')

@section('title', 'Mes Restaurants')

@section('content')
    <div class="flex justify-end mb-8">
        <a href="{{ route('resteau.resteaurant.ajouter') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 shadow-md">
            Ajouter une annonce
        </a>
    </div>

    <section class="max-w-7xl mx-auto">
        @if($resteau->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($resteau as $restaurant)
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $restaurant->image }}" alt="Restaurant" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                {{ $restaurant->prix }} DH
                            </div>
                            <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                Type : {{ $restaurant->type_cuisine }}
                            </div>
                           
                        </div>
                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $restaurant->nom_restaurant }}</h3>
                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                                <span>{{ $restaurant->localisation }}</span>
                            </div>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $restaurant->description }}</p>
                            <div class="flex flex-nowrap space-x-4 mt-6">
                                <a href="{{ route('resteau.resteaurant.edit', $restaurant->id) }}" 
                                   class="flex-1 text-center bg-gradient-to-r from-blue-600 to-blue-500 text-white py-2.5 rounded-lg font-medium hover:from-blue-700 hover:to-blue-600 transition duration-300 shadow-sm">
                                    Modifier
                                </a>
                                <form action="{{ route('resteau.resteaurant.delete', $restaurant->id) }}" method="POST" class="flex-1">
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
            </div>
        @else
            <div class="text-center py-10">
                <p class="text-gray-500 text-xl">Aucune annonce disponible.</p>
            </div>
        @endif
    </section>
@endsection
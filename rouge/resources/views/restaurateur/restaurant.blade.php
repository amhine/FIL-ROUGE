<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maroc </title>
   <script src="https://cdn.tailwindcss.com"></script>
    
 
</head>
<body class="bg-gray-50">
    <!-- Nav -->
    <nav id="navbar" class="fixed w-full bg-[#C02626] text-white transition-all duration-300 z-50">
        <div class="container mx-auto py-4 flex items-center justify-between">
           
            <div class="flex items-center">
                <span class="font-bold text-xl">StayMorocco</span>
            </div>
            
            <!-- Desktop Menu  -->
            <div class="hidden md:flex items-center justify-center flex-grow">
                <ul class="flex space-x-8">
                    <li><a href="#hebergements" class="">Mes Restaurant</a></li>
                    <li><a href="#trajets" class="">Statistic</a></li>
                </ul>
            </div>
            
            
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center space-x-4">
                <button class="flex flex-col space-y-1" id="mobile-menu-button">
                    <span class="w-6 h-0.5 bg-white"></span>
                    <span class="w-6 h-0.5 bg-white"></span>
                    <span class="w-6 h-0.5 bg-white"></span>
                </button>
            </div>
        </div>
    
        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="#hebergements" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Mes Restaurant</a></li>
                <li><a href="#restaurants" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Statistic</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto px-6 pt-24 pb-12">
        <!-- Bouton Ajouter une annonce -->
        <div class="flex justify-end mb-8">
            <a href="{{ route('resteau.resteaurant.ajouter') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 shadow-md">
                Ajouter une annonce
            </a>
        </div>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4">
            @if($resteau->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($resteau as $resteaux)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $resteaux->image }}" alt="Restaurant" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            {{ $resteaux->prix }} DH
                        </div>
                        <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            Type : {{ $resteaux->type_cuisine }}
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
        
                        <div class="flex flex-nowrap space-x-4 mt-6">
                            <a href="{{ route('resteau.resteaurant.edit', $resteaux->id) }}" 
                            class="flex-1 text-center bg-gradient-to-r from-blue-600 to-blue-500 text-white py-2.5 rounded-lg font-medium hover:from-blue-700 hover:to-blue-600 transition duration-300 shadow-sm">
                                Modifier
                            </a>

                            <form action="{{ route('resteau.resteaurant.delete', $resteaux->id) }}" method="POST"
                                class="flex-1">
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
    </div>



</body>
</html>
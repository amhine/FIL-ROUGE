<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maroc </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                    <li><a href="#accueil" class="">Accueil</a></li>
                    <li><a href="#stades" class="">Stades</a></li>
                    <li><a href="#hebergements" class="">Hébergements</a></li>
                    <li><a href="#restaurants" class="">Restaurants</a></li>
                    <li><a href="#restaurants" class="">Favoris</a></li>
                    <li><a href="#trajets" class="">Trajets</a></li>
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
                <li><a href="#accueil" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Accueil</a></li>
                <li><a href="#equipes" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Équipes</a></li>
                <li><a href="#stades" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Stades</a></li>
                <li><a href="#hebergements" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Hébergements</a></li>
                <li><a href="#restaurants" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Restaurants</a></li>
                <li><a href="#trajets" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Trajets</a></li>
                <li><a href="#inscrire" class="block py-2 hover:text-morocco-gold transition-colors duration-300">S'inscrire</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto px-6 pt-24 pb-12">
        <!-- Bouton Ajouter une annonce -->
        <div class="flex justify-end mb-8">
            <a href="{{ route('hebergeur.hebergement.ajouter') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 shadow-md">
                Ajouter une annonce
            </a>
        </div>

        <!-- Grille d'annonces -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @if($hotels->count() > 0)
                @foreach($hotels as $hotel)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transform transition-all duration-300 hotel-card fade-in">
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

                                <form action="{{ route('hebergeur.hebergement.delete', $hotel->id) }}" method="POST"
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
            @else
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-xl font-medium">Aucune annonce disponible.</p>
                </div>
            @endif
        </div>
    </div>



</body>
</html>
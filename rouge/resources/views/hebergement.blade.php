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
                    <li><a href="#trajets" class="">Trajets</a></li>
                </ul>
            </div>
            
            <!-- Buttons -->
            <div class="flex space-x-4">
                <a href="#connexion" class="bg-white text-[#C02626] px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition-colors duration-300">Connexion</a>
                <a href="#inscrire" class="bg-[#C02626] text-white px-4 py-2 rounded-full border border-white font-medium hover:bg-[#A42020] transition-colors duration-300">S'inscrire</a>
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

     <!-- Hero Image -->
     <section id="accueil" class=" w-full min-h-screen pt-16">
        
        <div class="relative w-full h-full">
        <img src="{{ asset('images/hero-heberg.png') }}" alt="Équipe nationale du Maroc" class="w-full h-full object-cover" />
        </div>
        
        
    </section>

    <div class="container mx-auto px-4 py-8">
        <!-- Barre de Recherche -->
        <form action="#" method="GET" class="mb-8 bg-white rounded-lg shadow-md p-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex flex-wrap gap-2">
                    <input type="text" name="ville" placeholder="Rechercher par ville" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-60">
                    <input type="date" name="disponibilite" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div>
                    <button type="submit" class="bg-green-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition duration-300 flex items-center">
                        <i class="fas fa-search mr-2"></i> Rechercher
                    </button>
                </div>
            </div>
        </form>

        <!-- Grille d'annonces -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Annonce 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1080&q=80" alt="Appartement avec vue" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                        850 DH/nuit
                    </div>
                    <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Disponible
                    </div>
                    <button type="button" class="absolute top-4 left-4 text-white bg-gray-800 bg-opacity-60 p-2 rounded-full hover:bg-red-500 transition duration-300">
                        <i class="fas fa-heart text-white"></i>
                    </button>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Appartement moderne avec vue sur mer</h3>
                    <div class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                        <span>Ave Mohammed V, Tanger</span>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Magnifique appartement récemment rénové avec vue imprenable sur la mer. Situé dans un quartier calme et proche de toutes commodités.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="flex items-center mr-4">
                                <i class="fas fa-bed mr-1 text-red-600"></i>
                                <span>2</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-bath mr-1 text-red-600"></i>
                                <span>1</span>
                            </div>
                        </div>
                    </div>
                    <!-- Équipements -->
                    <div class="border-t pt-4">
                        <div class="flex justify-around">
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-wifi text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Wifi</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-snowflake text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Climatisation</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-tv text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">TV</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-utensils text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Cuisine</p>
                            </div>
                        </div>
                    </div>
                    <!-- Bouton Réserver -->
                    <button class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300 transform hover:scale-105 ">
                      Réserver
                  </button>
                </div>
            </div>
            
            <!-- Annonce 2 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1080&q=80" alt="Villa de luxe" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                        1200 DH/nuit
                    </div>
                    <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Disponible
                    </div>
                    <button type="button" class="absolute top-4 left-4 text-white bg-gray-800 bg-opacity-60 p-2 rounded-full hover:bg-red-500 transition duration-300">
                        <i class="fas fa-heart text-white"></i>
                    </button>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Villa de luxe avec piscine privée</h3>
                    <div class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                        <span>Route de Rabat, Casablanca</span>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Superbe villa moderne avec piscine privée et jardin, idéale pour des vacances en famille ou entre amis. Quartier sécurisé et calme.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="flex items-center mr-4">
                                <i class="fas fa-bed mr-1 text-red-600"></i>
                                <span>4</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-bath mr-1 text-red-600"></i>
                                <span>3</span>
                            </div>
                        </div>
                    </div>
                    <!-- Équipements -->
                    <div class="border-t pt-4">
                        <div class="flex justify-around">
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-wifi text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Wifi</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-swimming-pool text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Piscine</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-parking text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Parking</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-leaf text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Jardin</p>
                            </div>
                        </div>
                    </div>
                    <!-- Bouton Réserver -->
                    <button class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300 transform hover:scale-105 ">
                      Réserver
                  </button>
                </div>
            </div>
            
            <!-- Annonce 3 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1080&q=80" alt="Studio moderne" class="w-full h-48 object-cover">
                    <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                        500 DH/nuit
                    </div>
                    <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                        Disponible
                    </div>
                    <button type="button" class="absolute top-4 left-4 text-white bg-gray-800 bg-opacity-60 p-2 rounded-full hover:bg-red-500 transition duration-300">
                        <i class="fas fa-heart text-white"></i>
                    </button>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Studio confortable en centre-ville</h3>
                    <div class="flex items-center text-gray-600 mb-2">
                        <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                        <span>Rue Moulay Ismail, Marrakech</span>
                    </div>
                    <!-- Description -->
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        Studio moderne et fonctionnel situé en plein centre-ville, à deux pas des sites touristiques et des commerces. Parfait pour un séjour urbain.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="flex items-center mr-4">
                                <i class="fas fa-bed mr-1 text-red-600"></i>
                                <span>1</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-bath mr-1 text-red-600"></i>
                                <span>1</span>
                            </div>
                        </div>
                    </div>
                    <!-- Équipements -->
                    <div class="border-t pt-4">
                        <div class="flex justify-around">
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-wifi text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Wifi</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-snowflake text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Climatisation</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-coffee text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">Cafetière</p>
                            </div>
                            <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                                <i class="fas fa-tv text-green-600 text-xl mb-1"></i>
                                <p class="text-xs">TV</p>
                            </div>
                        </div>
                    </div>
                    <!-- Bouton Réserver -->
                    <button class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300 transform hover:scale-105 ">
                      Réserver
                  </button>
                </div>
            </div>
        </div>


  


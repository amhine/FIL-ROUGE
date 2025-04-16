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
                    <input type="text" name="ville" placeholder="Rechercher par ville" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 w-60">
                    <input type="date" name="disponibilite" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div>
                    <button type="submit" class="bg-green-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition duration-300 flex items-center">
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

            <!-- Pagination -->
            <div class="flex justify-center mt-8 space-x-2">
                <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg">Précédent</span>
                
                <a href="#" class="px-4 py-2 bg-red-700 text-white font-bold rounded-lg">1</a>
                <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-red-700 transition duration-300">2</a>
                <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-red-700 transition duration-300">3</a>
                
                <a href="#" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-red-700 transition duration-300">Suivant</a>
            </div>
        </div>

        <!-- Footer -->
     <footer class="bg-[#c92424] text-white py-16">
        <div class="container mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-y-10 mb-16">
                
                <div class="flex justify-center md:justify-start">
                    <h2 class="font-bold text-xl w-fit mx-auto">StayMorocco</h2>
                </div>
    
                <div class="text-center md:text-left">
                    <h3 class="font-semibold text-lg mb-6">Informations</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="hover:underline">À propos</a></li>
                        <li><a href="#" class="hover:underline">Actualités</a></li>
                        <li><a href="#" class="hover:underline">Contact</a></li>
                    </ul>
                </div>
    
                <div class="text-center md:text-left">
                    <h3 class="font-semibold text-lg mb-6">Liens utiles</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="hover:underline">Calendrier des matchs</a></li>
                        <li><a href="#" class="hover:underline">Classements</a></li>
                        <li><a href="#" class="hover:underline">Billetterie</a></li>
                    </ul>
                </div>
    
                <div class="text-center md:text-left">
                    <h3 class="font-semibold text-lg mb-6">Partenaires</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="hover:underline">FIFA</a></li>
                        <li><a href="#" class="hover:underline">Sponsors</a></li>
                        <li><a href="#" class="hover:underline">Hôtels & Transports</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="border-t border-white/30 mb-8"></div>
    
            <div class="flex flex-col md:flex-row justify-between items-center">
                
                <div class="flex space-x-6 mb-6 md:mb-0">
                    <a href="#" class="hover:opacity-80 hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:opacity-80 hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:opacity-80 hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>
                </div>
    
                <div class="text-center">
                    <p class="text-sm">&copy; 2025 Coupe du Monde 2030 - Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    
  
</body>
</html>



    



        


  


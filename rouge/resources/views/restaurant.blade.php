<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maroc</title>
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

    <!--  Hero -->
    <section id="restaurants" class="pt-20 pb-12">
        <div class="max-w-7xl mx-auto h-[600px]">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="h-full">
                    <div class="relative h-full rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('images/restau-hero1.png') }}" alt="Marrakech rooftop restaurant with Koutoubia Mosque view" class="w-full h-full object-cover"/>
                    </div>
                </div>
                
                <div class="grid grid-rows-2 gap-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset('images/restau-hero2.png') }}" alt="Colorful Moroccan feast" class="w-full h-full object-cover"/>
                        </div>
                        
                        <div class="relative rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset('images/restau-hero3.png') }}" alt="Modern Moroccan restaurant with mosaic" class="w-full h-full object-cover"/>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset('images/restau-hero4.png') }}" alt="Colorful Moroccan feast" class="w-full h-full object-cover"/>
                        </div>
                        
                        <div class="relative rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset('images/restau-hero5.png') }}" alt="Modern Moroccan restaurant with mosaic" class="w-full h-full object-cover"/>
                        </div>
                    </div>
                </div>
            </div>
            
        
        </div>
    </section>

    <!-- Barre de recherche -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="w-full bg-white rounded-full shadow-lg overflow-hidden">
        <form class="flex items-center">
            <div class="relative flex-grow">
            <input type="text" id="searchInput" placeholder="Rechercher un restaurant..." class="w-full py-4 px-6 text-gray-700 focus:outline-none">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            </div>
            
            <div class="flex items-center px-4">
            <select id="cityFilter" class="py-4 px-3 text-gray-700 bg-transparent border-l border-gray-300 focus:outline-none">
                <option value="">Toutes les villes</option>
                <option value="Rabat">Rabat</option>
                <option value="Casablanca">Casablanca</option>
                <option value="Agadir">Agadir</option>
                <option value="Marrakech">Marrakech</option>
                <option value="Fès">Fès</option>
                <option value="Tanger">Tanger</option>
            </select>
            </div>
            
            <button type="submit" class="bg-[#C02626] text-white px-8 py-4 hover:bg-[#A42020] transition-colors duration-300">
            Rechercher
            </button>
        </form>
        </div>
    </section>

    {{-- les carts 1 --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4">
        <div class="flex flex-col md:flex-row justify-center items-stretch space-y-8 md:space-y-0 md:space-x-8">
          
          <!-- Carte 1 -->
          <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
              <img src="{{ asset('images/palais-dar-soukar.png') }}" alt="Restaurant élégant avec tables en bois et banquettes bleues" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Palais Dar Soukar</h2>
              <p class="text-gray-600 mb-4">offre une expérience unique alliant gastronomie, ambiance festive et vue panoramique.</p>
            </div>
            <div class="p-6 bg-white">
              <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
          </div>
          
          <!-- Carte 2 -->
          <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
              <img src="{{ asset('images/pointbar.png') }}" alt="Espace de réunion moderne avec tables en bois et chaises noires" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Pointbar</h2>
              <p class="text-gray-600 mb-4">propose des cocktails raffinés dans une atmosphère élégante</p>
            </div>
            <div class="p-6 bg-white">
              <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
          </div>
          
          <!-- Carte 3-->
          <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
              <img src="{{ asset('images/rooftop.png') }}" alt="Restaurant avec toit en verre et plantes suspendues" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Rooftop</h2>
              <p class="text-gray-600 mb-4">vous invite à profiter de soirées envoûtantes sous les étoiles, avec une vue imprenable et une ambiance musicale envoûtante.</p>
            </div>
            <div class="p-6 bg-white">
              <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
          </div>
          
        </div>
    </section>

    {{-- les carts 2 --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4">
        <div class="flex flex-col md:flex-row justify-center items-stretch space-y-8 md:space-y-0 md:space-x-8">
          
          <!-- Carte 1 -->
          <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
              <img src="{{ asset('images/palais-dar-soukar.png') }}" alt="Restaurant élégant avec tables en bois et banquettes bleues" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Palais Dar Soukar</h2>
              <p class="text-gray-600 mb-4">offre une expérience unique alliant gastronomie, ambiance festive et vue panoramique.</p>
            </div>
            <div class="p-6 bg-white">
              <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
          </div>
          
          <!-- Carte 2 -->
          <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
              <img src="{{ asset('images/pointbar.png') }}" alt="Espace de réunion moderne avec tables en bois et chaises noires" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Pointbar</h2>
              <p class="text-gray-600 mb-4">propose des cocktails raffinés dans une atmosphère élégante</p>
            </div>
            <div class="p-6 bg-white">
              <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
          </div>
          
          <!-- Carte 3-->
          <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
              <img src="{{ asset('images/rooftop.png') }}" alt="Restaurant avec toit en verre et plantes suspendues" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
              <h2 class="text-2xl font-bold text-gray-800 mb-2">Rooftop</h2>
              <p class="text-gray-600 mb-4">vous invite à profiter de soirées envoûtantes sous les étoiles, avec une vue imprenable et une ambiance musicale envoûtante.</p>
            </div>
            <div class="p-6 bg-white">
              <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
          </div>
          
        </div>
    </section>

     {{-- les carts 3 --}}
     <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4">
        <div class="flex flex-col md:flex-row justify-center items-stretch space-y-8 md:space-y-0 md:space-x-8">
        
        <!-- Carte 1 -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
            <img src="{{ asset('images/palais-dar-soukar.png') }}" alt="Restaurant élégant avec tables en bois et banquettes bleues" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Palais Dar Soukar</h2>
            <p class="text-gray-600 mb-4">offre une expérience unique alliant gastronomie, ambiance festive et vue panoramique.</p>
            </div>
            <div class="p-6 bg-white">
            <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
        </div>
        
        <!-- Carte 2 -->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
            <img src="{{ asset('images/pointbar.png') }}" alt="Espace de réunion moderne avec tables en bois et chaises noires" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Pointbar</h2>
            <p class="text-gray-600 mb-4">propose des cocktails raffinés dans une atmosphère élégante</p>
            </div>
            <div class="p-6 bg-white">
            <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
        </div>
        
        <!-- Carte 3-->
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden w-full md:w-1/3 flex flex-col">
            <div class="h-48 overflow-hidden">
            <img src="{{ asset('images/rooftop.png') }}" alt="Restaurant avec toit en verre et plantes suspendues" class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex-grow">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Rooftop</h2>
            <p class="text-gray-600 mb-4">vous invite à profiter de soirées envoûtantes sous les étoiles, avec une vue imprenable et une ambiance musicale envoûtante.</p>
            </div>
            <div class="p-6 bg-white">
            <p class="text-4xl font-bold text-gray-800 text-right">35€</p>
            </div>
        </div>
        
        </div>
    </section>


    
  


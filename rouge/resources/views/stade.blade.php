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
                    <li><a href="#accueil" class="">Accueil</a></li>
                    <li><a href="#stades" class="">Stades</a></li>
                    <li><a href="#hebergements" class="">Hébergements</a></li>
                    <li><a href="#restaurants" class="">Restaurants</a></li>
                    <li><a href="#trajets" class="">Trajets</a></li>
                </ul>
            </div>
            
            <!-- Buttons  -->
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
     <section id="accueil" class="w-full h-screen pt-16">
        <div class="relative w-full h-full">
            <img src="{{ asset('images/hero-stade.jpg') }}" alt="Équipe nationale du Maroc" class="w-full h-full object-cover" />
        </div>
    </section>

    {{-- stades Rabat --}}
    <div class="w-full flex justify-center p-6">
        <div class="w-full max-w-screen-lg bg-white shadow-lg rounded-2xl overflow-hidden p-2">
            <h1 class="text-4xl font-bold text-red-600 P-2 ml-6">Stade Rabat </h1>
            <div class="relative w-full py-4 overflow-hidden">
                <img src="{{ asset('images/stade-rabat.jpg') }}" alt="Stade Rabat " class="w-full h-64 object-cover rounded-xl">
            </div>


            
            
            <div class="p-4">
                
                <div class="flex items-center text-gray-700 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Rabat, Maroc</span>
                </div>
                
                <div class="flex items-center text-gray-700 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Capacité: 65.000</span>
                </div>
                <a href="#" class="block mt-6 text-center bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition">
                    Voir Les Détails
                </a>
            </div>
        </div>
    </div>

    {{-- stades casa --}}
    <div class="w-full flex justify-center p-6">
        <div class="w-full max-w-screen-lg bg-white shadow-lg rounded-2xl overflow-hidden p-2">
            <h1 class="text-4xl font-bold text-red-600 P-2 ml-6">Stade Casablanca</h1>
            <div class="relative w-full py-4 overflow-hidden">
                <img src="{{ asset('images/stade-casablanca.png') }}" alt="Stade Casablanca" class="w-full h-64 object-cover rounded-xl">
            </div>


            
            <div class="p-4">
                
                <div class="flex items-center text-gray-700 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Casablanca, Maroc</span>
                </div>
                
                <div class="flex items-center text-gray-700 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Capacité: 115.000</span>
                </div>
                <a href="#" class="block mt-6 text-center bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition">
                    Voir Les Détails
                </a>
            </div>
        </div>
    </div>

    {{-- stades agadir --}}
    <div class="w-full flex justify-center p-6">
        <div class="w-full max-w-screen-lg bg-white shadow-lg rounded-2xl overflow-hidden p-2">
            <h1 class="text-4xl font-bold text-red-600 P-2 ml-6">Stade Agadir</h1>
            <div class="relative w-full py-4 overflow-hidden">
                <img src="{{ asset('images/stade-agadir.jpg') }}" alt="Stade Agadir" class="w-full h-64 object-cover rounded-xl">
            </div>


            <div class="p-4">
                
                <div class="flex items-center text-gray-700 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Agadir, Maroc</span>
                </div>
                
                <div class="flex items-center text-gray-700 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Capacité: 42.000</span>
                </div>
                <a href="#" class="block mt-6 text-center bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition">
                    Voir Les Détails
                </a>
            </div>
        </div>
    </div>

    {{-- stade kech --}}
    <div class="w-full flex justify-center p-6">
        <div class="w-full max-w-screen-lg bg-white shadow-lg rounded-2xl overflow-hidden p-2">
            <h1 class="text-4xl font-bold text-red-600 P-2 ml-6">Stade Marrakech</h1>
            <div class="relative w-full py-4 overflow-hidden">
                <img src="{{ asset('images/stade_marrakech.jpg') }}" alt="Stade marrakech" class="w-full h-64 object-cover rounded-xl">
            </div>


            
            <div class="p-4">
                <div class="flex items-center text-gray-700 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Marrakech, Maroc</span>
                </div>
                
                <div class="flex items-center text-gray-700 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Capacité: 42.000</span>
                </div>
                
                <a href="#" class="block mt-6 text-center bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition">
                    Voir Les Détails
                </a>
            </div>
        </div>
    </div>







    



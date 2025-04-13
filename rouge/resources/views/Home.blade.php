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
        <img src="{{ asset('images/hero-home.png') }}" alt="Équipe nationale du Maroc" class="w-full h-full object-cover" />
        </div>
        
        
    </section>
    <!-- Section Stades -->
    <section id="stades" class=" py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Stades du Maroc</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 h-64 ">
                
                <div class="relative group overflow-hidden rounded-3xl shadow-lg md:col-span-2 md:row-span-2 ">
                    <img src="{{ asset('images/stade1.png') }}" alt="Stade Mohammed V" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute bottom-0 right-0 bg-[#C02626] text-white p-2 rounded-tl-xl">
                        <span class="font-medium">Casablanca</span>
                    </div>
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/stade2.png') }}" alt="stades" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute bottom-0 right-0 bg-[#C02626] text-white p-2 rounded-tl-xl">
                        <span class="font-medium">Marrakech</span>
                    </div>
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/stade3.png') }}" alt="stades" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute bottom-0 right-0 bg-[#C02626] text-white p-2 rounded-tl-xl">
                        <span class="font-medium">Agadir</span>
                    </div>
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/stade4.png') }}" alt="stades" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute bottom-0 right-0 bg-[#C02626] text-white p-2 rounded-tl-xl">
                        <span class="font-medium">Fès</span>
                    </div>
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/stade5.png') }}" alt="stades" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute bottom-0 right-0 bg-[#C02626] text-white p-2 rounded-tl-xl">
                        <span class="font-medium">Tanger</span>
                    </div>
                </div>
            </div>
            <div class="text-end mt-[300px]">
                <a href="#tous-les-stades" class="bg-[#C02626] hover:bg-[#A42020] text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 inline-block">
                    Voir tous les stades
                </a>
            </div>
        </div>
    </section>
    


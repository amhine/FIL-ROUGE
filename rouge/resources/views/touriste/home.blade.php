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
    <!-- Section Hébergements -->
    <section id="Hébergements" class=" py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12"> Morocoo Hébergements</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 h-64 ">
                <div class="relative group overflow-hidden rounded-3xl shadow-lg md:col-span-2 md:row-span-2 ">
                    <img src="{{ asset('images/Hébergements1.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements2.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements3.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements4.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements5.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            </div>

            <div class="text-end mt-[300px]">
                <a href="#tous-les-Hébergements" class="bg-[#C02626] hover:bg-[#A42020] text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 inline-block">
                    Voir tous les Hébergements
                </a>
            </div>
        </div>
    </section>
    <!-- Section Restaurants -->
    <section id="Restaurants" class=" py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Morocoo Restaurants</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 h-64 ">
                <div class="relative group overflow-hidden rounded-3xl shadow-lg md:col-span-2 md:row-span-2 ">
                    <img src="{{ asset('images/Restaurants1.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants2.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants3.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants4.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                   
                </div>
            
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants5.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                  
                </div>
            </div>

            <div class="text-end mt-[300px]">
                <a href="#tous-les-stades" class="bg-[#C02626] hover:bg-[#A42020] text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 inline-block">
                    Voir tous les Restaurants
                </a>
            </div>
        </div>
    </section>
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



    


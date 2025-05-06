
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'StayMorocco')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-50">
    <nav id="navbar" class="fixed w-full bg-[#C02626] text-white transition-all duration-300 z-50">
        <div class="container mx-auto py-6 flex items-center justify-between">
            
            <div class="flex items-center">
                <span class="font-bold text-xl">StayMorocco</span>
            </div>
            
           
            <div class="hidden md:flex items-center justify-center flex-grow">
                <ul class="flex space-x-8">
                    <li><a href="{{ route('home') }}" class="hover:text-morocco-gold transition-colors duration-300">Accueil</a></li>
                    <li><a href="{{ route('hotel') }}" class="hover:text-morocco-gold transition-colors duration-300">Hébergements</a></li>
                    <li><a href="{{ route('restaurants.search') }}" class="hover:text-morocco-gold transition-colors duration-300">Restaurants</a></li>
                    <li><a href="{{ route('matche') }}" class="hover:text-morocco-gold transition-colors duration-300">Matches</a></li>
                    <li><a href="{{ route('favoris.index') }}" class="hover:text-morocco-gold transition-colors duration-300">Favoris</a></li>
                    <li><a href="{{ route('trajet.index') }}" class="hover:text-morocco-gold transition-colors duration-300">Trajets</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:text-morocco-gold transition-colors duration-300">Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
            
            
            <div class="md:hidden flex items-center space-x-4">
                <button class="flex flex-col space-y-1" id="mobile-menu-button">
                    <span class="w-6 h-0.5 bg-white"></span>
                    <span class="w-6 h-0.5 bg-white"></span>
                    <span class="w-6 h-0.5 bg-white"></span>
                </button>
            </div>
        </div>
        
       
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="{{ route('home') }}" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Accueil</a></li>
                <li><a href="{{ route('hotel') }}" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Hébergements</a></li>
                <li><a href="{{ route('restaurants.search') }}" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Restaurants</a></li>
                <li><a href="{{ route('matche') }}" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Matche</a></li>
                <li><a href="{{ route('favoris.index') }}" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Favoris</a></li>
                <li><a href="{{ route('trajet.index') }}" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Trajets</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:text-morocco-gold transition-colors duration-300">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    
    <main class="">
        @yield('content')
    </main>

    
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
                    <p class="text-sm">© 2025 Coupe du Monde 2030 - Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

  
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>

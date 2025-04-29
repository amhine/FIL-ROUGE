<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMorocco - Statistiques</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 min-h-screen pt-20">
    <!-- Navbar -->
    <nav class="fixed w-full bg-[#C02626] text-white z-50 top-0">
        <div class="container mx-auto py-4 px-4 flex items-center justify-between">
            <span class="font-bold text-xl">StayMorocco</span>
            <div class="hidden md:flex space-x-8">
                <a href="#hebergements" class="hover:text-gray-200 transition-colors">Mes Hébergements</a>
                <a href="#statistiques" class="hover:text-gray-200 transition-colors">Statistiques</a>
            </div>
            <button class="md:hidden flex flex-col space-y-1" id="mobile-menu-button">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="#hebergements" class="block py-2 hover:text-gray-200 transition-colors">Mes Hébergements</a></li>
                <li><a href="#statistiques" class="block py-2 hover:text-gray-200 transition-colors">Statistiques</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hotel Card -->
    <div class="container mx-auto px-4 py-8">
        <div class="relative bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 max-w-2xl mx-auto">
            <div class="relative">
                <img src="{{ $hotel->image }}" alt="Appartement avec vue" class="w-full h-64 object-cover">
                <a href="{{ route('hebergeur.statistiques') }}" class="absolute top-4 right-4 text-red-600 hover:text-red-800 transition-colors">
                    <i class="fa-solid fa-x fa-lg"></i>
                </a>
                <div class="absolute top-4 right-16 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                    {{ $hotel->prix_nuit }} DH/nuit
                </div>
                <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                    {{ $hotel->disponibilite }}
                </div>
                
            </div>
            
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $hotel->nom_hotel }}</h3>
                <div class="flex items-center text-gray-600 mb-3">
                    <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                    <span>{{ $hotel->adress }}, {{ $hotel->ville }}</span>
                </div>
                <!-- Description -->
                <p class="text-gray-600 mb-4 line-clamp-3 text-sm">
                    {{ $hotel->description }} 
                </p>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <i class="fas fa-bed mr-1 text-red-600"></i>
                            <span>{{ $hotel->nombre_chambre }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-bath mr-1 text-red-600"></i>
                            <span>{{ $hotel->nombre_salle_debain }}</span>
                        </div>
                    </div>
                </div>
                <div class="border-t pt-4">
                    <div class="flex justify-around">
                        @foreach($hotel->equipements as $equip)

                        <div class="text-center transform hover:-translate-y-1 transition-transform duration-300">
                            <i class="fas fa-{{ $equip->image }} text-green-600 text-xl mb-1"></i>
                            <p class="text-xs">{{ $equip->nom_equipe }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Mobile Menu Script -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
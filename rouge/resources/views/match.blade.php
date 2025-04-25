<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tournament }} - Matchs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .filter-btn.active {
            background-color: #C02626;
            color: white;
        }
        .match-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .match-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-100">
   <!-- navbar - conservée telle quelle -->
   <nav id="navbar" class="fixed w-full bg-[#C02626] text-white transition-all duration-300 z-50">
    <div class="container mx-auto py-4 flex items-center justify-between">
        <div class="flex items-center">
            <span class="font-bold text-xl">StayMorocco</span>
        </div>
        <div class="hidden md:flex items-center justify-center flex-grow">
            <ul class="flex space-x-8">
                <li><a href="#accueil" class="">Accueil</a></li>
                <li><a href="#stades" class="">Stades</a></li>
                <li><a href="#hebergements" class="">Hébergements</a></li>
                <li><a href="#restaurants" class="">Restaurants</a></li>
                <li><a href="#favoris" class="">Favoris</a></li>
                <li><a href="#trajets" class="">Trajets</a></li>
            </ul>
        </div>
        <div class="md:hidden flex items-center space-x-4">
            <button class="flex flex-col space-y-1" id="mobile-menu-button" aria-label="Ouvrir le menu mobile">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
    </div>
    <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
        <ul class="flex flex-col space-y-4">
            <li><a href="#accueil" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Accueil</a></li>
            <li><a href="#equipes" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Équipes</a></li>
            <li><a href="#stades" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Stades</a></li>
            <li><a href="#hebergements" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Hébergements</a></li>
            <li><a href="#restaurants" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Restaurants</a></li>
            <li><a href="#trajets" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Trajets</a></li>
            <li><a href="#inscrire" class="block py-2 hover:text-yellow-300 transition-colors duration-300">S'inscrire</a></li>
        </ul>
    </div>
</nav>

    <!-- Contenu principal - MODIFIÉ -->
    <main class="pt-24 pb-12 bg-gradient-to-b from-gray-100 to-gray-200">
        <div class="container mx-auto px-4">
           

            <!-- Filtre par étape -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="filter-btn px-6 py-2 bg-[#F5F5DC] rounded-full text-black font-medium shadow-md hover:shadow-lg transition active" data-stage="all">Tous</button>
                @foreach (array_unique(array_column($matches, 'stage')) as $stage)
                    <button class="filter-btn px-6 py-2 bg-gray-200 rounded-full text-gray-700 font-medium shadow-md hover:shadow-lg transition" data-stage="{{ $stage }}">{{ $stage }}</button>
                @endforeach
            </div>

            <!-- Liste des matchs -->
            <div id="matches-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($matches as $match)
                    <div class="match-card bg-white rounded-xl shadow-lg overflow-hidden" data-stage="{{ $match['stage'] }}">
                        <!-- En-tête du match -->
                        <div class="bg-[#C02626] text-white p-3 flex justify-between items-center">
                            <span class="font-bold">{{ $match['stage'] }}</span>
                            @if(isset($match['group']))
                                <span class="bg-white text-[#C02626] px-3 py-1 rounded-full text-sm font-bold">Groupe {{ $match['group'] }}</span>
                            @endif
                        </div>
                        
                        <!-- Contenu du match -->
                        <div class="p-6">
                            <!-- Date et lieu -->
                            <div class="flex justify-between items-center text-gray-500 text-sm mb-6">
                                <span>{{ $match['date'] ?? 'Date à confirmer' }}</span>
                                <span>{{ $match['stadium'] ?? 'Stade' }}</span>
                            </div>
                            
                            <!-- Équipes et score -->
                            <div class="flex justify-between items-center">
                                <!-- Équipe domicile -->
                                <div class="flex flex-col items-center w-2/5">
                                    <div class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center overflow-hidden">
                                        <!-- Affichage du drapeau/logo -->
                                        <img src="{{ $match['homeFlag'] }}" alt="Flag of {{ $match['homeTeam'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <p class="font-bold text-center">{{ $match['homeTeam'] }}</p>
                                </div>
                                
                                
                                <!-- Score -->
                                <div class="flex flex-col items-center w-1/5">
                                    <div class="bg-gray-100 rounded-lg px-4 py-2 flex items-center justify-center">
                                        <span class="text-xl font-black text-[#C02626]">{{ $match['homeScore'] }}</span>
                                        <span class="mx-2 text-gray-400">-</span>
                                        <span class="text-xl font-black text-[#C02626]">{{ $match['awayScore'] }}</span>
                                    </div>
                                    @if(isset($match['penalties']))
                                        <p class="text-xs text-gray-500 mt-1">TAB: {{ $match['penalties'] }}</p>
                                    @endif
                                </div>
                                
                                <!-- Équipe extérieur -->
                                <div class="flex flex-col items-center w-2/5">
                                   
                                        <div class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center overflow-hidden">
                                           
                                            <img src="{{ $match['awayFlag'] }}" alt="Flag of {{ $match['awayFlag'] }}" class="w-full h-full object-cover">
                                        </div>
                                       
                                    
                                    <p class="font-bold text-center">{{ $match['awayTeam'] }}</p>
                                </div>
                            </div>
                            
                            <!-- Bouton détails -->
                            <div class="mt-6 text-center">
                                <a href="#" class="inline-block px-4 py-2 bg-gray-200 hover:bg-[#C02626] hover:text-white text-gray-700 rounded-full text-sm font-medium transition-colors duration-300">Détails du match</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <div class="inline-flex rounded-md shadow-sm">
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">Précédent</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-[#C02626] border border-[#C02626]">1</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">2</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">3</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">Suivant</a>
                </div>
            </div>
        </div>
    </main>

    <!-- footer - conservé tel quel -->
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
                    <p class="text-sm">© 2022 Coupe du Monde - Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Script pour le menu mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Script pour les filtres
        const filterButtons = document.querySelectorAll('.filter-btn');
        const matchCards = document.querySelectorAll('.match-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const stage = button.getAttribute('data-stage');
                
                // Mise à jour des classes actives pour les boutons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.remove('bg-[#C02626]');
                    btn.classList.remove('text-white');
                    
                    if (btn !== button) {
                        btn.classList.add('bg-gray-200');
                        btn.classList.add('text-gray-700');
                    }
                });
                
                button.classList.add('active');
                button.classList.add('bg-[#C02626]');
                button.classList.add('text-white');
                
                // Filtrage des cartes
                matchCards.forEach(card => {
                    const cardStage = card.getAttribute('data-stage');
                    if (stage === 'all' || cardStage === stage) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        // Ajouter une animation lors du chargement de la page
        document.addEventListener('DOMContentLoaded', () => {
            matchCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('opacity-100');
                }, index * 100);
            });
        });
    </script>
</body>
</html>
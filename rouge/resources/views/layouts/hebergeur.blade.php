<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - StayMorocco</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('styles')
</head>
<body class="bg-gray-50">
    <nav class="fixed w-full bg-[#C02626] text-white z-50">
        <div class="container mx-auto py-4 px-4 flex items-center justify-between">
            <span class="font-bold text-xl">StayMorocco</span>
            <div class="hidden md:flex items-center space-x-8">
                <div class="flex space-x-8">
                    <a href="{{ route('hebergeur.hebergement') }}" class="hover:text-gray-200 transition-colors">Mes Hébergements</a>
                    <a href="{{ route('hebergeur.statistiques') }}" class="hover:text-gray-200 transition-colors">Statistiques</a>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-gray-200 transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </form>
            </div>
            <button class="md:hidden flex flex-col space-y-1" id="mobile-menu-button">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="{{ route('hebergeur.hebergement') }}" class="block py-2 hover:text-gray-200 transition-colors">Mes Hébergements</a></li>
                <li><a href="{{ route('hebergeur.statistiques') }}" class="block py-2 hover:text-gray-200 transition-colors">Statistiques</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:text-gray-200 transition-colors">
                            <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto px-4 pt-20 pb-8">
        @yield('content')
    </main>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    @yield('scripts')
</body>
</html>
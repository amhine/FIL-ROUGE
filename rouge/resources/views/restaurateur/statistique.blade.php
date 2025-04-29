<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMorocco - Statistiques</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed w-full bg-gradient-to-r from-[#C02626] to-[#FF5733] text-white shadow-lg z-50">
        <div class="container mx-auto py-4 px-6 flex items-center justify-between">
            <span class="font-bold text-2xl tracking-wide">StayMorocco</span>
            <div class="hidden md:flex space-x-10 text-lg">
                <a href="#restaurants" class="hover:text-gray-300 transition">Mes Restaurants</a>
                <a href="#statistiques" class="hover:text-gray-300 transition">Statistiques</a>
            </div>
            <button class="md:hidden flex flex-col space-y-1" id="mobile-menu-button">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="#restaurants" class="block py-2 hover:text-gray-300">Mes Restaurants</a></li>
                <li><a href="#statistiques" class="block py-2 hover:text-gray-300">Statistiques</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto pt-24 pb-8 px-4">

        @if(isset($message))
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md shadow mb-6">
                {{ $message }}
            </div>
        @endif

        @if($totalReservations > 0)
                <!-- Stat Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <h5 class="text-lg font-semibold text-gray-700 mb-2">Total des réservations</h5>
                        <h2 class="text-3xl font-extrabold text-[#C02626]">{{ $totalReservations }}</h2>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <h5 class="text-lg font-semibold text-gray-700 mb-2">Réservations confirmées</h5>
                        <h2 class="text-3xl font-extrabold text-green-600">{{ $reservationsParStatut['confirmer'] ?? 0 }}</h2>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                        <h5 class="text-lg font-semibold text-gray-700 mb-2">Réservations en attente</h5>
                        <h2 class="text-3xl font-extrabold text-yellow-500">{{ $reservationsParStatut['attends'] ?? 0 }}</h2>
                    </div>
                </div>


            <!-- Statistiques par Restaurant -->
            <div class="bg-white p-8 rounded-2xl shadow mb-8">
                <h4 class="text-2xl font-bold mb-6 text-gray-800">Statistiques par restaurant</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="p-4">Nom du restaurant</th>
                                <th class="p-4">Total réservations</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistiquesParResteau as $resteauId => $stats)
                                <tr class="border-b hover:bg-gray-100 transition">
                                    <td class="p-4">{{ $stats['nom_resteau'] }}</td>
                                    <td class="p-4">{{ $stats['total_reservations'] }}</td>
                                    <td class="p-4">
                                        <a href="{{ route('resteaurant.resteau.detail', $resteauId) }}" class="text-blue-500 hover:underline">
                                            Voir détails
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Dernières réservations -->
            <div class="bg-white p-8 rounded-2xl shadow">
                <h4 class="text-2xl font-bold mb-6 text-gray-800">Dernières réservations</h4>
                @if($reservations->isEmpty())
                    <p class="text-gray-500">Aucune réservation trouvée.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="p-4">ID</th>
                                    <th class="p-4">Restaurant</th>
                                    <th class="p-4">Client</th>
                                    <th class="p-4">Date et heure d'arrivée</th>
                                    <th class="p-4">Date et heure de départ</th>
                                    <th class="p-4">Prix</th>
                                    <th class="p-4">Statut</th>
                                    <th class="p-4">Réservé le</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr class="border-b hover:bg-gray-100 transition">
                                        <td class="p-4">{{ $reservation->id }}</td>
                                        <td class="p-4">{{ $reservation->restaurant?->nom_resteau ?? 'Restaurant supprimé' }}</td>
                                        <td class="p-4">{{ $reservation->tourist?->name ?? 'Touriste inconnu' }}</td>
                                        <td class="p-4">{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y H:i') }}</td>
                                        <td class="p-4">{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y H:i') }}</td>
                                        <td class="p-4">{{ $reservation->prix_total ? number_format($reservation->prix_total, 2) : 'N/A' }} MAD</td>
                                        <td class="p-4">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ 
                                                $reservation->status == 'confirme' ? 'bg-green-100 text-green-700' : 
                                                ($reservation->status == 'attends' ? 'bg-yellow-100 text-yellow-700' : 
                                                'bg-red-100 text-red-700') }}">
                                                {{ ucfirst($reservation->status) }}
                                            </span>
                                        </td>
                                        <td class="p-4">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $reservations->links() }}
                    </div>
                @endif
            </div>

        @endif

    </div>

    <script>
        const menuBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
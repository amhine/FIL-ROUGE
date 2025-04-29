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
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="fixed w-full bg-[#C02626] text-white z-50">
        <div class="container mx-auto py-4 flex items-center justify-between">
            <span class="font-bold text-xl">StayMorocco</span>
            <div class="hidden md:flex space-x-8">
                <a href="#hebergements" class="hover:text-gray-200">Mes Hébergements</a>
                <a href="#statistiques" class="hover:text-gray-200">Statistiques</a>
            </div>
            <button class="md:hidden flex flex-col space-y-1" id="mobile-menu-button">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="#hebergements" class="block py-2 hover:text-gray-200">Mes Hébergements</a></li>
                <li><a href="#statistiques" class="block py-2 hover:text-gray-200">Statistiques</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto pt-20 pb-8">

        @if(isset($message))
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6">
                {{ $message }}
            </div>
        @endif

        @if($totalReservations > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h5 class="text-lg font-semibold">Total des réservations</h5>
                    <h2 class="text-2xl font-bold">{{ $totalReservations }}</h2>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h5 class="text-lg font-semibold">Réservations confirmées</h5>
                    <h2 class="text-2xl font-bold">{{ $reservationsParStatut['confirmer'] ?? 0 }}</h2>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h5 class="text-lg font-semibold">Réservations en attente</h5>
                    <h2 class="text-2xl font-bold">{{ $reservationsParStatut['attends'] ?? 0 }}</h2>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h4 class="text-xl font-semibold mb-4">Statistiques par hôtel</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3">Nom de l'hôtel</th>
                                <th class="p-3">Total réservations</th>
                                <th class="p-3">Revenus totaux</th>
                                <th class="p-3">Nuits réservées</th>
                                <th class="p-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistiquesParHotel as $hotelId => $stats)
                                <tr class="border-b">
                                    <td class="p-3">{{ $stats['nom_hotel'] }}</td>
                                    <td class="p-3">{{ $stats['total_reservations'] }}</td>
                                    <td class="p-3">{{ number_format($stats['revenu_total'], 2) }} MAD</td>
                                    <td class="p-3">{{ $stats['nuits_reservees'] }}</td>
                                    <td class="p-3">
                                        <a href="{{ route('hebergeur.hotel.detail', $hotelId) }}" class="text-blue-600 hover:underline">
                                            Détails
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-xl font-semibold mb-4">Dernières réservations</h4>
                @if($reservations->isEmpty())
                    <p class="p-3 text-gray-500">Aucune réservation trouvée.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-3">ID</th>
                                    <th class="p-3">Hôtel</th>
                                    <th class="p-3">Client</th>
                                    <th class="p-3">Date d'arrivée</th>
                                    <th class="p-3">Date de départ</th>
                                    <th class="p-3">Nuits</th>
                                    <th class="p-3">Prix total</th>
                                    <th class="p-3">Statut</th>
                                    <th class="p-3">Date de réservation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr class="border-b">
                                        <td class="p-3">{{ $reservation->id }}</td>
                                        <td class="p-3">{{ $reservation->hotel->nom_hotel }}</td>
                                        <td class="p-3">{{ $reservation->tourist->name  }}</td>
                                        <td class="p-3">{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}</td>
                                        <td class="p-3">{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}</td>
                                        <td class="p-3">{{ $reservation->nombre_nuits }}</td>
                                        <td class="p-3">{{ number_format($reservation->prix_total, 2) }} MAD</td>
                                        <td class="p-3">
                                            <span class="px-2 py-1 text-sm rounded {{ $reservation->status == 'confirmer' ? 'bg-green-100 text-green-800' : ($reservation->status == 'attends' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                {{ $reservation->status }}
                                            </span>
                                        </td>
                                        <td class="p-3">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Liens de pagination -->
                    <div class="mt-6">
                        {{ $reservations->links() }}
                    </div>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
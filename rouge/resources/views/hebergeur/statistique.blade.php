@extends('layouts.hebergeur')

@section('title', 'Statistiques')

@section('content')
    @if(isset($message))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6">
            {{ $message }}
        </div>
    @endif

    @if($totalReservations > 0)
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
                                <th class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr class="border-b">
                                    <td class="p-3">{{ $reservation->id }}</td>
                                    <td class="p-3">{{ $reservation->hotel->nom_hotel }}</td>
                                    <td class="p-3">{{ $reservation->tourist->name }}</td>
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
                                    <td class="p-4">
                                        @if($reservation->status != 'annuler')
                                            <form action="{{ route('hebergement.reservations.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                                    Annuler
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-500">Annulé</span>
                                        @endif
                                    </td>
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
@endsection
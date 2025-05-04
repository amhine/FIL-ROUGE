@extends('layouts.resteaurateur')

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
                <h2 class="text-3xl font-extrabold text-green-600">{{ $reservationsParStatut['confirme'] ?? 0 }}</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h5 class="text-lg font-semibold text-gray-700 mb-2">Réservations en attente</h5>
                <h2 class="text-3xl font-extrabold text-yellow-500">{{ $reservationsParStatut['attends'] ?? 0 }}</h2>
            </div>
        </div>

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
                        @foreach($statistiquesParResteau as $restaurantId => $stats)
                            <tr class="border-b hover:bg-gray-100 transition">
                                <td class="p-4">{{ $stats['nom_resteau'] }}</td>
                                <td class="p-4">{{ $stats['total_reservations'] }}</td>
                                <td class="p-4">
                                    <a href="{{ route('resteaurant.resteau.detail', $restaurantId) }}" class="text-blue-500 hover:underline">
                                        Voir détails
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

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
                                <th class="p-4">Statut</th>
                                <th class="p-4">Réservé le</th>
                                <th class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr class="border-b hover:bg-gray-100 transition">
                                    <td class="p-4">{{ $reservation->id }}</td>
                                    <td class="p-4">{{ $reservation->restaurant?->nom_restaurant ?? 'Restaurant supprimé' }}</td>
                                    <td class="p-4">{{ $reservation->tourist?->name ?? 'Client inconnu' }}</td>
                                    <td class="p-4">{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y H:i') }}</td>
                                    <td class="p-4">{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y H:i') }}</td>
                                    <td class="p-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ 
                                            $reservation->status == 'confirme' ? 'bg-green-100 text-green-700' : 
                                            ($reservation->status == 'attends' ? 'bg-yellow-100 text-yellow-700' : 
                                            'bg-red-100 text-red-700') }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4">{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="p-4">
                                        @if($reservation->status != 'annule')
                                            <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
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
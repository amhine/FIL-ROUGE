<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif

        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Réserver {{ $resteau->nom_resteau }}</h2>
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col">
            <div class="relative h-48 overflow-hidden">
                <img src="{{ $resteau->image }}" alt="Restaurant" class="w-full h-full object-cover">
                <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                    {{ $resteau->prix }} DH
                </div>
                <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                    Type : {{ $resteau->type_cuisine }}
                </div>
            </div>
            <div class="p-6 flex-grow">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $resteau->nom_resteau }}</h3>
                <div class="flex items-center text-gray-600 mb-2">
                    <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                    <span>{{ $resteau->localisation }}</span>
                </div>
            </div>
        </div>

        <!-- Formulaire de réservation -->
        <form id="reservationForm" action="{{ route('reservations.resteau.store') }}" method="POST" class="space-y-4 mt-4">
            @csrf
            <input type="hidden" name="id_resteau" value="{{ $resteau->id }}">

            <div>
                <label for="date_debut" class="block text-gray-700 mb-2">Date et heure de la réservation :</label>
                <input type="text" name="date_debut" id="date_debut" required 
                       class="px-4 py-2 border rounded-lg w-full focus:ring-2 focus:ring-purple-500"
                       placeholder="Sélectionnez une date et heure">
            </div>

            <button type="submit" class="w-full mt-4 bg-red-600 text-white py-2 rounded-lg font-medium hover:opacity-90 transition duration-300">
                Réserver
            </button>
        </form>

        <a href="{{ route('restaurants.search') }}" class="block text-center text-gray-600 mt-4 hover:underline">Retour aux annonces</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#date_debut", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "{{ $resteau->disponibilite ?? 'today' }}",
                time_24hr: true,
                minuteIncrement: 15,
                altInput: true,
                altFormat: "d F Y H:i",
                locale: {
                    firstDayOfWeek: 1
                },
                disable: [
                    @if(isset($heures_indisponibles))
                        @foreach($heures_indisponibles as $heure)
                            "{{ $heure }}",
                        @endforeach
                    @endif
                ]
            });
        });
    </script>
</body>
</html>
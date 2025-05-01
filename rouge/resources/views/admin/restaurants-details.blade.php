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

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
               
            <form id="delete-form" method="POST" action="{{ route('admin.restaurants.delete', $resteau->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet hébergement ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Supprimer
                </button>
            </form>
            <button type="button" onclick="window.location.href='{{ route('dashboard') }}'" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Annuler
            </button>
        </div>

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
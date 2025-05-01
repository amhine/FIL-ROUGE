<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver {{ $hotel->nom_hotel }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="card bg-white rounded-xl overflow-hidden shadow-lg">
        <div class="relative">
            <img src="{{ $hotel->image }}" class="w-full object-cover h-48">
            <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                {{ $hotel->prix_nuit }} DH/nuit
            </div>
            <div class="absolute bottom-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                {{ $hotel->disponibilite }}
            </div>
        </div>
        
        <div class="p-5">
            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $hotel->nom_hotel }}</h3>
            <div class="flex items-center text-gray-600 mb-2">
                <i class="fas fa-map-marker-alt mr-2 text-purple-600"></i>
                <span>{{ $hotel->adress }}, {{ $hotel->ville }}</span>
            </div>
            <p class="text-gray-600 mb-4">
                {{ $hotel->description }}
            </p>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="flex items-center mr-4">
                        <i class="fas fa-bed mr-1 text-purple-600"></i>
                        <span>{{ $hotel->nombre_chambre }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bath mr-1 text-purple-600"></i>
                        <span>{{ $hotel->nombre_salle_debain }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t pt-4">
                <div class="flex justify-around">
                    @foreach($equipements as $equip)
                        <div class="amenity-icon text-center">
                            <i class="fas fa-{{ $equip->image }} text-purple-600 text-xl mb-1"></i>
                            <p class="text-xs">{{ $equip->nom_equipe }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
               
                <form id="delete-form" method="POST" action="{{ route('admin.hebergements.delete', $hotel->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet hébergement ?');">
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
    </div> 
</body>
</html>
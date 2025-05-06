<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation - {{ $reservation->restaurant->nom_resteau }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-2xl rounded-lg p-8 w-96 text-center transform transition-transform hover:scale-105">
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="mb-6">
            <i class="fas fa-check-circle text-4xl text-green-500"></i>
        </div>
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Réservation Confirmée</h2>
        <p class="text-gray-600 mb-6">Votre réservation pour <strong>{{ $reservation->restaurant->nom_resteau }}</strong> a été confirmée avec succès.</p>
        
        
        <div class="mb-6 text-left bg-gray-50 p-4 rounded-lg">
            <p class="mb-2"><span class="font-semibold text-gray-700">Restaurant :</span> <span class="text-gray-600">{{ $reservation->restaurant->nom_resteau }}</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Date et heure de début :</span> <span class="text-gray-600">{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y H:i') }}</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Date et heure de fin :</span> <span class="text-gray-600">{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y H:i') }}</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Prix :</span> <span class="text-gray-600">{{ $reservation->restaurant->prix }} DH</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Réservé par :</span> <span class="text-gray-600">{{ $reservation->tourist->name }}</span></p>
        </div>
        
        <a href="{{ route('restaurants.search') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
            Retourner aux annonces
        </a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - {{ $reservation->hotel->nom_hotel }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-2xl rounded-lg p-8 w-96 text-center transform transition-transform hover:scale-105">
        
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
        
        
        <div class="mb-6">
            <i class="fab fa-paypal text-4xl text-blue-500"></i>
        </div>
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Paiement sécurisé</h2>
        <p class="text-gray-600 mb-6">Finalisez votre réservation en toute sécurité avec PayPal.</p>
        
        
        <div class="mb-6 text-left bg-gray-50 p-4 rounded-lg">
            <p class="mb-2"><span class="font-semibold text-gray-700">Hébergement :</span> <span class="text-gray-600">{{ $reservation->hotel->nom_hotel }}</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Date début :</span> <span class="text-gray-600">{{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y') }}</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Date fin :</span> <span class="text-gray-600">{{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y') }}</span></p>
            <p class="mb-2"><span class="font-semibold text-gray-700">Prix par nuit :</span> <span class="text-gray-600">{{ $reservation->hotel->prix_nuit }} DH/nuit</span></p>
            <p class="mb-2">
                <span class="font-semibold text-gray-700">Nombre de nuits :</span> 
                <span class="text-gray-600">{{ $reservation->nombre_nuits }}</span>

            </p>
            
            <p class="text-lg font-bold mt-3 text-gray-800">
                Total : <span class="text-blue-500">{{ $reservation->prix_total }} DH</span>

            </p>
        </div>
        
        <form action="{{ route('paiement.process') }}" method="POST">
            @csrf
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            
            
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email PayPal" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <input type="password" name="password" placeholder="Mot de passe PayPal" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
                <i class="fab fa-paypal mr-2"></i>Payer maintenant
            </button>
        </form>
         
        
        <p class="text-sm text-gray-500 mt-6">
            <i class="fas fa-lock mr-1"></i>Vos informations sont sécurisées.
        </p>
        
        <a href="{{ route('hotel') }}" class="block text-center text-gray-600 mt-4 hover:underline">Annuler et retourner aux annonces</a>
    </div>
</body>
</html>
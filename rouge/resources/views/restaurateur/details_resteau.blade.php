<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md relative">
       
        <a href="{{ route('resteau.resteaurant.statistiques') }}" class="absolute top-4 right-4 text-red-600 hover:text-red-800">
            <i class="fa-solid fa-x fa-lg"></i>
        </a>

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
    </div>
</body>
</html>
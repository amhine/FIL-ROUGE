<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Annonce - TouriStay</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full max-w-2xl mx-auto p-8">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-lg font-medium mb-6 text-center">Ajouter une Annonce de Restaurant</h2>
            
            <!-- Affichage des erreurs -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Form -->
            <form action="{{ route('resteau.resteaurant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Informations de Base -->
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Titre -->
                        <div class="col-span-1">
                            <label for="nom_resteau" class="block text-sm font-medium text-gray-700 mb-2">Nom du restaurant</label>
                            <input type="text" name="nom_resteau" id="nom_resteau" placeholder="Nom du restaurant" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('nom_resteau') }}">
                            @error('nom_resteau')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-1">
                            <label for="localisation" class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                            <input type="text" name="localisation" id="localisation" placeholder="Localisation du restaurant" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('localisation') }}">
                            @error('localisation')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Détails de l'Annonce -->
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Type de cuisine -->
                        <div class="col-span-1">
                            <label for="type_cuisine" class="block text-sm font-medium text-gray-700 mb-2">Type de cuisine</label>
                            <input type="text" name="type_cuisine" id="type_cuisine" placeholder="Type de cuisine" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('type_cuisine') }}">
                            @error('type_cuisine')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-span-1">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image du restaurant</label>
                            <input type="text" name="image" id="image" accept="image/*" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500">
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Prix -->
                        <div class="col-span-1">
                            <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                            <input type="number" name="prix" id="prix" placeholder="Prix" step="0.01" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('prix') }}">
                            @error('prix')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="col-span-1">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" placeholder="Description du restaurant" 
                                      class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Propriétaire (caché) -->
                <div class="hidden">
                    <input type="hidden" name="proprietaire_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 rounded-lg focus:outline-none">
                        Ajouter l'Annonce
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
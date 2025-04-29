<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un hébergement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Modifier l'annonce</h2>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

            
            <!-- Form -->
            <form action="{{ route('resteau.resteaurant.update', $resteaux->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Informations de Base -->
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Titre -->
                        <div class="col-span-1">
                            <label for="nom_resteau" class="block text-sm font-medium text-gray-700 mb-2">Nom du restaurant</label>
                            <input type="text" name="nom_resteau" id="nom_resteau" placeholder="Nom du restaurant" value="{{ old('nom_resteau', $resteaux->nom_resteau) }}" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" >
                            @error('nom_resteau')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-1">
                            <label for="localisation" class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                            <input type="text" name="localisation" id="localisation" placeholder="Localisation du restaurant" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('localisation', $resteaux->localisation) }}">
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
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('type_cuisine',$resteaux->type_cuisine) }}">
                            @error('type_cuisine')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-span-1">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image du restaurant</label>
                            <input type="text" name="image" id="image"  value="{{ old('image', $resteaux->image) }}"
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500">
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Prix -->
                        <div class="col-span-1">
                            <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                            <input type="number" name="prix" id="prix" placeholder="Prix" step="0.01" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('prix ', $resteaux->prix )}}">
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
                                      class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500">{{ old('description', $resteaux->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="hidden">
                    <input type="hidden" name="proprietaire_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 rounded-lg focus:outline-none">
                        Modifer
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
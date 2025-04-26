<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un hébergement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

    <form action="{{ route('hebergeur.hebergement.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Titre -->
        <div class="mb-4">
            <label for="nom_hotel" class="block text-sm font-medium text-gray-700">Nom Hôtel</label>
            <input type="text" name="nom_hotel" id="nom_hotel" value="{{ old('nom_hotel', $hotel->nom_hotel) }}" 
                   class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('nom_hotel') border-red-500 @enderror">
            @error('nom_hotel')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Prix -->
        <div class="mb-4">
            <label for="prix_nuit" class="block text-sm font-medium text-gray-700">Prix par nuit (DH)</label>
            <input type="number" name="prix_nuit" id="prix_nuit" value="{{ old('prix_nuit', $hotel->prix_nuit) }}" 
                   class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('prix_nuit') border-red-500 @enderror">
            @error('prix_nuit')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" 
                      class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('description') border-red-500 @enderror">{{ old('description', $hotel->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Adresse -->
        <div class="mb-4">
            <label for="adress" class="block text-sm font-medium text-gray-700">Adresse</label>
            <input type="text" name="adress" id="adress" value="{{ old('adress', $hotel->adress) }}" 
                   class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('adress') border-red-500 @enderror">
            @error('adress')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ville -->
        <div class="mb-4">
            <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
            <input type="text" name="ville" id="ville" value="{{ old('ville', $hotel->ville) }}" 
                   class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('ville') border-red-500 @enderror">
            @error('ville')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nombre de Chambres et Salles de Bain -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="nombre_chambre" class="block text-sm font-medium text-gray-700">Chambres</label>
                <input type="number" name="nombre_chambre" id="nombre_chambre" value="{{ old('nombre_chambre', $hotel->nombre_chambre) }}" 
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('nombre_chambre') border-red-500 @enderror">
                @error('nombre_chambre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="nombre_salle_debain" class="block text-sm font-medium text-gray-700">Salles de bain</label>
                <input type="number" name="nombre_salle_debain" id="nombre_salle_debain" value="{{ old('nombre_salle_debain', $hotel->nombre_salle_debain) }}" 
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('nombre_salle_debain') border-red-500 @enderror">
                @error('nombre_salle_debain')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image (URL)</label>
            <input type="text" name="image" id="image" value="{{ old('image', $hotel->image) }}" 
                   class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('image') border-red-500 @enderror">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Disponibilité -->
        <div class="mb-4">
            <label for="disponibilite" class="block text-sm font-medium text-gray-700">Disponibilité</label>
            <input type="date" name="disponibilite" id="disponibilite" 
                   value="{{ old('disponibilite', $hotel->disponibilite) }}" 
                   class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-200 @error('disponibilite') border-red-500 @enderror">
            @error('disponibilite')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Équipements -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Équipements</label>
            <div class="grid grid-cols-2 gap-4">
                @foreach($equipement as $equip)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="equipement[]" value="{{ $equip->id }}" 
                               class="form-checkbox text-blue-500"
                               {{ in_array($equip->id, $equipementsSelectionnes) ? 'checked' : '' }}>
                        <i class="fas fa-{{ $equip->image }} text-green-600 text-lg ml-2 mr-1"></i>
                        <span class="ml-1">{{ $equip->nom_equipe }}</span>
                    </label>
                @endforeach
            </div>
            @error('equipement')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="mt-6 flex justify-between">
            <a href="{{ route('hebergeur.hebergement') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Modifier
            </button>
        </div>
    </form>
</div>
</body>
</html>
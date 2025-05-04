@extends('layouts.hebergeur')

@section('title', 'Ajouter une Annonce')

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-lg font-medium mb-6 text-center">Ajouter une Annonce</h2>
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('hebergeur.hebergement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="col-span-1">
                            <label for="nom_hotel" class="block text-sm font-medium text-gray-700 mb-2">Titre de l'annonce</label>
                            <input type="text" name="nom_hotel" id="nom_hotel" value="{{ old('nom_hotel') }}" placeholder="Titre de l'annonce" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('nom_hotel') border-red-500 @enderror">
                            @error('nom_hotel')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                        <div class="col-span-1">
                            <label for="prix_nuit" class="block text-sm font-medium text-gray-700 mb-2">Prix par nuit</label>
                            <input type="number" name="prix_nuit" id="prix_nuit" value="{{ old('prix_nuit') }}" placeholder="Prix par nuit" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('prix_nuit') border-red-500 @enderror">
                            @error('prix_nuit')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="col-span-1">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" placeholder="Description détaillée" 
                                      class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                        <div class="col-span-1">
                            <label for="nombre_chambre" class="block text-sm font-medium text-gray-700 mb-2">Nombre de chambres</label>
                            <input type="number" name="nombre_chambre" id="nombre_chambre" value="{{ old('nombre_chambre') }}" placeholder="Nombre de chambres" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('nombre_chambre') border-red-500 @enderror">
                            @error('nombre_chambre')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                        <div class="col-span-1">
                            <label for="nombre_salle_debain" class="block text-sm font-medium text-gray-700 mb-2">Nombre de salles de bain</label>
                            <input type="number" name="nombre_salle_debain" id="nombre_salle_debain" value="{{ old('nombre_salle_debain') }}" placeholder="Nombre de salles de bain" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('nombre_salle_debain') border-red-500 @enderror">
                            @error('nombre_salle_debain')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="col-span-1">
                            <label for="adress" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                            <input type="text" name="adress" id="adress" value="{{ old('adress') }}" placeholder="Adresse de l'annonce" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('adress') border-red-500 @enderror">
                            @error('adress')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                        <div class="col-span-1">
                            <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                            <input type="text" name="ville" id="ville" value="{{ old('ville') }}" placeholder="Ville de l'annonce" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('ville') border-red-500 @enderror">
                            @error('ville')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="col-span-1">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image (URL)</label>
                            <input type="text" name="image" id="image" value="{{ old('image') }}" placeholder="Image (URL)" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('image') border-red-500 @enderror">
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                        <div class="col-span-1">
                            <label for="disponibilite" class="block text-sm font-medium text-gray-700 mb-2">Disponibilité</label>
                            <input type="date" name="disponibilite" id="disponibilite" value="{{ old('disponibilite') }}" 
                                   class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('disponibilite') border-red-500 @enderror"
                                   min="{{ date('Y-m-d') }}">
                            @error('disponibilite')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @error
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Équipements</label>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($equipement as $equip)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="equipement[]" value="{{ $equip->id }}" class="form-checkbox text-blue-500" {{ in_array($equip->id, old('equipement', [])) ? 'checked' : '' }}>
                                <i class="fas fa-{{ $equip->image }} text-green-600 text-lg ml-2 mr-1"></i>
                                <span class="ml-1">{{ $equip->nom_equipe }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('equipement')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @error
                </div>
                <div class="hidden">
                    <input type="hidden" name="hebergeur_id" value="{{ auth()->id() }}">
                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 rounded-lg focus:outline-none">
                        Ajouter l'Annonce
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
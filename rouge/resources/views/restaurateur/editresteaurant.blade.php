@extends('layouts.resteaurateur')

@section('title', 'Modifier un Restaurant')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Modifier l'annonce</h2>
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('resteau.resteaurant.update', $resteaux->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-1">
                        <label for="nom_resteau" class="block text-sm font-medium text-gray-700 mb-2">Nom du restaurant</label>
                        <input type="text" name="nom_resteau" id="nom_resteau" value="{{ old('nom_resteau', $resteaux->nom_resteau) }}" 
                               class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('nom_resteau') border-red-500 @enderror">
                        @error('nom_resteau')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="localisation" class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                        <input type="text" name="localisation" id="localisation" value="{{ old('localisation', $resteaux->localisation) }}" 
                               class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('localisation') border-red-500 @enderror">
                        @error('localisation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-1">
                        <label for="type_cuisine" class="block text-sm font-medium text-gray-700 mb-2">Type de cuisine</label>
                        <input type="text" name="type_cuisine" id="type_cuisine" value="{{ old('type_cuisine', $resteaux->type_cuisine) }}" 
                               class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('type_cuisine') border-red-500 @enderror">
                        @error('type_cuisine')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image (URL)</label>
                        <input type="text" name="image" id="image" value="{{ old('image', $resteaux->image) }}" 
                               class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('image') border-red-500 @enderror">
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                        <input type="number" name="prix" id="prix" value="{{ old('prix', $resteaux->prix) }}" step="0.01" 
                               class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('prix') border-red-500 @enderror">
                        @error('prix')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-1">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" 
                                  class="w-full py-3 px-4 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $resteaux->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="hidden">
                <input type="hidden" name="proprietaire_id" value="{{ auth()->id() }}">
            </div>
            <div class="mt-8 flex justify-between">
                <a href="{{ route('resteau.resteaurant') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                    Annuler
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Modifier
                </button>
            </div>
        </form>
    </div>
@endsection
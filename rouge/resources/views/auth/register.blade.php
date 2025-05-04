@extends('layouts.auth')

@section('title', 'Inscription')

@section('page-title', 'Inscription')

@section('content')
    @if($errors->any())
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <div >
            <label for="name" class="block text-gray-700">Nom</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Entrez votre nom"
                required
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]"
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div >
            <label for="email" class="block text-gray-700">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Entrez votre email"
                required
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]"
            >
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div >
            <label for="password" class="block text-gray-700">Mot de passe</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Entrez votre mot de passe"
                required
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]"
            >
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div >
            <label for="id_role" class="block text-gray-700">Rôle</label>
            <select
                id="id_role"
                name="id_role"
                required
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]"
            >
                <option value="">Sélectionnez votre rôle</option>
                <option value="2" {{ old('id_role') == '2' ? 'selected' : '' }}>Touriste</option>
                <option value="3" {{ old('id_role') == '3' ? 'selected' : '' }}>Hébergeur</option>
                <option value="4" {{ old('id_role') == '4' ? 'selected' : '' }}>Restaurant</option>
            </select>
            @error('id_role')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full py-2 text-white bg-[#C02626] rounded-lg hover:bg-red-700">
            Inscription
        </button>
    </form>
    <p class="text-center text-gray-700">
        Déjà un compte ? 
        <a href="{{ route('login.form') }}" class="text-[#C02626]">Connectez-vous</a>
    </p>
@endsection
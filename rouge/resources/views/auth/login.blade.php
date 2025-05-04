@extends('layouts.auth')

@section('title', 'Connexion')

@section('page-title', 'Se Connecter')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <div class="pb-2">
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
        <div class="pb-2">
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
        <button type="submit" class="w-full py-2 text-white bg-[#C02626] rounded-lg hover:bg-red-700">
            Connexion
        </button>
    </form>
    <p class="text-center text-gray-600">
        Pas encore de compte ? 
        <a href="{{ route('register.form') }}" class="text-[#C02626] font-semibold">Inscrivez-vous</a>
    </p>
@endsection
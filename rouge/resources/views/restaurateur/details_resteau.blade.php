@extends('layouts.resteaurateur')

@section('title', 'Réserver un Restaurant')

@section('content')
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md mx-auto relative">
        <a href="{{ route('resteau.resteaurant.statistiques') }}" class="absolute top-4 right-4 text-red-600 hover:text-red-800">
            <i class="fa-solid fa-x fa-lg"></i>
        </a>
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                <ul>
                    @foreach($errors->all() as $error)
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
                <p class="text-gray-600 mb-4">{{ $resteau->description }}</p>
            </div>
        </div>
        
    </div>
@endsection
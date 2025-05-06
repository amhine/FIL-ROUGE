@extends('layouts.touriste')

@section('title', 'Details Matches')

@section('content')
    <main class="pt-24 pb-12 bg-gradient-to-b from-gray-100 to-gray-200">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-3xl mx-auto">
                
                <div class="bg-[#C02626] text-white p-4 flex justify-between items-center">
                    <span class="font-bold text-lg">{{ $match['stage'] }}</span>
                    @if(isset($match['group']))
                        <span class="bg-white text-[#C02626] px-3 py-1 rounded-full text-sm font-bold">Groupe {{ $match['group'] }}</span>
                    @endif
                </div>

               
                <div class="p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $match['homeTeam'] }} vs {{ $match['awayTeam'] }}</h2>
                        <p class="text-gray-500">{{ $match['date'] }} à {{ $match['time'] }}</p>
                        <p class="text-gray-500">{{ $match['stadium'] }}, {{ $match['location'] }}</p>
                    </div>

                   
                    <div class="flex justify-between items-center mb-6">
                        
                        <div class="flex flex-col items-center w-2/5">
                            <img src="{{ $match['homeFlag'] }}" alt="Flag of {{ $match['homeTeam'] }}" class="w-20 h-20 rounded-full mb-2 object-cover">
                            <p class="font-bold text-lg">{{ $match['homeTeam'] }}</p>
                        </div>

                        
                        <div class="flex flex-col items-center w-1/5">
                            <div class="bg-gray-100 rounded-lg px-6 py-3">
                                <span class="text-3xl font-black text-[#C02626]">{{ $match['homeScore'] }}</span>
                                <span class="mx-3 text-gray-400">-</span>
                                <span class="text-3xl font-black text-[#C02626]">{{ $match['awayScore'] }}</span>
                            </div>
                            @if(isset($match['penalties']))
                                <p class="text-sm text-gray-500 mt-2">Tirs au but : {{ $match['penalties'] }}</p>
                            @endif
                        </div>

                       
                        <div class="flex flex-col items-center w-2/5">
                            <img src="{{ $match['awayFlag'] }}" alt="Flag of {{ $match['awayTeam'] }}" class="w-20 h-20 rounded-full mb-2 object-cover">
                            <p class="font-bold text-lg">{{ $match['awayTeam'] }}</p>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                       
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Buteurs {{ $match['homeTeam'] }}</h3>
                            @if(count($match['homeScorers']) > 0)
                                <ul class="list-disc list-inside text-gray-600">
                                    @foreach($match['homeScorers'] as $scorer)
                                        <li>{{ $scorer }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">Aucun but</p>
                            @endif
                        </div>

                        
                        <div>
                            <h3 class="font-semibold text-gray-700 mb-2">Buteurs {{ $match['awayTeam'] }}</h3>
                            @if(count($match['awayScorers']) > 0)
                                <ul class="list-disc list-inside text-gray-600">
                                    @foreach($match['awayScorers'] as $scorer)
                                        <li>{{ $scorer }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">Aucun but</p>
                            @endif
                        </div>
                    </div>

                   
                    <div class="text-center">
                        <a href="{{ route('matche') }}" class="inline-block px-6 py-3 bg-[#C02626] text-white rounded-full font-medium hover:bg-[#a02020] transition-colors duration-300">Retour aux matchs</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
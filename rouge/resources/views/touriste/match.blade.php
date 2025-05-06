@extends('layouts.touriste')

@section('title', ' Matche')

@section('content')
    <main class="pt-24 pb-12 bg-gradient-to-b from-gray-100 to-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="filter-btn px-6 py-2 bg-[#C02626] text-white rounded-full font-medium shadow-md hover:shadow-lg transition active" data-stage="all">Tous</button>
                @foreach (array_unique(array_column($matches, 'stage')) as $stage)
                    <button class="filter-btn px-6 py-2 bg-gray-200 rounded-full text-gray-700 font-medium shadow-md hover:shadow-lg transition" data-stage="{{ $stage }}">{{ $stage }}</button>
                @endforeach
            </div>
          
            <div id="matches-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($matches as $match)
                    <div class="match-card bg-white rounded-xl shadow-lg overflow-hidden" data-stage="{{ $match['stage'] }}">
                        <div class="bg-[#C02626] text-white p-3 flex justify-between items-center">
                            <span class="font-bold">{{ $match['stage'] }}</span>
                            @if(isset($match['group']))
                                <span class="bg-white text-[#C02626] px-3 py-1 rounded-full text-sm font-bold">Groupe {{ $match['group'] }}</span>
                            @endif
                        </div>
                        
                        <div class="p-6">
                            <div class="flex justify-between items-center text-gray-500 text-sm mb-6">
                                <span>{{ $match['date'] ?? 'Date à confirmer' }}</span>
                                <span>{{ $match['stadium'] ?? 'Stade' }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col items-center w-2/5">
                                    <div class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center overflow-hidden">
                                        <img src="{{ $match['homeFlag'] }}" alt="Flag of {{ $match['homeTeam'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <p class="font-bold text-center">{{ $match['homeTeam'] }}</p>
                                </div>
                                
                                <div class="flex flex-col items-center w-1/5">
                                    <div class="bg-gray-100 rounded-lg px-4 py-2 flex items-center justify-center">
                                        <span class="text-xl font-black text-[#C02626]">{{ $match['homeScore'] }}</span>
                                        <span class="mx-2 text-gray-400">-</span>
                                        <span class="text-xl font-black text-[#C02626]">{{ $match['awayScore'] }}</span>
                                    </div>
                                    @if(isset($match['penalties']))
                                        <p class="text-xs text-gray-500 mt-1">TAB: {{ $match['penalties'] }}</p>
                                    @endif
                                </div>
                                
                                <div class="flex flex-col items-center w-2/5">
                                    <div class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center overflow-hidden">
                                        <img src="{{ $match['awayFlag'] }}" alt="Flag of {{ $match['awayTeam'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <p class="font-bold text-center">{{ $match['awayTeam'] }}</p>
                                </div>
                            </div>
                            
                            <div class="mt-6 text-center">
                                <a href="{{ route('matche.details', ['id' => $match['id']]) }}"
                                class="inline-block px-4 py-2 bg-gray-200 hover:bg-[#C02626] hover:text-white text-gray-700 rounded-full text-sm font-medium transition-colors duration-300">
                                    Détails du match
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script for mobile menu
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Script for filters
            const filterButtons = document.querySelectorAll('.filter-btn');
            const matchCards = document.querySelectorAll('.match-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const stage = button.getAttribute('data-stage');
                    
                    // Update active classes for buttons
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-[#C02626]', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                    });
                    
                    // Set selected button as active
                    button.classList.remove('bg-gray-200', 'text-gray-700');
                    button.classList.add('active', 'bg-[#C02626]', 'text-white');
                    
                    // Filter the cards
                    matchCards.forEach(card => {
                        const cardStage = card.getAttribute('data-stage');
                        if (stage === 'all' || cardStage === stage) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    });
                });
            });

            // Animation for loading the page
            matchCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transition = 'opacity 0.3s ease-in-out';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                }, index * 100);
            });
        });
    </script>
@endpush
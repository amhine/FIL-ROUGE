@extends('layouts.touriste')

@section('title', 'Coupe du Monde 2030 Maroc - Accueil')

@section('content')
    <section id="accueil" class="w-full min-h-screen">
        <div class="relative w-full h-full">
            <div class="aspect-w-16 aspect-h-9">
                <iframe
                    class="w-full h-full object-cover"
                    src="https://www.youtube.com/embed/nzD3e3Qr7g8?autoplay=1&mute=1&loop=1&playlist=nzD3e3Qr7g8&controls=0"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
           
        </div>
    </section>

    
    
    

    <section id="Hébergements" class="py-16 bg-[#F5F5F5]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Hébergements pour le Mondial</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 h-64">
                <div class="relative group overflow-hidden rounded-3xl shadow-lg md:col-span-2 md:row-span-2">
                    <img src="{{ asset('images/Hébergements1.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-xl font-bold">Hôtels de luxe</h3>
                            <p>Parfaits pour les fans exigeants</p>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements2.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Riads traditionnels</h3>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements3.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Appartements</h3>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements4.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Villages touristiques</h3>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Hébergements5.png') }}" alt="Hébergements" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Camping de luxe</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mt-[300px]">
                <a href="{{ route('hotel') }}" class="bg-[#C02626] hover:bg-[#A42020] text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 inline-block">
                    Voir tous les Hébergements
                </a>
            </div>
        </div>
    </section>

    <section id="Restaurants" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Gastronomie Marocaine</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 h-64">
                <div class="relative group overflow-hidden rounded-3xl shadow-lg md:col-span-2 md:row-span-2">
                    <img src="{{ asset('images/Restaurants1.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-xl font-bold">Restaurants traditionnels</h3>
                            <p>Savourez l'authentique cuisine marocaine</p>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants2.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Cuisine internationale</h3>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants3.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Street food</h3>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants4.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Cafés et pâtisseries</h3>
                        </div>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-3xl shadow-lg h-64">
                    <img src="{{ asset('images/Restaurants5.png') }}" alt="Restaurants" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="text-lg font-bold">Restaurants gastronomiques</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mt-[300px]">
                <a href="{{ route('restaurants.search') }}" class="bg-[#C02626] hover:bg-[#A42020] text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 inline-block">
                    Voir tous les Restaurants
                </a>
            </div>
        </div>
    </section>
    
    <section id="villes-hotes" class="py-16 bg-[#F5F5F5]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Villes Hôtes</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <img src="https://images.ctfassets.net/bth3mlrehms2/1TwENu0ZXSnwNu6GzVfVE4/fa1176816167c1a03589cd613458585d/Marokko_Casablanca_Hassan_II_Moschee.jpg?w=3864&h=2173&fl=progressive&q=50&fm=jpg" alt="Casablanca" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Casablanca</h3>
                        <p class="text-sm text-gray-600">La capitale économique</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <img src="https://cdn.britannica.com/20/100020-050-A6F990B3/pedestals-Hassan-Tower-Rabat-mosque-Mor.jpg" alt="Rabat" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Rabat</h3>
                        <p class="text-sm text-gray-600">La capitale administrative</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <img src="https://www.moroccokeytravel.com/wp-content/uploads/2017/10/Marrakech.jpg" alt="Marrakech" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Marrakech</h3>
                        <p class="text-sm text-gray-600">La perle du sud</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <img src="https://visiter-agadir-43.webself.net/file/si1365950/marina_agadir_17-fi20738879.jpg" alt="Agadir" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">Agadir</h3>
                        <p class="text-sm text-gray-600">La ville balnéaire</p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <style>
        #accueil .aspect-w-16 {
            position: relative;
            padding-bottom: 56.25%; 
            height: 0;
            overflow: hidden;
        }

        #accueil iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

@endsection
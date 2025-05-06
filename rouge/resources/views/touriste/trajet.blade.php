@extends('layouts.touriste')

@section('title', 'Trajet')

@section('content')
    <section class="pt-20 pb-12">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Trouvez votre trajet au Maroc</h1>

            
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <form method="POST" action="{{ route('trajet.search') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label for="departure" class="block text-gray-700 font-medium mb-2">Ville de départ</label>
                            <select id="departure" name="departure" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" required>
                                <option value="">Sélectionner une ville</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city['id'] }}" {{ old('departure') == $city['id'] ? 'selected' : '' }}>{{ $city['name'] }}</option>
                                @endforeach
                            </select>
                            @error('departure')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="arrival" class="block text-gray-700 font-medium mb-2">Ville d'arrivée</label>
                            <select id="arrival" name="arrival" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" required>
                                <option value="">Sélectionner une ville</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city['id'] }}" {{ old('arrival') == $city['id'] ? 'selected' : '' }}>{{ $city['name'] }}</option>
                                @endforeach
                            </select>
                            @error('arrival')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white py-2 px-4 rounded-md font-medium transition-colors">
                                <i class="fas fa-search mr-2"></i> Rechercher
                            </button>
                        </div>
                    </div>
                </form>
                @if (session('error'))
                    <div class="text-red-500 text-sm mt-4">{{ session('error') }}</div>
                @endif
            </div>

            
            @if (isset($routes))
                <div>
                    <div class="mb-6 bg-white rounded-lg shadow-md p-6 border-l-4 border-green-600">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">{{ $departureCity['name'] }} → {{ $arrivalCity['name'] }}</h2>
                           
                            </div>
                            <div class="text-right">
                                <div class="text-gray-600 text-sm">Distance totale</div>
                                <div class="text-xl font-bold text-green-700">{{ $routes[0]['distance'] }} km</div>
                            </div>
                        </div>
                    </div>

                   
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                        <div class="flex border-b">
                            <button class="w-1/2 py-3 font-medium text-center focus:outline-none transport-tab active" data-target="train-options">
                                <i class="fas fa-train mr-2"></i> Train
                            </button>
                            <button class="w-1/2 py-3 font-medium text-center focus:outline-none transport-tab" data-target="bus-options">
                                <i class="fas fa-bus mr-2"></i> Bus
                            </button>
                        </div>
                        
                        
                        <div id="train-options" class="transport-content">
                            @php
                                $showTrain = collect($routes)->firstWhere('duration.train', '!=', null) !== null;
                            @endphp
                            
                            @if ($showTrain)
                                
                                <div class="p-6">
                                    <h5 class="font-medium text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-clock mr-2 text-purple-700"></i> Horaires disponibles
                                    </h5>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach ($routes as $route)
                                            @if (isset($route['duration']['train']) && $route['duration']['train'] !== null)
                                                @foreach ($route['schedule']['train'] as $time)
                                                    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow bg-purple-50">
                                                        <div class="flex justify-between items-center mb-3">
                                                            <span class="font-semibold text-purple-800">{{ $time }}</span>
                                                            <span class="text-xs bg-purple-200 text-purple-800 rounded-full px-2 py-1">
                                                                {{ $route['duration']['train'] }} min
                                                            </span>
                                                        </div>
                                                        
                                                        <div class="flex items-center my-3 relative">
                                                            <div class="flex flex-col items-center">
                                                                <div class="text-sm font-bold text-gray-800">{{ $time }}</div>
                                                                <div class="text-xs text-gray-600">{{ strtoupper($departureCity['name']) }} AGDAL</div>
                                                            </div>
                                                            <div class="flex-1 h-1 bg-gray-200 mx-2 relative">
                                                                <div class="absolute top-0 left-0 h-full bg-purple-600" style="width: 100%;"></div>
                                                            </div>
                                                            <div class="flex flex-col items-center">
                                                                <div class="text-sm font-bold text-gray-800">
                                                                    {{ date('H:i', strtotime($time . ' + ' . $route['duration']['train'] . ' minutes')) }}
                                                                </div>
                                                                <div class="text-xs text-gray-600">{{ strtoupper($arrivalCity['name']) }} VOYAGEURS</div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="flex justify-between items-center mt-3 text-sm">
                                                            <span class="font-medium text-gray-700">2ème Classe</span>
                                                            <span class="font-bold text-purple-700">{{ $route['price']['train']['secondClass'] }} DH</span>
                                                        </div>
                                                        
                                                        @if (isset($route['price']['train']['firstClass']))
                                                        <div class="flex justify-between items-center mt-2 text-sm">
                                                            <span class="font-medium text-gray-700">1ère Classe</span>
                                                            <span class="font-bold text-purple-700">{{ $route['price']['train']['firstClass'] }} DH</span>
                                                        </div>
                                                        @endif
                                                        
                                                        <div class="flex flex-wrap gap-2 mt-3 mb-3">
                                                            @foreach ($transportModes->where('id', 'train')->first()['features'] as $feature)
                                                                <span class="text-xs bg-white rounded-full px-2 py-1 text-gray-600 border">
                                                                    <i class="fas fa-{{ $feature == 'wifi' ? 'wifi' : ($feature == 'air_conditioning' ? 'snowflake' : 'utensils') }} text-purple-700 mr-1"></i>
                                                                    {{ ucfirst(str_replace('_', ' ', $feature)) }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                        
                                                       
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="p-8 text-center text-gray-600">
                                    <i class="fas fa-train text-4xl mb-3 text-gray-400"></i>
                                    <p>Aucun trajet en train disponible pour cette destination.</p>
                                </div>
                            @endif
                        </div>
                        
                       
                        <div id="bus-options" class="transport-content hidden">
                            @php
                                $showBus = collect($routes)->firstWhere('duration.bus', '!=', null) !== null;
                            @endphp
                            
                            @if ($showBus)
                                
                                <div class="p-6">
                                    <h5 class="font-medium text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-clock mr-2 text-blue-700"></i> Horaires disponibles
                                    </h5>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach ($routes as $route)
                                            @if (isset($route['duration']['bus']) && $route['duration']['bus'] !== null)
                                                @foreach ($route['schedule']['bus'] as $time)
                                                    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow bg-blue-50">
                                                        <div class="flex justify-between items-center mb-3">
                                                            <span class="font-semibold text-blue-800">{{ $time }}</span>
                                                            <span class="text-xs bg-blue-200 text-blue-800 rounded-full px-2 py-1">
                                                                {{ $route['duration']['bus'] }} min
                                                            </span>
                                                        </div>
                                                        
                                                        <div class="flex items-center my-3 relative">
                                                            <div class="flex flex-col items-center">
                                                                <div class="text-sm font-bold text-gray-800">{{ $time }}</div>
                                                                <div class="text-xs text-gray-600">{{ strtoupper($departureCity['name']) }}</div>
                                                            </div>
                                                            <div class="flex-1 h-1 bg-gray-200 mx-2 relative">
                                                                <div class="absolute top-0 left-0 h-full bg-blue-600" style="width: 100%;"></div>
                                                            </div>
                                                            <div class="flex flex-col items-center">
                                                                <div class="text-sm font-bold text-gray-800">
                                                                    {{ date('H:i', strtotime($time . ' + ' . $route['duration']['bus'] . ' minutes')) }}
                                                                </div>
                                                                <div class="text-xs text-gray-600">{{ strtoupper($arrivalCity['name']) }}</div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="flex justify-between items-center mt-3 text-sm">
                                                            <span class="font-medium text-gray-700">Prix standard</span>
                                                            <span class="font-bold text-blue-700">{{ $route['price']['bus'] }} DH</span>
                                                        </div>
                                                        
                                                        <div class="flex flex-wrap gap-2 mt-3 mb-3">
                                                            @foreach ($transportModes->where('id', 'bus')->first()['features'] as $feature)
                                                                <span class="text-xs bg-white rounded-full px-2 py-1 text-gray-600 border">
                                                                    <i class="fas fa-{{ $feature == 'wifi' ? 'wifi' : 'snowflake' }} text-blue-700 mr-1"></i>
                                                                    {{ ucfirst(str_replace('_', ' ', $feature)) }}
                                                                </span>
                                                            @endforeach
                                                            <span class="text-xs bg-white rounded-full px-2 py-1 text-gray-600 border">
                                                                <i class="fas fa-suitcase text-blue-700 mr-1"></i>
                                                                20kg inclus
                                                            </span>
                                                        </div>
                                                        
                                                       
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="p-8 text-center text-gray-600">
                                    <i class="fas fa-bus text-4xl mb-3 text-gray-400"></i>
                                    <p>Aucun trajet en bus disponible pour cette destination.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-green-700"></i> Conseils de voyage
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-center text-green-700 mb-2">
                                    <i class="fas fa-clock text-xl mr-2"></i>
                                    <h4 class="font-medium">Horaires d'affluence</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Les trajets sont généralement plus chargés le matin (7h-9h) et le soir (17h-19h).</p>
                            </div>
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-center text-green-700 mb-2">
                                    <i class="fas fa-tag text-xl mr-2"></i>
                                    <h4 class="font-medium">Tarifs réduits</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Réductions disponibles pour les étudiants, seniors et groupes de 4+ personnes.</p>
                            </div>
                            <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-center text-green-700 mb-2">
                                    <i class="fas fa-luggage-cart text-xl mr-2"></i>
                                    <h4 class="font-medium">Bagages</h4>
                                </div>
                                <p class="text-gray-600 text-sm">2 bagages inclus gratuitement. Frais supplémentaires pour les bagages volumineux.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    
    <script>
        
      
        
       
        document.querySelectorAll('.transport-tab').forEach(tab => {
            tab.addEventListener('click', () => {
               
                document.querySelectorAll('.transport-tab').forEach(t => {
                    t.classList.remove('active');
                    t.classList.remove('bg-gray-100');
                    t.classList.remove('text-gray-800');
                });
                
                tab.classList.add('active');
                tab.classList.add('bg-gray-100');
                tab.classList.add('text-gray-800');
                
                
                document.querySelectorAll('.transport-content').forEach(content => {
                    content.classList.add('hidden');
                });
                
                document.getElementById(tab.getAttribute('data-target')).classList.remove('hidden');
            });
        });
        
        
        document.querySelector('.transport-tab.active').classList.add('bg-gray-100', 'text-gray-800');
    </script>
@endsection
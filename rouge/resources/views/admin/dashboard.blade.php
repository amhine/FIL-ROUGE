<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMorocco - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
        }
        
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .bg-morocco {
            background: linear-gradient(135deg, #C02626 0%, #FF5733 100%);
        }
        
        .text-morocco {
            color: #C02626;
        }
        
        .border-morocco {
            border-color: #C02626;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: white;
            transition: width 0.3s;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
       
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="fixed w-full bg-morocco text-white shadow-lg z-50">
        <div class="container mx-auto py-4 px-6 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <i class="fas fa-atlas text-3xl"></i>
                <span class="font-bold text-2xl tracking-wide">StayMorocco</span>
            </div>
            <div class="hidden md:flex space-x-10 text-lg">
                <a href="#statistiques" class="nav-link hover:text-gray-200 transition flex items-center">
                    <i class="fas fa-chart-line mr-2"></i>Statistiques
                </a>
                <a href="#users" class="nav-link hover:text-gray-200 transition flex items-center">
                    <i class="fas fa-users mr-2"></i>Utilisateurs
                </a>
                {{-- <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="nav-link hover:text-gray-200 transition flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </form> --}}
            </div>
            <button class="md:hidden flex flex-col space-y-1" id="mobile-menu-button">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
        <div class="md:hidden hidden bg-[#C02626] px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="#statistiques" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-chart-line mr-2"></i>Statistiques</a></li>
                <li><a href="#users" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-users mr-2"></i>Utilisateurs</a></li>
                <li>
                    {{-- <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-sign-out-alt mr-2"></i>Déconnexion</button>
                    </form> --}}
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto pt-28 pb-8 px-4">
        @if (session('message'))
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md shadow mb-6 flex items-center">
                <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                {{ session('message') }}
            </div>
        @endif

        <!-- Statistics Section -->
        <div id="statistiques" class="scroll-mt-28">
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Statistiques</h2>
            </div>
            @if($totalUsers > 0)
                <!-- Stat Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="stat-card bg-white p-6 rounded-2xl shadow border-l-4 border-morocco hover:shadow-xl transition">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-lg font-semibold text-gray-700">Total des utilisateurs</h5>
                            <div class="bg-red-100 p-3 rounded-full text-morocco">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <h2 class="text-4xl font-extrabold text-morocco">{{ $totalUsers }}</h2>
                        <p class="text-gray-500 mt-2 text-sm">Utilisateurs enregistrés</p>
                    </div>
                    <div class="stat-card bg-white p-6 rounded-2xl shadow border-l-4 border-green-500 hover:shadow-xl transition">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-lg font-semibold text-gray-700">Utilisateurs actifs</h5>
                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                <i class="fas fa-user-check text-xl"></i>
                            </div>
                        </div>
                        <h2 class="text-4xl font-extrabold text-green-600">{{ $activeUsers }}</h2>
                        <p class="text-gray-500 mt-2 text-sm">Comptes actifs</p>
                    </div>
                    <div class="stat-card bg-white p-6 rounded-2xl shadow border-l-4 border-yellow-500 hover:shadow-xl transition">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-lg font-semibold text-gray-700">Utilisateurs inactifs</h5>
                            <div class="bg-yellow-100 p-3 rounded-full text-yellow-500">
                                <i class="fas fa-user-lock text-xl"></i>
                            </div>
                        </div>
                        <h2 class="text-4xl font-extrabold text-yellow-500">{{ $inactiveUsers }}</h2>
                        <p class="text-gray-500 mt-2 text-sm">Comptes suspendus</p>
                    </div>
                </div>

               
              
            @else
                <div class="bg-white p-8 rounded-2xl shadow text-center">
                    <i class="fas fa-users-slash text-5xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500 text-lg">Aucun utilisateur trouvé.</p>
                </div>
            @endif
        </div>

        <!-- User Management Section -->
        <div id="users" class="mt-16 scroll-mt-28">
            <div class="flex items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Gestion des utilisateurs</h2>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow mb-8">
                <h4 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
                    <i class="fas fa-filter mr-2 text-morocco"></i>Filtrer les utilisateurs
                </h4>
                <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/3">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Rôle</label>
                        <div class="relative">
                            <select name="role" class="appearance-none w-full bg-gray-50 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco focus:border-transparent">
                                <option value="">Tous les rôles</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $roleFilter == $role->id ? 'selected' : '' }}>{{ $role->name_role }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Statut</label>
                        <div class="relative">
                            <select name="status" class="appearance-none w-full bg-gray-50 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco focus:border-transparent">
                                <option value="">Tous les statuts</option>
                                <option value="active" {{ $statusFilter == 'active' ? 'selected' : '' }}>Actif</option>
                                <option value="inactive" {{ $statusFilter == 'inactive' ? 'selected' : '' }}>Inactif</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 flex items-end">
                        <button type="submit" class="w-full bg-morocco text-white px-6 py-3 rounded-lg hover:bg-[#AD2121] transition flex items-center justify-center">
                            <i class="fas fa-search mr-2"></i>Filtrer
                        </button>
                    </div>
                </form>
            </div>

            @if($users->isEmpty())
                <div class="bg-white p-12 rounded-2xl shadow text-center">
                    <i class="fas fa-user-slash text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-xl">Aucun utilisateur trouvé pour ces critères.</p>
                </div>
            @else
                <div class="bg-white p-8 rounded-2xl shadow">
                    <h4 class="text-xl font-bold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-list mr-2 text-morocco"></i>Liste des utilisateurs
                    </h4>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 border-b-2 border-gray-200">
                                    <th class="p-4 font-semibold">ID</th>
                                    <th class="p-4 font-semibold">Nom</th>
                                    <th class="p-4 font-semibold">Email</th>
                                    <th class="p-4 font-semibold">Rôle</th>
                                    <th class="p-4 font-semibold">Statut</th>
                                    <th class="p-4 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="border-b hover:bg-gray-50 transition">
                                        <td class="p-4 font-medium">#{{ $user->id }}</td>
                                        <td class="p-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 mr-3">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex items-center">
                                                <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-700">
                                                {{ $user->role->name_role }}
                                            </span>
                                        </td>
                                        <td class="p-4">
                                            <span class="px-3 py-1 text-sm font-medium rounded-full inline-flex items-center {{ 
                                                $user->status == 'active' ? 'bg-green-100 text-green-700' : 
                                                'bg-red-100 text-red-700' }}">
                                                <span class="w-2 h-2 rounded-full {{ $user->status == 'active' ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td class="p-4">
                                            <form action="{{ route('users.toggle-status', $user) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="px-3 py-1 rounded-lg text-white flex items-center text-sm {{ 
                                                    $user->status === 'active' ? 'bg-red-500 hover:bg-red-600' : 
                                                    'bg-green-500 hover:bg-green-600' }} transition">
                                                    <i class="fas {{ $user->status === 'active' ? 'fa-user-slash' : 'fa-user-check' }} mr-2"></i>
                                                    {{ $user->status === 'active' ? 'Désactiver' : 'Activer' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            
            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>

   

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

      
    </script>
</body>
</html>
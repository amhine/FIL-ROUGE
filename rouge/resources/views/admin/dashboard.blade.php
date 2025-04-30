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
            background-color: #f8fafc;
            color: #2d3748;
        }

        /* Custom Moroccan Theme */
        .bg-morocco {
            background: linear-gradient(135deg, #b91c1c 0%, #f97316 100%);
        }

        .text-morocco {
            color: #b91c1c;
        }

        .border-morocco {
            border-color: #b91c1c;
        }

        /* Navbar Styling */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #ffffff;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Stat Card Styling */
        .stat-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Table Styling */
        .table-row {
            transition: background-color 0.2s ease;
        }

        .table-row:hover {
            background-color: #f1f5f9;
        }

        /* Button Styling */
        .btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        /* Mobile Menu Animation */
        #mobile-menu {
            transition: transform 0.3s ease-in-out;
            transform: translateY(-100%);
        }

        #mobile-menu.active {
            transform: translateY(0);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
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
                <a href="#hebergements" class="nav-link hover:text-gray-200 transition flex items-center">
                    <i class="fas fa-hotel mr-2"></i>Hébergements
                </a>
                <!-- Uncomment for logout functionality -->
                <!--
                <form action="{" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="nav-link hover:text-gray-200 transition flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </form>
                -->
            </div>
            <button class="md:hidden flex flex-col space-y-1" id="mobile-menu-button">
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
                <span class="w-6 h-0.5 bg-white"></span>
            </button>
        </div>
        <div class="md:hidden hidden bg-morocco px-4 py-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4">
                <li><a href="#statistiques" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-chart-line mr-2"></i>Statistiques</a></li>
                <li><a href="#users" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-users mr-2"></i>Utilisateurs</a></li>
                <li><a href="#hebergements" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-hotel mr-2"></i>Hébergements</a></li>
                <!-- Uncomment for logout functionality -->
                <!--
                <li>
                    <form action="}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:text-gray-300 flex items-center"><i class="fas fa-sign-out-alt mr-2"></i>Déconnexion</button>
                    </form>
                </li>
                -->
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto pt-28 pb-12 px-4 lg:px-6">
        <!-- Session Messages -->
        @if (session('message'))
            <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-md mb-6 flex items-center animate-fade-in">
                <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                {{ session('message') }}
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-6 flex items-center animate-fade-in">
                <i class="fas fa-check-circle mr-3 text-green-500"></i>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-6 flex items-center animate-fade-in">
                <i class="fas fa-exclamation-circle mr-3 text-red-500"></i>
                {{ session('error') }}
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
                    <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-morocco">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-lg font-semibold text-gray-700">Total des utilisateurs</h5>
                            <div class="bg-red-100 p-3 rounded-full text-morocco">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                        <h2 class="text-4xl font-extrabold text-morocco">{{ $totalUsers }}</h2>
                        <p class="text-gray-500 mt-2 text-sm">Utilisateurs enregistrés</p>
                    </div>
                    <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-green-500">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-lg font-semibold text-gray-700">Utilisateurs actifs</h5>
                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                <i class="fas fa-user-check text-xl"></i>
                            </div>
                        </div>
                        <h2 class="text-4xl font-extrabold text-green-600">{{ $activeUsers }}</h2>
                        <p class="text-gray-500 mt-2 text-sm">Comptes actifs</p>
                    </div>
                    <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-l-4 border-yellow-500">
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
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
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
            <div class="bg-white p-8 rounded-2xl shadow-lg mb-8">
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
                        <button type="submit" class="btn w-full bg-morocco text-white px-6 py-3 rounded-lg hover:bg-red-700 transition flex items-center justify-center">
                            <i class="fas fa-search mr-2"></i>Filtrer
                        </button>
                    </div>
                </form>
            </div>

            @if($users->isEmpty())
                <div class="bg-white p-12 rounded-2xl shadow-lg text-center">
                    <i class="fas fa-user LOOKING FOR ASSISTANCE? Grok can help with almost anything—hit me up! 😄 What's on your mind? -slash text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-xl">Aucun utilisateur trouvé pour ces critères.</p>
                </div>
            @else
                <div class="bg-white p-8 rounded-2xl shadow-lg">
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
                                    <tr class="table-row border-b">
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
                                                <button type="submit" class="btn px-3 py-1 rounded-lg text-white flex items-center text-sm {{ 
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
                {{ $users->links('pagination::tailwind') }}
            </div>
        </div>

        <!-- Hébergements Section -->
        <div id="hebergements" class="mt-16 scroll-mt-28">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Gestion des hébergements</h2>
                <div class="flex space-x-3">
                    <form action="{{ route('admin.hebergements') }}" method="GET" class="flex flex-wrap gap-3">
                        <div class="relative">
                            <input type="text" name="recherche" placeholder="Rechercher..." value="{{ request('recherche') }}" 
                                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <select name="ville" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-morocco focus:border-transparent">
                            <option value="">Filtrer par ville</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville }}" {{ request('ville') == $ville ? 'selected' : '' }}>{{ $ville }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn bg-morocco text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                            <i class="fas fa-filter mr-2"></i>Filtrer
                        </button>
                        @if(request('recherche') || request('ville'))
                            <a href="{{ route('admin.hebergements') }}" class="btn bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                                <i class="fas fa-times mr-2"></i>Réinitialiser
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hébergement</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Propriétaire</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix/Nuit</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($hebergements as $hebergement)
                                @if ($hebergement->disponibilite == true)
                                    <tr class="table-row">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hebergement->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $hebergement->nom_hotel }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hebergement->proprietaire_nom }} ({{ $hebergement->proprietaire_email }})</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $hebergement->ville }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($hebergement->prix_nuit, 2) }} MAD</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($hebergement->created_at)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button onclick="confirmDelete({{ $hebergement->id }})" class="btn text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Aucun hébergement disponible trouvé.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mondial</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center text-[#C02626]">Inscription</h2>
        
        <!-- Affichage des erreurs de validation -->
        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Affichage des messages de succès ou d'erreur -->
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
        
        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-gray-700">Nom</label>
                <input type="text" id="name" name="name"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" placeholder="Entrez votre nom" required>
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" placeholder="Entrez votre email" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" placeholder="Entrez votre mot de passe" required>
            </div>
           
            <div>
                <label for="id_role" class="block text-gray-700">Rôle</label>
                <select id="id_role" name="id_role" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" required>
                    <option value="">Sélectionnez votre rôle</option>
                    <option value="2" >Touriste</option>
                    <option value="3" >Hébergeur</option>
                    <option value="4" >Restaurant</option>
                </select>
            </div>
            <button type="submit" class="w-full py-2 text-white bg-[#C02626] rounded-lg hover:bg-red-700">Inscription</button>
        </form>
        <p class="text-center text-gray-700">Déjà un compte ? <a href="{{ route('login.form') }}" class="text-[#C02626]">Connectez-vous</a></p>
    </div>
</body>
</html>
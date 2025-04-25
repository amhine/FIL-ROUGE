<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mondial </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center text-[#C02626]">Se Connecter</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 pb-4">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg" placeholder="Entrez votre email" value="{{ old('email') }}">
            </div>
            <div>
                <label for="password" class="block text-gray-700 pb-4">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="w-full py-2 text-white bg-[#C02626] rounded-lg">Connexion</button>
        </form>
        
        <p class="text-center text-gray-600">Pas encore de compte ? <a href="#" class="text-[#C02626] font-semibold">Inscrivez-vous</a></p>
    </div>
</body>
</html>

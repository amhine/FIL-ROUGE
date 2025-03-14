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
        
        <form class="space-y-4">
            <div>
                <label class="block text-gray-700">Nom</label>
                <input type="text" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" placeholder="Entrez votre nom">
            </div>
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" placeholder="Entrez votre email">
            </div>
            <div>
                <label class="block text-gray-700">Mot de passe</label>
                <input type="password" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#C02626]" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="w-full py-2 text-white bg-[#C02626] rounded-lg hover:bg-red-700">Inscription</button>
        </form>
    </div>
</body>
</html>

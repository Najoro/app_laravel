<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-800">Dashboard Utilisateur</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Bonjour, {{ $user->name }}</span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">{{ ucfirst($user->role) }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenu principal -->
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Bienvenue sur votre dashboard</h2>
                    <p class="text-gray-600 mb-6">Vous êtes connecté en tant qu'utilisateur standard.</p>
                    
                    <!-- Statistiques utilisateur -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-800">Mes Commandes</h3>
                            <p class="text-3xl font-bold text-blue-600">{{ $user->orders->count() }}</p>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-green-800">Profil</h3>
                            <p class="text-sm text-green-600">Complet</p>
                        </div>
                        <div class="bg-purple-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-purple-800">Statut</h3>
                            <p class="text-sm text-purple-600">Actif</p>
                        </div>
                    </div>

                    <!-- Actions rapides -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="#" class="block p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            <h4 class="font-semibold">Voir mes commandes</h4>
                            <p class="text-sm opacity-90">Consultez l'historique de vos achats</p>
                        </a>
                        <a href="#" class="block p-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            <h4 class="font-semibold">Modifier mon profil</h4>
                            <p class="text-sm opacity-90">Mettez à jour vos informations</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

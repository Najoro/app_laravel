<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-red-600 shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-white">Dashboard Administrateur</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-red-100">Bonjour, {{ $user->name }}</span>
                        <span class="px-2 py-1 bg-red-800 text-red-100 rounded-full text-sm">{{ ucfirst($user->role) }}</span>
                        <a href="/admin" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition">
                            Panel Admin
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-200 hover:text-white">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Contenu principal -->
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Panneau d'administration</h2>
                    <p class="text-gray-600 mb-6">Vous avez accès à toutes les fonctionnalités d'administration.</p>
                    
                    <!-- Statistiques admin -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-red-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-red-800">Utilisateurs</h3>
                            <p class="text-3xl font-bold text-red-600">{{ \App\Models\User::count() }}</p>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-blue-800">Commandes</h3>
                            <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Order::count() }}</p>
                        </div>
                        <div class="bg-green-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-green-800">Produits</h3>
                            <p class="text-3xl font-bold text-green-600">{{ \App\Models\Product::count() }}</p>
                        </div>
                        <div class="bg-purple-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-purple-800">Catégories</h3>
                            <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Category::count() }}</p>
                        </div>
                    </div>

                    <!-- Actions admin -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="/admin" class="block p-4 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            <h4 class="font-semibold">Panel Filament</h4>
                            <p class="text-sm opacity-90">Accéder au panel d'administration complet</p>
                        </a>
                        <a href="#" class="block p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            <h4 class="font-semibold">Gestion des utilisateurs</h4>
                            <p class="text-sm opacity-90">Gérer les comptes utilisateurs</p>
                        </a>
                        <a href="#" class="block p-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            <h4 class="font-semibold">Rapports</h4>
                            <p class="text-sm opacity-90">Consulter les statistiques détaillées</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

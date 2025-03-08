<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Custom nature-inspired styles */
        body {
            background-color: #f0f8f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(90deg, #2ecc71, #27ae60);
        }
        .navbar a {
            color: #fff;
        }
        .btn-logout {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-logout:hover {
            background-color: #c0392b;
        }
        .card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar p-4 shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <a href="{{ route('accueil') }}" class="text-2xl font-bold">
                <i class="fas fa-seedling"></i> Farm Management
            </a>
            <ul class="flex space-x-6 items-center">
                @auth
                    <li>
                        <a href="{{ route('equipements.index') }}" class="hover:text-gray-200">
                            <i class="fas fa-tractor"></i> Mes Équipements
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('crops.index') }}" class="hover:text-gray-200">
                            <i class="fas fa-leaf"></i> Mes Cultures
                        </a>
                    </li>
                    
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-logout hover:bg-red-600">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-gray-200">
                            <i class="fas fa-sign-in-alt"></i> Connexion
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="hover:text-gray-200">
                            <i class="fas fa-user-plus"></i> Inscription
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 p-6">
        @yield('content')
    </div>
</body>
</html>

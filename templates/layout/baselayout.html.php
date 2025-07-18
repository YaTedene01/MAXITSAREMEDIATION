<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard MAXIT SA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen font-inter overflow-hidden">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-56 bg-orange-500 shadow-xl">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="p-6">
                    <div class="bg-white rounded-2xl p-4 text-center">
                        <div class="text-orange-500 text-2xl font-bold">MAXIT</div>
                        <div class="text-orange-500 text-xl font-light">SA</div>
                        <div class="w-8 h-1 bg-orange-500 rounded-full mx-auto mt-2"></div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-4 space-y-2">
                    <a href="#" class="flex items-center space-x-3 text-white hover:bg-white/10 rounded-xl p-3 transition-all duration-200">
                        <i class="fas fa-home w-4"></i>
                        <span class="font-medium">Accueil</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-white hover:bg-white/10 rounded-xl p-3 transition-all duration-200">
                        <i class="fas fa-chart-line w-4"></i>
                        <span class="font-medium">Statistiques</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-white hover:bg-white/10 rounded-xl p-3 transition-all duration-200">
                        <i class="fas fa-cog w-4"></i>
                        <span class="font-medium">Paramètres</span>
                    </a>
                </nav>
                
                <!-- Logout -->
                <div class="p-4">
                    <a href="/deconnexion" class="flex items-center space-x-3 text-white hover:bg-white/10 rounded-xl p-3 transition-all duration-200">
                        <i class="fas fa-sign-out-alt w-4"></i>
                        <span class="font-medium">Déconnexion</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
         <?php
             echo $contentForLayout;
            ?>
        
        
    </div>
</body>
</html>
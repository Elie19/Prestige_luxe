<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Prêt | Prestige Finance</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        .animate-fade-in { animation: fadeIn 0.5s ease-out forwards; }
        .animate-fade-in-up { animation: fadeInUp 0.5s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-slate-900 text-white antialiased overflow-x-hidden flex flex-col min-h-screen">

    <!-- Navbar Simplifiée (Statique pour la page de demande) -->
    <header class="fixed top-0 w-full z-50 bg-slate-900/90 backdrop-blur-md shadow-lg shadow-black/20 py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="/" class="text-2xl font-display font-bold tracking-tighter flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-tr from-amber-400 to-amber-600 rounded-tr-lg rounded-bl-lg"></div>
                <span>PRESTIGE<span class="text-amber-400">.</span>FINANCE</span>
            </a>
            <a href="/" class="text-sm font-medium text-slate-400 hover:text-white transition">Annuler et Retourner</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow pt-32 pb-20 relative">
        <!-- Background Gradients -->
        <div class="absolute top-0 left-0 w-full h-screen overflow-hidden -z-10">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-amber-500/10 rounded-full blur-[100px]"></div>
        </div>

        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Initiez votre <span class="text-amber-400">Demande</span></h1>
                <p class="text-slate-400">Processus sécurisé, réponse de principe immédiate.</p>
            </div>

            <!-- Intégration du composant Livewire -->
            @livewire('loan-application')
            
        </div>
    </main>

    <!-- Footer Simplifié -->
    <footer class="bg-black py-8 border-t border-slate-800 mt-auto">
        <div class="container mx-auto px-6 text-center text-slate-600 text-sm">
            <p>&copy; 2024 Prestige Finance. Données chiffrées de bout en bout.</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
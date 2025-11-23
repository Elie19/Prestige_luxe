<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Finance | L'Excellence Financière</title>
    <meta name="description" content="Solutions de financement haut de gamme pour une clientèle exigeante.">

    <!-- Fonts: Poppins & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Alpine Plugins (Doivent être chargés avant Livewire/Alpine Core) -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <!-- Laravel Vite (CSS & JS compilés) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Styles Livewire -->
    @livewireStyles
</head>
<body class="bg-slate-900 text-white antialiased overflow-x-hidden">

    <!-- Section: Navbar (Sticky & Glassmorphism) -->
    <header 
        x-data="{ scrolled: false, mobileOpen: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 50)"
        :class="scrolled ? 'bg-slate-900/90 backdrop-blur-md shadow-lg shadow-black/20 py-4' : 'bg-transparent py-6'"
        class="fixed top-0 w-full z-50 transition-all duration-300 ease-in-out"
    >
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="/demande" class="text-2xl font-display font-bold tracking-tighter flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-tr from-amber-400 to-amber-600 rounded-tr-lg rounded-bl-lg"></div>
                <span>PRESTIGE<span class="text-amber-400">.</span>FINANCE</span>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
                <a href="#solutions" class="hover:text-white transition-colors">Solutions</a>
                <a href="#processus" class="hover:text-white transition-colors">Notre Processus</a>
                <a href="#temoignages" class="hover:text-white transition-colors">Avis</a>
                <a href="#faq" class="hover:text-white transition-colors">FAQ</a>
            </nav>

            <!-- CTA Button -->
            <a href="/demande"class="hidden md:inline-block px-6 py-2.5 rounded-full bg-gradient-to-r from-amber-400 to-amber-600 text-slate-900 font-bold text-sm hover:shadow-[0_0_20px_rgba(251,191,36,0.4)] transition-all transform hover:-translate-y-0.5">
                Faire une demande
            </a>

            <!-- Mobile Toggle -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
        
        <!-- Mobile Menu (Basic Implementation) -->
        <div x-show="mobileOpen" x-collapse class="md:hidden bg-slate-900 border-b border-white/10">
            <nav class="flex flex-col p-6 space-y-4 text-center">
                <a href="#solutions" @click="mobileOpen = false" class="text-slate-300 hover:text-white">Solutions</a>
                <a href="#processus" @click="mobileOpen = false" class="text-slate-300 hover:text-white">Processus</a>
                <a href="#" class="text-amber-400 font-bold">Faire une date demande</a>
            </nav>
        </div>
    </header>

    <!-- Section: Hero Slider -->
    <section 
        x-data="{ 
            activeSlide: 0, 
            slides: [
                { img: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop', title: 'L\'ambition n\'a pas de limite.', sub: 'Financez vos projets les plus audacieux.' },
                { img: 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=2070&auto=format&fit=crop', title: 'Réalisez vos rêves, maintenant.', sub: 'Voyages, résidences secondaires, liberté.' },
                { img: 'https://images.unsplash.com/photo-1503376763036-066120622c74?q=80&w=2070&auto=format&fit=crop', title: 'L\'excellence à portée de main.', sub: 'Des solutions de crédit sur-mesure.' }
            ],
            timer: null
        }"
        x-init="timer = setInterval(() => activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1, 6000)"
        class="relative h-screen w-full overflow-hidden"
    >
        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                x-show="activeSlide === index"
                x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 transform scale-105"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-1000"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute inset-0 bg-cover bg-center"
                :style="`background-image: url('${slide.img}')`"
            >
                <!-- Dark Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/50 to-transparent"></div>
                
                <!-- Content -->
                <div class="absolute inset-0 container mx-auto px-6 flex flex-col justify-center h-full">
                    <div class="max-w-3xl pt-20">
                        <h1 
                            x-show="activeSlide === index"
                            x-transition:enter="transition delay-300 duration-700"
                            x-transition:enter-start="opacity-0 translate-y-10"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="text-5xl md:text-7xl font-display font-bold leading-tight mb-6"
                        >
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-400" x-text="slide.title"></span>
                        </h1>
                        <p 
                            x-show="activeSlide === index"
                            x-transition:enter="transition delay-500 duration-700"
                            x-transition:enter-start="opacity-0 translate-y-10"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="text-xl text-slate-300 mb-10 font-light" 
                            x-text="slide.sub"
                        ></p>
                        
                        <div 
                            x-show="activeSlide === index"
                            x-transition:enter="transition delay-700 duration-700"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                        >
                            <button class="px-8 py-4 bg-amber-400 hover:bg-amber-300 text-slate-900 font-bold text-lg rounded-sm transition-colors">
                                Faire une demande
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <!-- Slider Indicators -->
        <div class="absolute bottom-10 left-0 right-0 flex justify-center gap-4 z-20">
            <template x-for="(slide, index) in slides" :key="index">
                <button 
                    @click="activeSlide = index; clearInterval(timer); timer = setInterval(() => activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1, 6000)"
                    :class="activeSlide === index ? 'w-12 bg-amber-400' : 'w-3 bg-white/30 hover:bg-white'"
                    class="h-1 rounded-full transition-all duration-300"
                ></button>
            </template>
        </div>
    </section>

    <!-- Section: Trust Bar (Logos) -->
    <section class="py-12 border-b border-white/5 bg-slate-900">
        <div class="container mx-auto px-6">
            <p class="text-center text-slate-500 text-xs uppercase tracking-widest mb-8">Ils nous font confiance</p>
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                <h3 class="text-xl font-display font-bold text-white">FORBES</h3>
                <h3 class="text-xl font-display font-bold text-white">Bloomberg</h3>
                <h3 class="text-xl font-display font-bold text-white italic">TechCrunch</h3>
                <h3 class="text-xl font-display font-bold text-white">VOGUE</h3>
                <h3 class="text-xl font-display font-bold text-white">Boursorama</h3>
                <h3 class="text-xl font-display font-bold text-white">LES ECHOS</h3>
            </div>
        </div>
    </section>

    <!-- Section: Pourquoi Nous -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" x-data="{ show: false }" x-intersect="show = true">
                <h2 
                    :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-3xl md:text-4xl font-display font-bold mb-4 transition-all duration-700"
                >L'Excellence comme Standard</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-amber-400 to-transparent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" 
                     class="glass p-8 rounded-2xl relative group transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute inset-0 border border-transparent group-hover:border-amber-400/30 rounded-2xl transition-colors duration-300"></div>
                    <div class="w-14 h-14 bg-slate-800 rounded-lg flex items-center justify-center mb-6 text-amber-400 group-hover:text-white group-hover:bg-amber-500 transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Validation Éclair</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Notre IA propriétaire analyse votre profil en temps réel pour une pré-acceptation en moins de 60 secondes.</p>
                </div>

                <!-- Card 2 -->
                <div class="glass p-8 rounded-2xl relative group transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute inset-0 border border-transparent group-hover:border-amber-400/30 rounded-2xl transition-colors duration-300"></div>
                    <div class="w-14 h-14 bg-slate-800 rounded-lg flex items-center justify-center mb-6 text-cyan-400 group-hover:text-white group-hover:bg-cyan-500 transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Taux Compétitifs</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Grâce à notre réseau de banques privées, accédez aux taux les plus bas du marché, réservés à l'élite.</p>
                </div>

                <!-- Card 3 -->
                <div class="glass p-8 rounded-2xl relative group transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute inset-0 border border-transparent group-hover:border-amber-400/30 rounded-2xl transition-colors duration-300"></div>
                    <div class="w-14 h-14 bg-slate-800 rounded-lg flex items-center justify-center mb-6 text-amber-400 group-hover:text-white group-hover:bg-amber-500 transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Transparence Totale</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Aucun frais caché. Une interface claire pour suivre vos remboursements et votre capital restant dû.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Solutions (Masonry Grid) -->
    <section id="solutions" class="py-24 bg-slate-900 relative">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-display font-bold mb-12 text-white">Nos Solutions <span class="text-amber-400">Sur-Mesure</span></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[300px]">
                
                <!-- Item 1: Immo (Large) -->
                <div class="md:col-span-2 relative rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1600596542815-6ad4c4225c3e?q=80&w=2075&auto=format&fit=crop" alt="Immobilier" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <h3 class="text-2xl font-bold mb-2">Crédit Immobilier de Prestige</h3>
                        <p class="text-slate-300 text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Villas, Penthouses, Investissements locatifs.</p>
                        <span class="inline-block text-amber-400 font-bold text-sm border-b border-amber-400 pb-1 opacity-0 group-hover:opacity-100 transition-all delay-75 translate-y-4 group-hover:translate-y-0">Faire un prêt &rarr;</span>
                    </div>
                </div>

                <!-- Item 2: Auto -->
                <div class="relative rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1503376763036-066120622c74?q=80&w=2070&auto=format&fit=crop" alt="Auto" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent opacity-80 group-hover:opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-xl font-bold mb-1">Automobile</h3>
                        <span class="text-amber-400 text-sm opacity-0 group-hover:opacity-100 transition-opacity">Faire un prêt &rarr;</span>
                    </div>
                </div>

                 <!-- Item 3: Pro -->
                 <div class="relative rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop" alt="Pro" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent opacity-80 group-hover:opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <h3 class="text-xl font-bold mb-1">Financement Pro</h3>
                        <span class="text-amber-400 text-sm opacity-0 group-hover:opacity-100 transition-opacity">Faire un prêt &rarr;</span>
                    </div>
                </div>

                <!-- Item 4: Perso (Large) -->
                <div class="md:col-span-2 relative rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=2098&auto=format&fit=crop" alt="Lifestyle" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-80 group-hover:opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <h3 class="text-2xl font-bold mb-2">Prêt Personnel Lifestyle</h3>
                        <p class="text-slate-300 text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">Mariage, Voyage, Art, Montres de collection.</p>
                        <span class="inline-block text-amber-400 font-bold text-sm border-b border-amber-400 pb-1 opacity-0 group-hover:opacity-100 transition-all delay-75 translate-y-4 group-hover:translate-y-0">Faire un prêt &rarr;</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Processus (Timeline) -->
    <section id="processus" class="py-24 bg-slate-900 relative border-t border-white/5">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-display font-bold">Simple. Rapide. <span class="text-cyan-400">Digital.</span></h2>
            </div>

            <div class="relative flex flex-col md:flex-row justify-between items-center max-w-5xl mx-auto" x-data="{ visible: false }" x-intersect="visible = true">
                <!-- Connecting Line (CSS) -->
                <div class="absolute top-1/2 left-0 w-full h-0.5 bg-slate-700 -z-0 hidden md:block"></div>
                <div class="absolute top-1/2 left-0 h-0.5 bg-gradient-to-r from-amber-400 to-cyan-400 -z-0 hidden md:block transition-all duration-1000 ease-out" :style="visible ? 'width: 100%' : 'width: 0%'"></div>

                <!-- Step 1 -->
                <div class="relative z-10 flex flex-col items-center bg-slate-900 p-4 transition-all duration-700 delay-100" :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <div class="w-16 h-16 rounded-full bg-slate-800 border-2 border-amber-400 flex items-center justify-center text-2xl font-bold text-white mb-4 shadow-[0_0_20px_rgba(251,191,36,0.3)]">1</div>
                    <h4 class="text-lg font-bold mb-2">Demande</h4>
                    <p class="text-slate-400 text-sm text-center max-w-[200px]">Remplissez notre formulaire intelligent en 3 minutes.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative z-10 flex flex-col items-center bg-slate-900 p-4 transition-all duration-700 delay-300" :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <div class="w-16 h-16 rounded-full bg-slate-800 border-2 border-white flex items-center justify-center text-2xl font-bold text-white mb-4">2</div>
                    <h4 class="text-lg font-bold mb-2">Signature</h4>
                    <p class="text-slate-400 text-sm text-center max-w-[200px]">Signez électroniquement votre offre sécurisée.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative z-10 flex flex-col items-center bg-slate-900 p-4 transition-all duration-700 delay-500" :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
                    <div class="w-16 h-16 rounded-full bg-slate-800 border-2 border-cyan-400 flex items-center justify-center text-2xl font-bold text-white mb-4 shadow-[0_0_20px_rgba(34,211,238,0.3)]">3</div>
                    <h4 class="text-lg font-bold mb-2">Fonds</h4>
                    <p class="text-slate-400 text-sm text-center max-w-[200px]">Réception des fonds sous 24h ouvrées.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Témoignages -->
    <section id="temoignages" class="py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-display font-bold mb-16 text-center">L'Avis de nos <span class="text-amber-400">Clients</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Avis 1 -->
                <div class="glass p-8 rounded-xl border-l-4 border-amber-400">
                    <div class="flex items-center gap-1 mb-4 text-amber-400">
                        <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                    </div>
                    <p class="text-slate-300 italic mb-6">"Un service d'une efficacité redoutable. Le financement de ma résidence secondaire s'est fait en un temps record."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-700 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150&auto=format&fit=crop" alt="Client" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-white">Marc Dubois</p>
                            <p class="text-xs text-slate-500">Entrepreneur, Paris</p>
                        </div>
                    </div>
                </div>
                 <!-- Avis 2 -->
                 <div class="glass p-8 rounded-xl border-l-4 border-amber-400">
                    <div class="flex items-center gap-1 mb-4 text-amber-400">
                        <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                    </div>
                    <p class="text-slate-300 italic mb-6">"La transparence des taux et l'absence de frais cachés m'ont convaincue. Une vraie banque privée 2.0."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-700 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=150&auto=format&fit=crop" alt="Client" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-white">Sophie Laurent</p>
                            <p class="text-xs text-slate-500">Avocate, Lyon</p>
                        </div>
                    </div>
                </div>
                 <!-- Avis 3 -->
                 <div class="glass p-8 rounded-xl border-l-4 border-amber-400">
                    <div class="flex items-center gap-1 mb-4 text-amber-400">
                        <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                    </div>
                    <p class="text-slate-300 italic mb-6">"J'avais besoin de fonds rapidement pour une opportunité d'investissement. Prestige Finance a été le seul à réagir à temps."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-slate-700 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=150&auto=format&fit=crop" alt="Client" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-bold text-white">Jean-Pierre M.</p>
                            <p class="text-xs text-slate-500">Investisseur, Monaco</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: FAQ (Accordion) -->
    <section id="faq" class="py-24 relative bg-slate-900/50">
        <div class="container mx-auto px-6 max-w-3xl">
            <h2 class="text-3xl font-display font-bold mb-12 text-center">Questions Fréquentes</h2>
            
            <div x-data="{ selected: null }" class="space-y-4">
                <!-- Question 1 -->
                <div class="border border-white/10 rounded-lg bg-white/5 overflow-hidden">
                    <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full px-6 py-4 flex justify-between items-center text-left focus:outline-none hover:bg-white/5 transition">
                        <span class="font-medium text-lg">Quel montant maximum puis-je emprunter ?</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300 text-amber-400" :class="selected === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="selected === 1" x-collapse>
                        <div class="px-6 pb-4 text-slate-400 border-t border-white/5 pt-4">
                            Prestige Finance propose des solutions allant de 50 000€ à 5 000 000€ pour les particuliers, et au-delà pour les investissements immobiliers sur étude de dossier.
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="border border-white/10 rounded-lg bg-white/5 overflow-hidden">
                    <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full px-6 py-4 flex justify-between items-center text-left focus:outline-none hover:bg-white/5 transition">
                        <span class="font-medium text-lg">Quels justificatifs sont nécessaires ?</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300 text-amber-400" :class="selected === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="selected === 2" x-collapse>
                        <div class="px-6 pb-4 text-slate-400 border-t border-white/5 pt-4">
                            Grâce à l'Open Banking, nous pouvons analyser vos flux sans paperasse. Si nécessaire, votre dernier avis d'imposition et une pièce d'identité suffisent généralement.
                        </div>
                    </div>
                </div>

                 <!-- Question 3 -->
                 <div class="border border-white/10 rounded-lg bg-white/5 overflow-hidden">
                    <button @click="selected !== 3 ? selected = 3 : selected = null" class="w-full px-6 py-4 flex justify-between items-center text-left focus:outline-none hover:bg-white/5 transition">
                        <span class="font-medium text-lg">Le remboursement anticipé est-il possible ?</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300 text-amber-400" :class="selected === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="selected === 3" x-collapse>
                        <div class="px-6 pb-4 text-slate-400 border-t border-white/5 pt-4">
                            Oui, vous pouvez rembourser votre prêt à tout moment, totalement ou partiellement, sans aucune pénalité sur nos offres Premium.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: App Mobile -->
    <section class="py-24 bg-gradient-to-b from-slate-900 to-slate-800 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="md:w-1/2 z-10">
                    <span class="text-cyan-400 font-bold tracking-wider text-sm mb-2 block">MOBILE FIRST</span>
                    <h2 class="text-4xl md:text-5xl font-display font-bold mb-6">Votre banque,<br>dans votre poche.</h2>
                    <p class="text-slate-300 text-lg mb-8 leading-relaxed">
                        Suivez vos demandes, gérez vos mensualités et contactez votre conseiller dédié directement depuis notre application sécurisée. FaceID intégré.
                    </p>
                    <div class="flex gap-4">
                        <button class="bg-white text-slate-900 px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:bg-gray-200 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M16.365 1.43c0 1.14-.493 2.27-1.177 3.08-.744.9-1.99 1.57-2.987 1.57-.12 0-.23-.02-.3-.03-.01-.06-.04-.22-.04-.29.02-1.27.64-2.53 1.44-3.29.71-.67 1.77-1.11 2.69-1.12.12 0 .25.01.37.02zM17.51 19.8c-.95 1.41-1.97 2.81-3.53 2.83-.78.01-1.1-.49-2.19-.49-1.11 0-1.5.49-2.26.5-1.51.01-2.91-1.51-3.97-3.06-2.14-3.12-1.67-7.76 1.84-8.19 1.08-.13 1.95.62 2.55.62.59 0 1.77-.75 2.96-.64 1.26.11 2.38.83 3.01 1.78-2.56 1.58-2.08 5.9 1.59 6.65zM15.09 10.8c.16-.02.32-.03.48-.03 2.25 0 4.31 1.3 5.19 3.27-1.15 3.36-4.2 5.85-7.81 5.85-4.58 0-8.29-3.71-8.29-8.29 0-4.3 3.31-7.82 7.5-8.23.78 2.3 2.24 4.31 4.19 5.83-.42.52-.89.99-1.41 1.4z"/></svg>
                            App Store
                        </button>
                        <button class="glass text-white px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:bg-white/10 transition">
                            Google Play
                        </button>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center relative">
                    <div class="absolute inset-0 bg-amber-400/20 blur-3xl rounded-full -z-0 transform translate-y-10"></div>
                    <!-- Simulated iPhone Frame -->
                    <div class="relative w-72 h-[500px] bg-black rounded-[3rem] border-8 border-slate-700 shadow-2xl transform rotate-6 hover:rotate-0 transition-transform duration-700 z-10 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1616514197671-15d99ce7a6f8?q=80&w=800&auto=format&fit=crop" alt="App Screen" class="w-full h-full object-cover opacity-80">
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-32 h-6 bg-black rounded-b-2xl"></div>
                        <div class="absolute bottom-10 left-6 right-6">
                            <div class="bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/20">
                                <div class="text-xs text-slate-300 mb-1">Solde Disponible</div>
                                <div class="text-2xl font-bold text-white">124 500,00 €</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Footer & Newsletter (Livewire) -->
    <footer class="bg-black pt-20 pb-10 border-t border-slate-800">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-2xl font-display font-bold mb-6">PRESTIGE<span class="text-amber-400">.</span>FINANCE</h2>
                    <p class="text-slate-400 mb-8 max-w-sm">Le partenaire financier de ceux qui visent l'excellence. Rapidité, Discrétion, Performance.</p>
                    
                    <!-- Composant Livewire Newsletter -->
                    @livewire('newsletter-component')
                    
                    <p class="text-xs text-slate-600 mt-3 pl-4">Inscrivez-vous à notre lettre privée. Pas de spam.</p>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-4">Liens Rapides</h4>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-amber-400 transition">Simulateur</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Nos Agences</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Carrières</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Presse</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-4">Légal</h4>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-amber-400 transition">Mentions Légales</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Politique de Confidentialité</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Cookies</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-slate-600 text-sm">
                <p>&copy; 2024 Prestige Finance. Tous droits réservés.</p>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">Twitter</a>
                    <a href="#" class="hover:text-white transition">LinkedIn</a>
                    <a href="#" class="hover:text-white transition">Instagram</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts Livewire (Essentiel pour le fonctionnement du formulaire) -->
    @livewireScripts
</body>
</html>
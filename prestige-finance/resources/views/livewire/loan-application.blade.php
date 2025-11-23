<div class="max-w-4xl mx-auto">
    
    @if($success)
        <!-- Message de Succès -->
        <div class="glass p-12 rounded-3xl text-center animate-fade-in-up">
            <div class="w-24 h-24 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6 text-green-400 border border-green-500/30">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h2 class="text-3xl font-display font-bold mb-4">Demande Transmise</h2>
            <p class="text-slate-300 mb-8 text-lg">Votre dossier numéro <span class="text-amber-400 font-mono">#PRE-{{ rand(1000,9999) }}</span> a bien été enregistré.<br>Un conseiller privé vous contactera sous 24h.</p>
            <a href="/" class="px-8 py-3 bg-white text-slate-900 font-bold rounded-full hover:bg-slate-200 transition">Retour à l'accueil</a>
        </div>
    @else

        <!-- Indicateur d'Étapes -->
        <div class="mb-10">
            <div class="flex justify-between text-xs font-bold tracking-widest uppercase text-slate-500 mb-2">
                <span class="{{ $step >= 1 ? 'text-amber-400' : '' }}">01. Projet</span>
                <span class="{{ $step >= 2 ? 'text-amber-400' : '' }}">02. Situation</span>
                <span class="{{ $step >= 3 ? 'text-amber-400' : '' }}">03. Contact</span>
            </div>
            <div class="h-1 w-full bg-slate-800 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-amber-400 to-amber-600 transition-all duration-700 ease-out" style="width: {{ ($step / 3) * 100 }}%"></div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="glass p-8 md:p-12 rounded-3xl border border-white/10 relative overflow-hidden min-h-[500px] flex flex-col justify-center">
            
            <!-- Décoration -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-400/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>

            <form wire:submit.prevent="submit">
                
                <!-- ÉTAPE 1 : LE PROJET -->
                @if($step === 1)
                <div class="space-y-8 animate-fade-in">
                    <h2 class="text-3xl font-display font-bold">Parlons de votre <span class="text-amber-400">Ambition</span>.</h2>
                    
                    <!-- Type de projet -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach(['immobilier' => 'Immobilier', 'auto' => 'Automobile', 'pro' => 'Professionnel', 'perso' => 'Personnel'] as $key => $label)
                        <label class="cursor-pointer group">
                            <input type="radio" wire:model.live="type" value="{{ $key }}" class="hidden peer">
                            <div class="border border-white/10 bg-white/5 peer-checked:bg-amber-400 peer-checked:text-slate-900 peer-checked:border-amber-400 p-4 rounded-xl text-center transition-all hover:bg-white/10">
                                <span class="font-medium text-sm">{{ $label }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <!-- Montant Slider -->
                    <div>
                        <div class="flex justify-between items-end mb-4">
                            <label class="text-slate-400 text-sm">Montant souhaité</label>
                            <span class="text-3xl font-bold text-white">{{ number_format($amount, 0, ',', ' ') }} €</span>
                        </div>
                        <input type="range" wire:model.live="amount" min="10000" max="2000000" step="5000" class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-amber-400">
                        <div class="flex justify-between text-xs text-slate-500 mt-2">
                            <span>10 k€</span>
                            <span>2 M€ +</span>
                        </div>
                    </div>

                    <!-- Durée -->
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Durée (Années)</label>
                        <div class="flex items-center gap-4">
                            <input type="number" wire:model="duration" class="bg-transparent border-b border-white/20 text-2xl font-bold w-24 py-2 focus:outline-none focus:border-amber-400 transition-colors text-center">
                            <span class="text-xl">ans</span>
                        </div>
                    </div>
                </div>
                @endif

                <!-- ÉTAPE 2 : PROFIL -->
                @if($step === 2)
                <div class="space-y-8 animate-fade-in">
                    <h2 class="text-3xl font-display font-bold">Votre <span class="text-cyan-400">Profil</span>.</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="group">
                            <label class="text-slate-400 text-sm mb-2 block">Revenus Mensuels Nets</label>
                            <div class="relative">
                                <input type="number" wire:model="income" placeholder="Ex: 8500" class="w-full bg-transparent border-b border-white/20 text-xl py-3 focus:outline-none focus:border-cyan-400 transition-colors placeholder-slate-700">
                                <span class="absolute right-0 top-3 text-slate-500">€</span>
                            </div>
                            @error('income') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="group">
                            <label class="text-slate-400 text-sm mb-2 block">Profession / Statut</label>
                            <input type="text" wire:model="profession" placeholder="Ex: Chirurgien, CEO..." class="w-full bg-transparent border-b border-white/20 text-xl py-3 focus:outline-none focus:border-cyan-400 transition-colors placeholder-slate-700">
                            @error('profession') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <!-- ÉTAPE 3 : COORDONNÉES -->
                @if($step === 3)
                <div class="space-y-8 animate-fade-in">
                    <h2 class="text-3xl font-display font-bold">Finalisation.</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Prénom</label>
                            <input type="text" wire:model="firstname" class="w-full bg-transparent border-b border-white/20 text-lg py-3 focus:outline-none focus:border-amber-400 transition-colors">
                            @error('firstname') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Nom</label>
                            <input type="text" wire:model="lastname" class="w-full bg-transparent border-b border-white/20 text-lg py-3 focus:outline-none focus:border-amber-400 transition-colors">
                            @error('lastname') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Email Privé</label>
                            <input type="email" wire:model="email" class="w-full bg-transparent border-b border-white/20 text-lg py-3 focus:outline-none focus:border-amber-400 transition-colors">
                            @error('email') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Téléphone</label>
                            <input type="tel" wire:model="phone" class="w-full bg-transparent border-b border-white/20 text-lg py-3 focus:outline-none focus:border-amber-400 transition-colors">
                            @error('phone') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @endif

                <!-- Actions / Boutons -->
                <div class="flex justify-between items-center mt-12 pt-8 border-t border-white/5">
                    
                    @if($step > 1)
                        <button type="button" wire:click="previousStep" class="text-slate-400 hover:text-white transition-colors flex items-center gap-2">
                            &larr; Retour
                        </button>
                    @else
                        <div></div> <!-- Spacer -->
                    @endif

                    @if($step < 3)
                        <button type="button" wire:click="nextStep" class="bg-amber-400 hover:bg-amber-500 text-slate-900 px-8 py-3 rounded-full font-bold transition-all shadow-[0_0_15px_rgba(251,191,36,0.3)] hover:shadow-[0_0_25px_rgba(251,191,36,0.5)]">
                            Suivant &rarr;
                        </button>
                    @else
                        <button type="submit" wire:loading.attr="disabled" class="bg-gradient-to-r from-amber-400 to-amber-600 hover:to-amber-500 text-slate-900 px-10 py-3 rounded-full font-bold transition-all shadow-[0_0_15px_rgba(251,191,36,0.3)] disabled:opacity-50">
                            <span wire:loading.remove>Soumettre la demande</span>
                            <span wire:loading>Traitement sécurisé...</span>
                        </button>
                    @endif
                </div>
            </form>
        </div>
    @endif
</div>
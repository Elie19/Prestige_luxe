<div>
    @if($subscribed)
        <div class="bg-green-500/10 border border-green-500 text-green-400 px-6 py-4 rounded-lg animate-pulse">
            <p class="font-medium">Inscription confirmée. Bienvenue.</p>
        </div>
    @else
        <form wire:submit.prevent="subscribe" class="relative">
            <div class="bg-slate-900 p-1 rounded-full border border-slate-700 flex max-w-md focus-within:border-amber-400 transition-colors duration-300">
                <input 
                    wire:model="email" 
                    type="email" 
                    placeholder="votre@email.com" 
                    class="bg-transparent text-white px-6 py-3 w-full focus:outline-none placeholder-slate-500"
                >
                <button type="submit" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold px-6 py-3 rounded-full transition-all disabled:opacity-50">
                    <span wire:loading.remove>S'inscrire</span>
                    <span wire:loading>...</span>
                </button>
            </div>
            @error('email') 
                <span class="text-red-400 text-xs mt-2 block ml-4">{{ $message }}</span> 
            @enderror
        </form>
    @endif
</div>
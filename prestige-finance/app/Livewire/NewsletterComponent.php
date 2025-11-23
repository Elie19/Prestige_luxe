<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class NewsletterComponent extends Component
{
    public $email = '';
    public $subscribed = false;

    // Règles de validation strictes
    protected $rules = [
        'email' => 'required|email:rfc,dns|unique:newsletters,email',
    ];

    // Messages d'erreur personnalisés pour le ton "Premium"
    protected $messages = [
        'email.required' => 'Une adresse email est requise.',
        'email.email'    => 'Veuillez entrer une adresse email valide.',
        'email.unique'   => 'Vous faites déjà partie de notre cercle privé.',
    ];

    /**
     * Soumet l'inscription
     */
    public function subscribe()
    {
        // 1. Validation
        $this->validate();

        try {
            // 2. Logique d'enregistrement (Simulation Eloquent)
            // Newsletter::create(['email' => $this->email]);
            
            // Simulation d'envoi à un service tiers (Mailchimp, etc.)
            Log::info("Nouvelle inscription Prestige : {$this->email}");

            // 3. Feedback UI
            $this->subscribed = true;
            $this->reset('email');

            // Optionnel : Flash message session
            session()->flash('message', 'Bienvenue dans le cercle Prestige Finance.');

        } catch (\Exception $e) {
            // Gestion d'erreur silencieuse pour l'UX, log côté serveur
            Log::error("Erreur Newsletter : " . $e->getMessage());
            $this->addError('email', 'Une erreur technique est survenue. Veuillez réessayer.');
        }
    }

    public function render()
    {
        return view('livewire.newsletter-component');
    }
}
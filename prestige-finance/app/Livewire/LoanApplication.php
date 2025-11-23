<?php

namespace App\Livewire;

use Livewire\Component;

class LoanApplication extends Component
{
    public $step = 1;
    
    // Étape 1 : Projet
    public $type = 'immobilier';
    public $amount = 250000;
    public $duration = 20;

    // Étape 2 : Profil
    public $income = '';
    public $profession = '';
    
    // Étape 3 : Coordonnées
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $phone = '';

    public $success = false;

    protected $messages = [
        'income.required' => 'Le revenu est nécessaire pour l\'étude.',
        'email.required' => 'Nous avons besoin de votre email pour vous répondre.',
        'email.email' => 'Format d\'email invalide.',
        'profession.required' => 'Votre situation professionnelle est requise.',
    ];

    public function nextStep()
    {
        $this->validateStep();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function validateStep()
    {
        if ($this->step === 1) {
            $this->validate([
                'amount' => 'required|numeric|min:10000',
                'duration' => 'required|numeric|min:1|max:30',
            ]);
        } elseif ($this->step === 2) {
            $this->validate([
                'income' => 'required|numeric',
                'profession' => 'required|string|min:3',
            ]);
        }
    }

    public function submit()
    {
        $this->validate([
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required|min:10',
        ]);

        // Simulation d'envoi / Sauvegarde en BDD
        // Loan::create([...]);
        
        sleep(1); // Petit délai pour l'effet "Traitement sécurisé"
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.loan-application');
    }
}
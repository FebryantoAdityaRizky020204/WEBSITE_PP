<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginLivewire extends Component
{

    public $email='';
    public $password='';

    protected $rules= [
        'email' => 'required|email',
        'password' => 'required'

    ];

    public function render()
    {
        if(auth()->check()) {
            return redirect(route('dashboard'));
        }
        return view('livewire.auth.login');
    }

    public function mount() {
      
        $this->fill(['email' => 'admin@material.com', 'password' => 'secret']);    
    }
    
    public function store()
    {
        $attributes = $this->validate();

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        
        session()->regenerate();


        return redirect(route('dashboard'));

    }
}
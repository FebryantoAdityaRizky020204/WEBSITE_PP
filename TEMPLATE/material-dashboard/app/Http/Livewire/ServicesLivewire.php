<?php

namespace App\Http\Livewire;
use App\Models\JenisLaundry;
use App\Models\LayananLaundry;

use Livewire\Component;

class ServicesLivewire extends Component
{
    public $tambahServices;
    public $JenisLaundry;
    public $LayananLaundry;
    
    public function render()
    {
        return view('livewire.services');
    }

    public function mount() {
        $this->JenisLaundry = JenisLaundry::all();
        $this->LayananLaundry = LayananLaundry::all();
    }

    // UI
    public function storeCategory() {
        
        
    }
}
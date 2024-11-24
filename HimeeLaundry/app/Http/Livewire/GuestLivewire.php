<?php

namespace App\Http\Livewire;

use App\Models\LayananLaundry;
use App\Models\JenisLaundry;
use Livewire\Component;

class GuestLivewire extends Component
{
    public function render()
    {
        return view('livewire.guest.home', [
            'JenisLaundry' => JenisLaundry::all(),
            'LayananLaundry' => LayananLaundry::all(),
        ]);
    }
}
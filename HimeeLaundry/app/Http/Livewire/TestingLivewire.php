<?php
namespace App\Http\Livewire;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class TestingLivewire extends Component {
    public function render()
    {
        return view('livewire.testing');
    }
}
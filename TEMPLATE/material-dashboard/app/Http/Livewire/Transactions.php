<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Transactions extends Component {

    // Buat Transaksi
    public $countLaundryService = 1;

    public function render()
    {
        return view('livewire.transactions');
    }

    function changeCountLaundryService($action) {
        if ($action == 'add') $this->countLaundryService++;
        else $this->countLaundryService--;
    }
}
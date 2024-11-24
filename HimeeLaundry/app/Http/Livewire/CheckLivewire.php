<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class CheckLivewire extends Component {
    public $id_transaksi, $nama_pelanggan, $nomor_telepon, 
        $find_transaksi = null;

    public function render() {
        return view('livewire.guest.check', [
            'transaksi' => Transaksi::all(),
        ]);
    }

    public function doFindTransaksi() {
        $this->validate([
            'id_transaksi' => 'required',
            'nama_pelanggan' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $this->find_transaksi = Transaksi::where('id_transaksi', $this->id_transaksi)
                ->whereHas('pelanggan', function ($query) {
                    $query->where('nama_pelanggan', $this->nama_pelanggan)
                    ->where('nomor_telepon', $this->nomor_telepon);
                })->first();
    }
    
}
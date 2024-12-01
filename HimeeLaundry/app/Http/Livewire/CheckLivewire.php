<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class CheckLivewire extends Component {
    public $nama_pelanggan, 
            $nomor_telepon, 
            $find_transaksi = null;

    public function render() {
        return view('livewire.guest.check');
    }

    public function doFindTransaksi() {
        $this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_telepon' => 'required|numeric|min:11',
        ]);

        $tr = Transaksi::whereHas('pelanggan', function ($query) {
                    $query->where('nama_pelanggan', $this->nama_pelanggan)
                    ->where('nomor_telepon', $this->nomor_telepon);
                })->where('status_laundry', 'Selesai')->first();

        if($tr) {
            $this->find_transaksi = $tr;
            $this->nomor_telepon = null;
            $this->nama_pelanggan = null;
        } else {
            $this->find_transaksi = "Tidak Ditemukan";
        }

    }
    
}
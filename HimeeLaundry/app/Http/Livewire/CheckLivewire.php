<?php

namespace App\Http\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

use App\Models\Transaksi;

class CheckLivewire extends Component {
    public $nama_pelanggan = '', 
            $nomor_telepon = '', 
            $find_transaksi = null;

    public function render() {
        return view('livewire.guest.check');
    }

    public function doFindTransaksi() {
        $this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_telepon' => 'required|digits_between:10,15',
        ]);

        $tr = Transaksi::whereHas('pelanggan', function ($query) {
            $query->where('nama_pelanggan', $this->nama_pelanggan)
                    ->where('nomor_telepon', $this->nomor_telepon);
            })->where(function ($query) {
                $query->where('status_laundry', 'Selesai')
                    ->orWhere('status_laundry', 'Sedang Diproses');
            })->first();


        if($tr) {
            $this->find_transaksi = $tr;
            session()->flash('message', 'Transaksi Ditemukan');
        } else {
            session()->flash('message', 'Transaksi Tidak Ditemukan');
            $this->find_transaksi = "Tidak Ditemukan";
        }
    }
    
}
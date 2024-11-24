<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Crypt;

class DashboardLivewire extends Component
{
    public $transaksi, $pelanggan, $pemasukan, $pengeluaran, 
        $id_transaksi = '', 
        $find_transaksi = null;

    public function render() {
        return view('livewire.dashboard');
    }

    public function mount() {
        $this->transaksi = Transaksi::all();
        $this->pelanggan = Pelanggan::all()->count();
        $this->pemasukan = Pemasukan::all()->sum('pemasukan');
        $this->pengeluaran = Pengeluaran::all()->sum('harga_pembelian');
    }

    public function updatedIdTransaksi() {
        if (!empty($this->id_transaksi)) {
            $this->find_transaksi = Transaksi::where('id_transaksi', $this->id_transaksi)->first();
        } else {
            $this->find_transaksi = null;
        }
    }


    public function buatTransaksi(){
        return redirect()->route('transactions')->with('do', 'addTransaksi');
    }

    public function tambahPengeluaran() {
        return redirect()->route('finance')->with('do', 'addPengeluaran');
    }

    public function detailTransaksi(){
        $id_tr = Crypt::encrypt($this->id_transaksi);
        return redirect()->route('detail-transactions', ['id' => $id_tr]);
    }

    public function resetInputs(){
        $this->id_transaksi = '';
        $this->find_transaksi = null;
    }
}
<?php

namespace App\Http\Livewire;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;

use Livewire\Component;

class FinanceLivewire extends Component
{
    public $nama_barang, $harga_pembelian, $id_operation;
    
    public function render()
    {
        return view('livewire.finance', [
            'Pengeluaran' => Pengeluaran::all(),
            'Pemasukan' => Pemasukan::all(),
            'total_pengeluaran' => Pengeluaran::all()->sum('harga_pembelian'),
            'total_pemasukan' => Pemasukan::all()->sum('pemasukan'),
        ]);
    }

    public function resetInputs(){
        $this->nama_barang = '';
        $this->harga_pembelian = '';
        $this->id_operation = '';
    }

    public function addPengeluaran(){
        $this->validate([
            'nama_barang' => 'required|string',
            'harga_pembelian' => 'required|numeric',
        ]);

        Pengeluaran::create([
            'nama_barang' => $this->nama_barang,
            'harga_pembelian' => $this->harga_pembelian,
        ]);

        $this->resetInputs();
        session()->flash('message', 'Pengeluaran Berhasil Ditambahkan');
        $this->dispatch('close-modal');
    }


    public function showEditPengeluaran($id){
        $Pengeluaran = Pengeluaran::where('id', $id)->first();
        $this->nama_barang = $Pengeluaran->nama_barang;
        $this->harga_pembelian = $Pengeluaran->harga_pembelian;
        $this->id_operation = $id;
    }

    public function editPengeluaran(){
        $this->validate([
            'nama_barang' => 'required|string',
            'harga_pembelian' => 'required|numeric',
        ]);

        $pengeluaran = Pengeluaran::where('id', $this->id_operation)->first();
        $pengeluaran->update([
            'nama_barang' => $this->nama_barang,
            'harga_pembelian' => $this->harga_pembelian,
        ]);

        $this->resetInputs();
        session()->flash('message', 'Pengeluaran Berhasil Diubah');
        $this->dispatch('close-modal');
    }

    public function showDeletePengeluaran($id){
        $this->id_operation = $id;
        $pengeluaran = Pengeluaran::where('id', $id)->first();
        $this->nama_barang = $pengeluaran->nama_barang;
        $this->harga_pembelian = $pengeluaran->harga_pembelian;
    }

    public function deletePengeluaran() {
        $pengeluaran = Pengeluaran::where('id', $this->id_operation)->first();
        $pengeluaran->delete();
        
        $this->resetInputs();
        session()->flash('message', 'Pengeluaran Berhasil Dihapus');
        $this->dispatch('close-modal');
    }



}
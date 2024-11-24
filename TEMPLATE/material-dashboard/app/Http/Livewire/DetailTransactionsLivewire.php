<?php

namespace App\Http\Livewire;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;
use App\Models\RincianLaundry;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\TransaksiLayanan;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class DetailTransactionsLivewire extends Component {
    public 
        $transaksi, 
        $id_transaksi,
        $id_operation, 
        $rincianLaundry, 
        $nama_barang = '', 
        $jumlah_barang = '',
        $teks_operation = '';

    public $nama_pelanggan = '',
            $nomor_telepon = '', 
            $status_pembayaran = '', 
            $status_laundry = '';
    
    public function render()
    {
        return view('livewire.detail-transaction');
    }

    public function mount($id){
        try {
            $id_tr = Crypt::decrypt($id);
        } catch (\Throwable $th) {
            return redirect()->route('transactions');
        }
        
        $this->transaksi = Transaksi::where('id_transaksi', $id_tr)->first();
        $this->id_transaksi = $this->transaksi->id;
        $this->rincianLaundry = RincianLaundry::where('id_transaksi', $this->id_transaksi)->get();
    }
    
    public function resetInputs(){
        $this->transaksi = Transaksi::where('id', $this->id_transaksi)->first();
        $this->rincianLaundry = RincianLaundry::where('id_transaksi', $this->transaksi->id)->get();
        $this->nama_barang = '';
        $this->jumlah_barang = '';
        $this->id_operation = '';
        $this->teks_operation = '';
        
        $this->nama_pelanggan = '';
        $this->nomor_telepon = '';
        $this->status_pembayaran = '';
        $this->status_laundry = '';
    }

    public function addRincianLaundry() {
        $this->validate([
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|numeric'
        ]);

        RincianLaundry::create([
            'id_transaksi' => $this->transaksi->id,
            'nama_barang' => $this->nama_barang,
            'jumlah_barang' => $this->jumlah_barang
        ]);

        $this->resetInputs();
        session()->flash('message', 'Rincian laundry Berhasil Ditambahkan');
        $this->dispatch('close-modal');
    }

    public function showEditRincian($id) {
        $this->id_operation = $id;
        $this->nama_barang = RincianLaundry::where('id', $id)->first()->nama_barang;
        $this->jumlah_barang = RincianLaundry::where('id', $id)->first()->jumlah_barang;
    }

    public function editRincianLaundry() {
        $rincian = RincianLaundry::where('id', $this->id_operation)->first();

        $rincian->update([
            'nama_barang' => $this->nama_barang,
            'jumlah_barang' => $this->jumlah_barang
        ]);

        $this->resetInputs();
        session()->flash('message', 'Rincian laundry Berhasil Diubah');
        $this->dispatch('close-modal');
    }

    public function showDeleteRincian($id) {
        $this->id_operation = $id;
        $this->nama_barang = RincianLaundry::where('id', $id)->first()->nama_barang;
    }

    public function deleteRincianLaundry() {
        $rincian = RincianLaundry::where('id', $this->id_operation)->first();
        $rincian->delete();

        $this->resetInputs();
        session()->flash('message', 'Rincian laundry Berhasil Dihapus');
        $this->dispatch('close-modal');
    }

    public function showEditTransaksi(){
        $this->nama_pelanggan = $this->transaksi->pelanggan->nama_pelanggan;
        $this->nomor_telepon = $this->transaksi->pelanggan->nomor_telepon;
        $this->status_pembayaran = $this->transaksi->pemasukan->status_pembayaran;
        $this->status_laundry = $this->transaksi->status_laundry;
    }

    public function editTransaksi(){
        $transaksi = Transaksi::where('id', $this->transaksi->id)->first();
        $this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'status_pembayaran' => 'required|string',
            'status_laundry' => 'required|string'
        ]);
        
        $transaksi->update([
            'status_laundry' => $this->status_laundry
        ]);

        $pelanggan = Pelanggan::where('id', $transaksi->id_pelanggan)->first();
        $pelanggan->update([
            'nama_pelanggan' => $this->nama_pelanggan,
            'nomor_telepon' => $this->nomor_telepon
        ]);

        $pemasukan = Pemasukan::where('id', $transaksi->id_pemasukan)->first();
        $pemasukan->update([
            'status_pembayaran' => $this->status_pembayaran
        ]);

        $this->resetInputs();
        session()->flash('message', 'Transaksi Berhasil Diupdate');
        $this->dispatch('close-modal');
    }

    public function showDeleteTransaksi() {
        $this->teks_operation = $this->transaksi->id_transaksi;
    }

    public function deleteTransaksi() {
        $transaksi = Transaksi::where('id_transaksi', $this->teks_operation)->first();
        if($transaksi){
            TransaksiLayanan::where('id_transaksi', $transaksi->id)->delete();
            RincianLaundry::where('id_transaksi', $transaksi->id)->delete();
            $transaksi->delete();
            Pemasukan::where('id', $transaksi->id_pemasukan)->delete();
            Pelanggan::where('id', $transaksi->id_pelanggan)->delete();
            
            return redirect()->route('transactions');
        } else {
            $this->resetInputs();
            session()->flash('message', 'Transaksi Gagal Dihapus');
            $this->dispatch('close-modal');
        }
    }
}
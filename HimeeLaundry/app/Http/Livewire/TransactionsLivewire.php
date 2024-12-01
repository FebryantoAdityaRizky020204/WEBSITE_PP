<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\LayananLaundry;
use App\Models\Pelanggan;
use App\Models\Pemasukan;
use App\Models\TransaksiLayanan;
use App\Models\RincianLaundry;
use Psy\Output\Theme;
use Illuminate\Support\Facades\Crypt;

class TransactionsLivewire extends Component {

    // Buat Transaksi
    public $transaksi, $layananLaundry;
    public $countLaundryService = 1;
    public $pemasukan = 0;
    public $id_layanan = [];
    public $nilai_barang = [];
    public $nama_pelanggan, $nomor_telepon, $status_pembayaran, $status_laundry, $id_operation, $teks_operation;
    public $e_status_laundry = [];
    public $e_status_pembayaran = [];
    public $search;
    public $autoName = null;
    public $inputFocus = false;

    public function render()
    {
        return view('livewire.transactions');
    }

    function updatedSearch(){
        $this->transaksi = Transaksi::where('id_transaksi', 'like', '%' . $this->search . '%')
            ->orWhereHas('pelanggan', function ($query) {
                $query->where('nama_pelanggan', 'like', '%' . $this->search . '%');
            })->with('pelanggan')
            ->get();
    }

    function updatedNamaPelanggan() {
        if($this->nama_pelanggan != null){
            $this->autoName = Pelanggan::where('nama_pelanggan', 'like', '%' . $this->nama_pelanggan . '%')->get();
        } else {
            $this->autoName = null;
        }
    }

    public function mount() {
        $this->transaksi = Transaksi::all();
        $this->layananLaundry = LayananLaundry::all();
        $this->id_operation = '';
        $this->teks_operation = '';
        $this->id_layanan[0] = null;
        $this->nilai_barang[0] = null;
        $this->pemasukan = 0;
        for ($i = 0; $i < count($this->transaksi); $i++) {
            $this->e_status_laundry[$i] = $this->transaksi[$i]->status_laundry;
            $this->e_status_pembayaran[$i] = $this->transaksi[$i]->pemasukan->status_pembayaran;
        }

    }

    public function resetInputs() {
        $this->transaksi = Transaksi::where('id_transaksi', 'like', '%' . $this->search . '%')
            ->orWhereHas('pelanggan', function ($query) {
                $query->where('nama_pelanggan', 'like', '%' . $this->search . '%');
            })->with('pelanggan')
            ->get();
        $this->layananLaundry = LayananLaundry::all();
        $this->id_layanan = [];
        $this->nilai_barang = [];
        $this->countLaundryService = 1;
        $this->pemasukan = null;
        $this->nama_pelanggan = '';
        $this->nomor_telepon = '';
        $this->status_pembayaran = '';
        $this->status_laundry = '';
        for ($i = 0; $i < count($this->transaksi); $i++) {
            $this->e_status_laundry[$i] = $this->transaksi[$i]->status_laundry;
            $this->e_status_pembayaran[$i] = $this->transaksi[$i]->pemasukan->status_pembayaran;
        }
        $this->inputFocus = false;
    }

    function addService() {
        $this->countLaundryService++;
        $this->id_layanan[$this->countLaundryService-1] = null;
        $this->nilai_barang[$this->countLaundryService-1] = null;
    }

    public function removeService() {
        $this->countLaundryService--;
        array_pop($this->id_layanan);
        array_pop($this->nilai_barang);
    }

    public function calculateTotalPayment() {
        $this->pemasukan = 0;
        for ($i = 0; $i < $this->countLaundryService; $i++) {
            if ($this->id_layanan[$i] == null || $this->nilai_barang[$i] == null) {
                $this->pemasukan = 0;
            } else {
                $n_harga = LayananLaundry::where('id', $this->id_layanan[$i])->first();
                if($n_harga != null) {
                    $total = $n_harga->harga_layanan * $this->nilai_barang[$i];
                    $this->pemasukan += $total;
                }
            }
        }
    }


    public function storeTransaksi() {
        $id_transaksi = strtoupper(str()->random(6));

        $this->validate([
            'nama_pelanggan' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'id_layanan.*' => 'required',
            'nilai_barang.*' => 'required',
            'pemasukan' => 'required',
            'status_pembayaran' => 'required',
        ]);

        $transaksi = Transaksi::create([
            'id_transaksi' => $id_transaksi,
            'id_pelanggan' => $this->storePelanggan(),
            'id_pemasukan' => $this->storePemasukan(),
            'status_laundry' => 'Sedang Diproses'
        ]);

        $this->storeTransaksiLayanan($transaksi->id);

        $this->resetInputs();
        session()->flash('message', 'Transaksi Laundry Berhasil Ditambahkan');
        $this->dispatch('close-modal');
        $id_tr = Crypt::encrypt($transaksi->id_transaksi);
        return redirect()->route('detail-transactions', ['id' => $id_tr]);

    }

    public function storeTransaksiLayanan($id_transaksi){
        foreach ($this->id_layanan as $key => $value) {
            TransaksiLayanan::create([
                'id_layanan' => $value,
                'id_transaksi' => $id_transaksi,
                'nilai_barang' => $this->nilai_barang[$key]
            ]);
        }
    }

    public function storePelanggan() {
        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $this->nama_pelanggan,
            'nomor_telepon' => $this->nomor_telepon,
        ]);
        return $pelanggan->id;
    }

    public function storePemasukan() {
        $pemasukan = Pemasukan::create([
            'pemasukan' => $this->pemasukan,
            'status_pembayaran' => $this->status_pembayaran,
        ]);
        return $pemasukan->id;
    }

    public function updateStatusPembayaran($key, $id){
        $transaksi = Transaksi::where('id', $id)->first();
        if($transaksi){
            $pemasukan = Pemasukan::where('id', $transaksi->id_pemasukan)->first();
            if($pemasukan){
                $pemasukan->update([
                    'status_pembayaran' => $this->e_status_pembayaran[$key],
                ]);
            }

            $this->resetInputs();
        }
    }

    public function updateStatusLaundry($key, $id){
        $transaksi = Transaksi::where('id', $id)->first();
        if($transaksi){
            $transaksi->update([
                'status_laundry' => $this->e_status_laundry[$key],
            ]);
            $this->resetInputs();
        }
    }

    public function showDeleteTransaksi($id) {
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            $this->id_operation = $transaksi->id;
            $this->teks_operation = $transaksi->id_transaksi . ' - ' . $transaksi->pelanggan->nama_pelanggan;
        } else {
            $this->resetInputs();
            session()->flash('message', 'Transaksi Tidak Ditemukan');
            $this->dispatch('close-modal');
        }
    }

    public function deleteTransaksi() {
        $transaksi = Transaksi::where('id', $this->id_operation)->first();
        if($transaksi){
            TransaksiLayanan::where('id_transaksi', $transaksi->id)->delete();
            RincianLaundry::where('id_transaksi', $transaksi->id)->delete();
            $transaksi->delete();
            Pemasukan::where('id', $transaksi->id_pemasukan)->delete();
            
            $this->resetInputs();
            session()->flash('message', 'Transaksi Berhasil Dihapus');
            $this->dispatch('close-modal');
        } else {
            $this->resetInputs();
            session()->flash('message', 'Transaksi Gagal Dihapus');
            $this->dispatch('close-modal');
        }
    }

    public function detailTransaksi($id){
        $id_tr = Crypt::encrypt($id);
        return redirect()->route('detail-transactions', ['id' => $id_tr]);
    }

    public function setPelanggan($id) {
        $pelanggan = Pelanggan::where('id', $id)->first();
        $this->nama_pelanggan = $pelanggan->nama_pelanggan;
        $this->nomor_telepon = $pelanggan->nomor_telepon;
    }

    public function handleInputFocus() {
        $this->inputFocus = true;
    }

    public function handleInputBlur() {
        // Tambahkan jeda untuk memungkinkan `wire:click` selesai sebelum dropdown menghilang
        usleep(200000); // 200ms
        $this->inputFocus = false;
    }
}
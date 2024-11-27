<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardLivewire extends Component
{
    public $transaksi, $pelanggan, $pemasukan, $pengeluaran,
    $id_transaksi = '',
    $search = '',
    $find_transaksi = null,
    $jumlahPerHari = [],
    $startOfWeek = null,
    $endOfWeek = null,
    $transaksiPerHari = [];

    public function render() {
        return view('livewire.dashboard');
    }

    public function mount() {
        $this->transaksi = Transaksi::all();
        $this->pelanggan = Pelanggan::all()->count();
        $this->pemasukan = Pemasukan::all()->sum('pemasukan');
        $this->pengeluaran = Pengeluaran::all()->sum('harga_pembelian');
        $this->startOfWeek = Carbon::now()->startOfWeek();
        $this->endOfWeek = Carbon::now()->endOfWeek();

    }

    public function updatedSearch() {
        if (!empty($this->search)) {
            $this->find_transaksi = Transaksi::where('id_transaksi', 'like', '%' . $this->search . '%')
            ->orWhere('status_laundry', 'NOT', 'Sudah Diambil')
            ->orWhereHas('pelanggan', function ($query) {
                $query->where('nama_pelanggan', 'like', '%' . $this->search . '%')
                ->orwhere('nomor_telepon', 'like', '%' . $this->search . '%');
            })->with('pelanggan')
            ->first();
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

    public function detailTransaksi($id){
        $id_tr = Crypt::encrypt($id);
        return redirect()->route('detail-transactions', ['id' => $id_tr]);
    }

    public function resetInputs(){
        $this->id_transaksi = '';
        $this->search = '';
        $this->find_transaksi = null;
    }

    public function getWeeklyTransactions() {
        $dates = collect();
        foreach (range(0, 6) as $i) {
            $date = Carbon::now()->startOfWeek()->addDays($i)->format('Y-m-d');
            $dates->put($date, 0);
        }
        $transactions = Transaksi::whereBetween('created_at', [
            Carbon::now()->startOfWeek()->toDateTimeString(),
            Carbon::now()->endOfWeek()->toDateTimeString()
        ])
        ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(*) as jumlah'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy(DB::raw('DATE(created_at)'))
        ->get()
        ->pluck('jumlah');
        
        $this->transaksiPerHari = $dates->merge($transactions);
    }







}
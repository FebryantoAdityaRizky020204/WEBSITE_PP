<?php

namespace App\Http\Livewire;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class FinanceLivewire extends Component
{
    public $nama_barang, $harga_pembelian, $id_operation, 
        $finance_summary = '';
    
    public function render()
    {
        return view('livewire.finance', [
            'Pengeluaran' => Pengeluaran::all(),
            'Pemasukan' => Pemasukan::all(),
        ]);
    }

    public function resetInputs(){
        $this->nama_barang = '';
        $this->harga_pembelian = '';
        $this->id_operation = '';
        $this->getWeeklyFinanceSummary();
        $this->resetValidation();
    }

    public function mount(){
        $this->getWeeklyFinanceSummary();
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
        $this->dispatch('renderChart', ['finance_summary' => $this->finance_summary]);
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
        $this->dispatch('renderChart', ['finance_summary' => $this->finance_summary]);
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
        $this->dispatch('renderChart', ['finance_summary' => $this->finance_summary]);
    }

    public function getWeeklyFinanceSummary() {
        $dates = [];
        foreach (range(0, 6) as $i) {
            $date = Carbon::now()->startOfWeek()->addDays($i)->format('Y-m-d');
            $dates[$date] = ['pemasukan' => 0, 'pengeluaran' => 0];
        }

        $pemasukan = Pemasukan::whereBetween('created_at', [
            Carbon::now()->startOfWeek()->toDateTimeString(),
            Carbon::now()->endOfWeek()->toDateTimeString()
        ])
        ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(pemasukan) as total_pemasukan'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();

        $pengeluaran = Pengeluaran::whereBetween('created_at', [
            Carbon::now()->startOfWeek()->toDateTimeString(),
            Carbon::now()->endOfWeek()->toDateTimeString()
        ])
        ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(harga_pembelian) as total_pengeluaran'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();

        foreach ($pemasukan as $item) {
            if (isset($dates[$item->tanggal])) {
                $dates[$item->tanggal]['pemasukan'] = $item->total_pemasukan;
            }
        }

        foreach ($pengeluaran as $item) {
            if (isset($dates[$item->tanggal])) {
                $dates[$item->tanggal]['pengeluaran'] = $item->total_pengeluaran;
            }
        }

        $this->finance_summary = $dates;
    }

}
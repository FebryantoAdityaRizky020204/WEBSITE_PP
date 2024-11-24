<?php

namespace App\Http\Livewire;
use App\Models\JenisLaundry;
use App\Models\LayananLaundry;

use Livewire\Component;

class JenisServiceLaundryLivewire extends Component
{
    public $jenis_laundry, $id_jenis_operation;
    public $nama_layanan, $harga_layanan, $satuan_barang, $s_nama_jenis_layanan;

    public function resetInputs(){
        $this->jenis_laundry = '';
        $this->id_jenis_operation = '';
        $this->nama_layanan = '';
        $this->harga_layanan = '';
        $this->satuan_barang = '';
        $this->s_nama_jenis_layanan = '';
    }
    
    // ? render ui
    public function render()
    {
        return view('livewire.services', [
            'JenisLaundry' => JenisLaundry::all(),
            'LayananLaundry' => LayananLaundry::all(),
        ]);
    }

    // ? Tambah Jenis Laundry
    public function addLaundryCategory() {
        $this->validate([
            'jenis_laundry' => 'required|string'
        ]);

        JenisLaundry::create([
            'jenis_laundry' => $this->jenis_laundry
        ]);

        $this->resetInputs();
        session()->flash('message', 'Jenis Laundry Berhasil Ditambahkan');
        $this->dispatch('close-modal');
    }

    public function showEditLaundryCategory($id){
        $JenisLaundry = JenisLaundry::where('id', $id)->first();
        $this->jenis_laundry = $JenisLaundry->jenis_laundry;
        $this->id_jenis_operation = $id;
    }

    public function editLaundryCategory() {
        $this->validate([
            'jenis_laundry' => 'required|string'
        ]);

        $JenisLaundry = JenisLaundry::where('id', $this->id_jenis_operation)->first();
        $JenisLaundry->update([
            'jenis_laundry' => $this->jenis_laundry
        ]);

        $this->resetInputs();
        session()->flash('message', 'Jenis Laundry Berhasil Diubah');
        $this->dispatch('close-modal');
    }

    public function showDeleteLaundryCategory($id){
        $JenisLaundry = JenisLaundry::where('id', $id)->first();
        $this->jenis_laundry = $JenisLaundry->jenis_laundry;
        $this->id_jenis_operation = $id;
    }

    public function deleteLaundryCategory() {
        $JenisLaundry = JenisLaundry::where('id', $this->id_jenis_operation)->first();
        $JenisLaundry->delete();
        $LayananLaundry = LayananLaundry::where('id_jenis_laundry', $this->id_jenis_operation)->delete();

        $this->resetInputs();
        session()->flash('message', 'Jenis Laundry Berhasil Dihapus');
        $this->dispatch('close-modal');
    }


    

    public function showAddService($id){
        $JenisLaundry = JenisLaundry::where('id', $id)->first();
        $this->jenis_laundry = $JenisLaundry->jenis_laundry;
        $this->id_jenis_operation = $id;
    }

    public function addService() {
        $this->validate([
            'nama_layanan' => 'required|string',
            'harga_layanan' => 'required|numeric',
            'satuan_barang' => 'required|string'
        ]);

        LayananLaundry::create([
            'id_jenis_laundry' => $this->id_jenis_operation,
            'nama_layanan' => $this->nama_layanan,
            'harga_layanan' => $this->harga_layanan,
            'satuan_barang' => $this->satuan_barang
        ]);

        $this->resetInputs();
        session()->flash('message', 'Layanan Laundry Berhasil Ditambahkan');
        $this->dispatch('close-modal');
    }

    public function showEditService($id){
        $LayananLaundry = LayananLaundry::where('id', $id)->first();
        $this->nama_layanan = $LayananLaundry->nama_layanan;
        $this->harga_layanan = $LayananLaundry->harga_layanan;
        $this->satuan_barang = $LayananLaundry->satuan_barang;
        $this->id_jenis_operation = $id;
        $this->s_nama_jenis_layanan = JenisLaundry::where('id', $LayananLaundry->id_jenis_laundry)->first()->jenis_laundry;
    }

    public function editService()
    {
        $this->validate([
            'nama_layanan' => 'required|string',
            'harga_layanan' => 'required|numeric',
            'satuan_barang' => 'required|string'
        ]);

        $LayananLaundry = LayananLaundry::where('id', $this->id_jenis_operation)->first();
        $LayananLaundry->update([
            'nama_layanan' => $this->nama_layanan,
            'harga_layanan' => $this->harga_layanan,
            'satuan_barang' => $this->satuan_barang
        ]);

        $this->resetInputs();
        session()->flash('message', 'Layanan Laundry Berhasil Diupdate');
        $this->dispatch('close-modal');
    }

    public function showDeleteService($id){
        $LayananLaundry = LayananLaundry::where('id', $id)->first();
        $this->nama_layanan = $LayananLaundry->nama_layanan;
        $this->id_jenis_operation = $id;
    }

    public function deleteService() {
        $LayananLaundry = LayananLaundry::where('id', $this->id_jenis_operation)->first();
        $LayananLaundry->delete();

        $this->resetInputs();
        session()->flash('message', 'Layanan Laundry Berhasil Dihapus');
        $this->dispatch('close-modal');
    }

}
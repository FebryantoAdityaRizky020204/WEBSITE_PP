<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $nama;
    public $email;
    public $alamat;
    public $updateData = false;
    public $employeeId;
    public $kataKunci;
    public $employeeSelected = [];
    public $sortColumn = 'nama';
    public $sortDirect = 'asc';
    
    public function render() {
        if($this->kataKunci != null){
            $data = ModelsEmployee::where('nama','like','%' .$this->kataKunci.'%')
                ->orWhere('email','like','%' .$this->kataKunci.'%')
                ->orWhere('alamat','like','%' .$this->kataKunci.'%')
                ->orderBy($this->sortColumn, $this->sortDirect)->paginate(5);
        } else {
            $data = ModelsEmployee::orderBy($this->sortColumn, $this->sortDirect)->paginate(5);
        }
        return view('livewire.employee', ['dataEmployees' => $data]);
    }

    public function store() {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'alamat.required' => 'Alamat harus diisi',
        ];

        $validated = $this->validate($rules, $pesan);

        ModelsEmployee::create($validated);
        session()->flash('success', 'Data berhasil ditambahkan');
        $this->clearInput();
    }

    public function edit($id){
        $data = ModelsEmployee::find($id);
        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->alamat = $data->alamat;

        $this->updateData = true;
        $this->employeeId = $id;
    }

    public function update(){
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'alamat.required' => 'Alamat harus diisi',
        ];

        $validated = $this->validate($rules, $pesan);

        $data = ModelsEmployee::find($this->employeeId);
        $data->update($validated);
        session()->flash('success', 'Data berhasil Diupdate');
        $this->clearInput();
    }

    public function deleteData(){
        if($this->employeeId != null){
            $id = $this->employeeId;
            ModelsEmployee::find($id)->delete();
        }

        else if($this->employeeSelected != null){
            for($x = 0; $x < count($this->employeeSelected); $x++){
                ModelsEmployee::find($this->employeeSelected[$x])->delete();
            }
        }

        session()->flash('success', 'Data Berhasil dihapus');
        $this->clearInput();
    }

    public function deleteConfirm($id) {
        if($id != null){
            $this->employeeId = $id;
        }
        $this->employeeSelected = [];
    }

    public function sort($column){
        $this->sortColumn = $column;
        $this->sortDirect = $this->sortDirect == 'asc' ? 'desc' : 'asc';
    }

    public function clearInput() {
        $this->nama = '';
        $this->email = '';
        $this->alamat = '';
        $this->updateData = false;
        $this->employeeId = '';
        $this->employeeSelected = [];
    }
}
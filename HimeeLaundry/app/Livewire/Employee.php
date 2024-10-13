<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class Employee extends Component
{
    public $nama;
    public $email;
    public $alamat;
    
    public function render() {
        return view('livewire.employee');
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
    }
}
<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\JenisLaundry;
use App\Models\LayananLaundry;
use App\Http\Livewire\CheckLivewire;
use App\Models\Pelanggan;

class IntegrationTest extends TestCase {

    /** @test */
    public function PengujianPencarianTransaksi(){
        $namaPelanggan = 'Aditya Rizky';
        $nomorTelepon = '081212344321';

        Livewire::test(CheckLivewire::class)
            ->set('nama_pelanggan', $namaPelanggan)
            ->set('nomor_telepon', $nomorTelepon)
            ->call('doFindTransaksi')
            ->assertSee('Laundry Transaction Created');
    }

    /** @test */
    public function EditDataPelanggan(){
        $nomorTelepon = '081212344321';
        $nomorTeleponBaru = '081212342222';

        $pelanggan = Pelanggan::where('nomor_telepon', $nomorTelepon)->first();
        $pelanggan->update(['nomor_telepon' => $nomorTeleponBaru ]);

        $this->assertDatabaseHas('pelanggan', [
            'nomor_telepon' => $nomorTeleponBaru,
            'nama_pelanggan' => 'Aditya Rizky',
        ]);
    }

    /** @test */
    public function PengujianPencarianTransaksiSetelahDataDiedit(){
        $namaPelanggan = 'Aditya Rizky';
        $nomorTelepon = '081212344321';

        Livewire::test(CheckLivewire::class)
            ->set('nama_pelanggan', $namaPelanggan)
            ->set('nomor_telepon', $nomorTelepon)
            ->call('doFindTransaksi')
            ->assertSee('Tidak Ditemukan');
    }
}
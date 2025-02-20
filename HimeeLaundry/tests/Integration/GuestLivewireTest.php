<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\JenisLaundry;
use App\Models\LayananLaundry;

class GuestLivewireTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function halaman_bisa_diakses(): void {
        Livewire::test('guest-livewire')->assertStatus(200);
    }

    /** @test */
    public function menampilkan_nama_layanan_dan_jenis_layanan_yang_ada()
    {
        // ? Buat data dummy di database
        $dummyJL = JenisLaundry::create([
            'jenis_laundry' => 'Pakaian'
        ]);

        LayananLaundry::create([
            'id_jenis_laundry' => $dummyJL->id,
            'nama_layanan' => 'TestNamaLayanan',
            'harga_layanan' => '10000',
            'estimasi_pengerjaan' => 2,
            'satuan_barang' => 'Kg',
            'satuan_waktu' => 'Jam',
        ]);

        // ? Uji apakah data muncul di UI
        Livewire::test('guest-livewire')
            ->assertSee('Pakaian')
            ->assertSee('TestNamaLayanan');
    }
}
<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\JenisLaundry;
use App\Models\LayananLaundry;

class GuestCheckLivewireTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function halaman_bisa_diakses(): void {
        Livewire::test('check-livewire')->assertStatus(200);
    }

    /** @test */
    public function transaksi_tidak_ditemukan()
    {
        Livewire::test('check-livewire')
            ->set('nama_pelanggan', 'Jane Doe')
            ->set('nomor_telepon', '081234567891')
            ->call('doFindTransaksi')
            ->assertSee('Tidak Ditemukan');
    }
}
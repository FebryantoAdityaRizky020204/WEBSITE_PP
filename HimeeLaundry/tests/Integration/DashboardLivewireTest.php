<?php

namespace Tests\Integration;

use App\Http\Livewire\DashboardLivewire;
use App\Models\Pengelola;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DashboardLivewireTest extends TestCase
{
    use RefreshDatabase; // Membersihkan database setiap kali test

    /** @test */
    public function berhasil_membuka_halaman()
    {
        $user = Pengelola::factory()->create([
            'nama_pengelola' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret'),
        ]);

        $this->actingAs($user);

        Livewire::test(DashboardLivewire::class)
            ->assertStatus(200);
    }

    /** @test */
    public function fnc_merender_halaman_dashboard()
    {
        $user = Pengelola::factory()->create([
            'nama_pengelola' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret'),
        ]);

        $this->actingAs($user);

        Livewire::test(DashboardLivewire::class)
            ->assertViewIs('livewire.dashboard');
    }

    /** @test */
    public function func_meredirect_ke_halaman_transaction_ketika_buatTransaksi_dipanggil()
    {
        Livewire::test(DashboardLivewire::class)
            ->call('buatTransaksi')
            ->assertRedirect(route('transactions'))
            ->assertSessionHas('do', 'addTransaksi');
    }

    /** @test */
    public function func_meredirect_ke_halaman_finance_ketika_tambahPengeluaran_dipanggil()
    {
        Livewire::test(DashboardLivewire::class)
            ->call('tambahPengeluaran')
            ->assertRedirect(route('finance'))
            ->assertSessionHas('do', 'addPengeluaran');
    }
}
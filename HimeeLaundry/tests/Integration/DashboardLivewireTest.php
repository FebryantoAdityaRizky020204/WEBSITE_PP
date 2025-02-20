<?php

namespace Tests\Integration;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\DashboardLivewire;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardLivewireTest extends TestCase
{
    use RefreshDatabase; // Membersihkan database setiap kali test

    /** @test */
    public function berhasil_membuka_halaman(){
        $response = $this->get(route('user-home'));
        $response->assertStatus(200);
    }
    
    /** @test */
    public function fnc_merender_halaman_dashboard()
    {
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

    /** @test */
    // public function it_can_get_weekly_transactions()
    // {
    //     // Buat transaksi untuk minggu ini
    //     $date1 = Carbon::now()->startOfWeek();
    //     $date2 = Carbon::now()->startOfWeek()->addDays(2);
        
    //     Transaksi::factory()->create(['created_at' => $date1]);
    //     Transaksi::factory()->create(['created_at' => $date2]);

    //     Livewire::test(DashboardLivewire::class)
    //         ->call('getWeeklyTransactions')
    //         ->assertSee($date1->format('Y-m-d'))
    //         ->assertSee($date2->format('Y-m-d'));
    // }

    /** @test */
    // public function it_can_search_transactions()
    // {
    //     // Simpan transaksi
    //     $transaksi = Transaksi::factory()->create([
    //         'id_transaksi' => 'TRX001'
    //     ]);

    //     Livewire::test(DashboardLivewire::class)
    //         ->set('search', 'TRX001')
    //         ->call('updatedSearch')
    //         ->assertSee('TRX001');
    // }
}
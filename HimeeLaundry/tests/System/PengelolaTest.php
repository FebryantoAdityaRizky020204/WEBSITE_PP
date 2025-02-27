<?php

namespace Tests\System;

use App\Http\Livewire\Auth\LoginLivewire;
use App\Http\Livewire\Auth\Logout;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\FinanceLivewire;
use App\Http\Livewire\JenisServiceLaundryLivewire;
use App\Http\Livewire\DetailTransactionsLivewire;
use App\Http\Livewire\TransactionsLivewire;
use App\Models\JenisLaundry;
use App\Models\LayananLaundry;
use App\Models\Pengelola;
use App\Models\Transaksi;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Crypt;
use Livewire\Livewire;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;

class PengelolaTest extends TestCase {
    use DatabaseTransactions;

    protected function setUp(): void {
        parent::setUp();
        auth()->logout();
        session()->flush();
    }
    
    /** @test */
    public function testHalamanLogin() {
        $this->get(route('login'))
            ->assertStatus(200);
        Livewire::test(LoginLivewire::class)
            ->assertViewIs('livewire.auth.login');

        Livewire::test(LoginLivewire::class)
            ->set('email', 'admin@material.com')
            ->set('password', 'secret')
            ->call('store')
            ->assertRedirect(route('dashboard'));
    }

    /** @test */
    public function testBukaHalamanAdminDashboardTransactionsServicesDanFinance(){
        $user = Pengelola::where('email', 'admin@material.com')->first();
        $this->actingAs($user);

        $this->get(route('dashboard'))
            ->assertStatus(200);
        $this->get(route('transactions'))
            ->assertStatus(200);
        $this->get(route('services'))
            ->assertStatus(200);
        $this->get(route('finance'))
            ->assertStatus(200);

        Livewire::test(DashboardLivewire::class)
            ->assertViewIs('livewire.dashboard');
        Livewire::test(TransactionsLivewire::class)
            ->assertViewIs('livewire.transactions');
        Livewire::test(JenisServiceLaundryLivewire::class)
            ->assertViewIs('livewire.services');
        Livewire::test(FinanceLivewire::class)
            ->assertViewIs('livewire.finance');
    }

    /** @test */
    public function testTambahkanJenisLaundryDanLayananLaundry(){
        Livewire::test(JenisServiceLaundryLivewire::class)
            ->set('jenis_laundry', 'Sepatu')
            ->call('addLaundryCategory')
            ->assertSee('Sepatu');
        
        $this->assertDatabaseHas('jenis_laundry', ['jenis_laundry' => 'Sepatu']);

        $sepatu = JenisLaundry::where('jenis_laundry', 'Sepatu')->first();

        Livewire::test(JenisServiceLaundryLivewire::class)
            ->set('id_jenis_operation', $sepatu->id)
            ->set('nama_layanan', 'Cuci Sepatu Putih')
            ->set('harga_layanan', '10000')
            ->set('estimasi_pengerjaan', '2')
            ->set('satuan_barang', 'Pasang')
            ->set('satuan_waktu', 'Hari')
            ->call('addService')
            ->assertSee('Cuci Sepatu Putih');
    }

    public function testTambahkanTransaksiBaru(){
        $layanan = LayananLaundry::where('nama_layanan', 'Cuci Kering')->first();
        Livewire::test(TransactionsLivewire::class)
            ->set('nama_pelanggan', 'Budi Bayu')
            ->set('nomor_telepon', '082143211234')
            ->set('id_layanan', [$layanan->id])
            ->set('nilai_barang', [1]) 
            ->set('pemasukan', 30000)
            ->set('status_pembayaran', 'Lunas')
            ->call('storeTransaksi');
        
        $this->assertDatabaseHas('transaksi', ['status_laundry' => 'Sedang Diproses',]);
        $this->assertDatabaseHas('pelanggan', [
            'nama_pelanggan' => 'Budi Bayu',
            'nomor_telepon' => '082143211234',
        ]);
        $this->assertDatabaseHas('pemasukan', [
            'pemasukan' => 30000,
            'status_pembayaran' => 'Lunas',
        ]);
        $this->assertDatabaseHas('transaksi_layanan', [
            'id_layanan' => $layanan->id,
            'nilai_barang' => 2,
        ]);
    }

    public function testHalamanDetailTransaksi(){
        $transaksi = Transaksi::where('status_laundry', 'Selesai')->first();
        $id_tr = Crypt::encrypt($transaksi->id_transaksi);
        
        Livewire::test(DetailTransactionsLivewire::class, ['id' => $id_tr])
            ->assertViewIs('livewire.detail-transaction');

        Livewire::test(DetailTransactionsLivewire::class, ['id' => $id_tr])
            ->set('id_transaksi', $transaksi->id)
            ->set('nama_barang', 'Baju Putih')
            ->set('jumlah_barang', '2')
            ->call('addRincianLaundry')
            ->assertSee('Baju Putih');
        
        $this->assertDatabaseHas('rincian_laundry', [
            'nama_barang' => 'Baju Putih',
            'jumlah_barang' => 2,
        ]);
    }

    public function testTambahPengeluaran(){
        Livewire::test(FinanceLivewire::class)
            ->set('nama_barang', 'Pewangi Pakaian')
            ->set('harga_pembelian', '50000')
            ->call('addPengeluaran')
            ->assertSee('Pewangi Pakaian');
    }

    public function testLogout() {
        Livewire::test(Logout::class)
            ->call('destroy')
            ->assertRedirect(route('login'));

        $this->get(route('dashboard'))
            ->assertStatus(302);

        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    }
}
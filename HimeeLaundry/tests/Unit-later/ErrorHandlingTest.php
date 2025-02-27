<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Livewire\CheckLivewire;
use App\Http\Livewire\FinanceLivewire;
use App\Http\Livewire\TransactionsLivewire;
use App\Http\Livewire\Auth\LoginLivewire;
use App\Http\Livewire\JenisServiceLaundryLivewire;
use Livewire\Livewire;

class ErrorHandlingTest extends TestCase
{
    // ? Testing Error Handling Validasi CheckLivewire
    /** @test */
    public function checkLivewire_doFindTransaksi_error_ketika_input_kosong(): void {
        Livewire::test(CheckLivewire::class)
            ->call('doFindTransaksi')
            ->assertSee('The nomor telepon field is required.')
            ->assertSee('The nama pelanggan field is required.');
    }

    /** @test */
    public function checkLivewire_doFindTransaksi_error_ketika_input_tidak_valid(): void {
        Livewire::test(CheckLivewire::class)
            ->set('nomor_telepon', '1234')
            ->call('doFindTransaksi')
            ->assertSee('The nomor telepon must be between 10 and 15 digits.');
    }

    // ? Testing Error Handling Validasi LoginLivewire
    /** @test */
    public function loginLivewire_login_error_ketika_input_kosong(): void {
        Livewire::test(LoginLivewire::class)
            ->set('email', '')
            ->set('password', '')
            ->call('store')
            ->assertSee('The email field is required.')
            ->assertSee('The password field is required.');
    }

    public function loginLivewire_login_error_ketika_akun_salah_atau_tidak_ada(): void {
        Livewire::test(LoginLivewire::class)
            ->set('email', 'email@example.com')
            ->set('password', 'TestInput')
            ->call('store')
            ->assertSee('Your provided credentials could not be verified.');
    }

    // ? Testing Error Handling Validasi FinanceLivewire
    /** @test */
    public function financeLivewire_addPengeluaran_error_ketika_input_kosong(): void {
        Livewire::test(FinanceLivewire::class)
            ->call('addPengeluaran')
            ->assertSee('The nama barang field is required.')
            ->assertSee('The harga pembelian field is required.');
    }

    /** @test */
    public function financeLivewire_addPengeluaran_error_ketika_input_tidak_valid(): void {
        Livewire::test(FinanceLivewire::class)
            ->set('harga_pembelian', 'TestInput')
            ->call('addPengeluaran')
            ->assertSee('The harga pembelian must be a number.');
    }

    /** @test */
    public function financeLivewire_editPengeluaran_error_ketika_input_kosong(): void
    {
        Livewire::test(FinanceLivewire::class)
            ->call('editPengeluaran')
            ->assertSee('The nama barang field is required.')
            ->assertSee('The harga pembelian field is required.');
    }

    // ? Testing Error Handling Validasi JenisServiceLaundryLivewire
    /** @test */
    public function jenisServiceLaundryLivewire_addLaundryCategory_error_ketika_input_kosong(): void
    {
        Livewire::test(JenisServiceLaundryLivewire::class)
            ->call('addLaundryCategory')
            ->assertSee('The jenis laundry field is required.');
    }

    /** @test */
    public function jenisServiceLaundryLivewire_editLaundryCategory_error_ketika_input_kosong(): void
    {
        Livewire::test(JenisServiceLaundryLivewire::class)
            ->call('editLaundryCategory')
            ->assertSee('The jenis laundry field is required.');
    }

    /** @test */
    public function jenisServiceLaundryLivewire_addService_error_ketika_input_kosong(): void
    {
        Livewire::test(JenisServiceLaundryLivewire::class)
            ->call('addService')
            ->assertSee('The nama layanan field is required.')
            ->assertSee('The harga layanan field is required.')
            ->assertSee('The estimasi pengerjaan field is required.')
            ->assertSee('The satuan barang field is required.')
            ->assertSee('The satuan waktu field is required.');
    }

    public function jenisServiceLaundryLivewire_editService_error_ketika_input_kosong(): void
    {
        Livewire::test(JenisServiceLaundryLivewire::class)
            ->call('editService')
            ->assertSee('The nama layanan field is required.')
            ->assertSee('The harga layanan field is required.')
            ->assertSee('The estimasi pengerjaan field is required.')
            ->assertSee('The satuan barang field is required.')
            ->assertSee('The satuan waktu field is required.');
    }

    // ? Testing Error Handling Validasi TransactionsLivewire
    /** @test */
    public function TransactionsLivewire_addService_error_ketika_input_kosong(): void
    {
        Livewire::test(TransactionsLivewire::class)
            ->call('storeTransaksi')
            ->assertSee('The nama pelanggan field is required.')
            ->assertSee('The nomor telepon field is required.')
            ->assertSee('The nilai_barang.0 field is required.')
            ->assertSee('The id_layanan.0 field is required.')
            ->assertSee('The status pembayaran field is required.');
    }
}
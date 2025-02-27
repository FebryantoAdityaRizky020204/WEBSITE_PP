<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Livewire\CheckLivewire;
use App\Http\Livewire\TransactionsLivewire;
use App\Http\Livewire\Auth\LoginLivewire;
use App\Http\Livewire\JenisServiceLaundryLivewire;
use Livewire\Livewire;

class UnitTest extends TestCase {

    /** @test */
    public function NormalCaseTest() {
        $namaPelanggan = 'Aditya Rizky';
        $nomorTelepon = '081212344321';

        Livewire::test(CheckLivewire::class)
            ->set('nama_pelanggan', $namaPelanggan)
            ->set('nomor_telepon', $nomorTelepon)
            ->call('doFindTransaksi')
            ->assertSee('Laundry Transaction Created');
    }

    /** @test */
    public function EdgeCaseTest() {
        $namaPelanggan = 'Aditya Febryanto';
        $nomorTelepon = '081212344321';

        Livewire::test(CheckLivewire::class)
            ->set('nama_pelanggan', $namaPelanggan)
            ->set('nomor_telepon', $nomorTelepon)
            ->call('doFindTransaksi')
            ->assertSee('Tidak Ditemukan');
    }

    /** @test */
    public function InvalidInput() {
        $namaPelanggan = '';
        $nomorTelepon = '0812';

        Livewire::test(CheckLivewire::class)
            ->set('nama_pelanggan', $namaPelanggan)
            ->set('nomor_telepon', $nomorTelepon)
            ->call('doFindTransaksi')
            ->assertSee('The nama pelanggan field is required.')
            ->assertSee('The nomor telepon must be between 10 and 15 digits.');
    }
    
}
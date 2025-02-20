<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\DetailTransactionsLivewire;
use PhpParser\Node\Expr\Cast\Object_;

class ResetInputTest extends TestCase
{
    /** @test */
    public function reset_input_DashboardLivewire(): void
    {
        $dashboard = new DashboardLivewire();
        $dashboard->id_transaksi = '21';
        $dashboard->search = 'TestSearch';
        $dashboard->find_transaksi = ['somedata'];
        
        $dashboard->resetInputs();

        $this->assertEquals('', $dashboard->id_transaksi);
        $this->assertEquals('', $dashboard->search);
        $this->assertNull($dashboard->find_transaksi);
    }

    /** @test */
    // public function reset_input_DetailTransaksiLivewire(): void {
    //     $detail = new DetailTransactionsLivewire();

    //     $detail->nama_barang = 'TestReset';
    //     $detail->jumlah_barang = 'TestReset';
    //     $detail->id_operation = 'TestReset';
    //     $detail->teks_operation = 'TestReset';
    //     $detail->nama_pelanggan = 'TestReset';
    //     $detail->nomor_telepon = 'TestReset';
    //     $detail->status_pembayaran = 'TestReset';
    //     $detail->status_laundry = 'TestReset';

    //     $detail->resetInputs();

    //     $this->assertEquals('', $detail->nama_barang);
    //     $this->assertEquals('', $detail->jumlah_barang);
    //     $this->assertEquals('', $detail->id_operation);
    //     $this->assertEquals('', $detail->teks_operation);
    //     $this->assertEquals('', $detail->nama_pelanggan);
    //     $this->assertEquals('', $detail->nomor_telepon);
    //     $this->assertEquals('', $detail->status_pembayaran);
    //     $this->assertEquals('', $detail->status_laundry);
    // }
}
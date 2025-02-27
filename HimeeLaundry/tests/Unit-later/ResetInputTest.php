<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\JenisServiceLaundryLivewire;
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
    public function reset_input_FinanceLivewire(): void {
        $finance = new JenisServiceLaundryLivewire();
        $finance->jenis_laundry = 'TestInput';
        $finance->id_jenis_operation = 'TestInput';
        $finance->nama_layanan = 'TestInput';
        $finance->harga_layanan = 'TestInput';
        $finance->satuan_barang = 'TestInput';
        $finance->s_nama_jenis_layanan = 'TestInput';
        $finance->estimasi_pengerjaan = 'TestInput';
        $finance->satuan_waktu = 'TestInput';
        

        $finance->resetInputs();

        $this->assertEquals('', $finance->jenis_laundry);
        $this->assertEquals('', $finance->id_jenis_operation);
        $this->assertEquals('', $finance->nama_layanan);
        $this->assertEquals('', $finance->harga_layanan);
        $this->assertEquals('', $finance->satuan_barang);
        $this->assertEquals('', $finance->s_nama_jenis_layanan);
        $this->assertEquals('', $finance->estimasi_pengerjaan);
        $this->assertEquals('', $finance->satuan_waktu);
    }

    
}
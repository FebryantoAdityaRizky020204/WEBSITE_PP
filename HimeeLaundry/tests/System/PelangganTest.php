<?php

namespace Tests\System;

use App\Http\Livewire\CheckLivewire;
use App\Http\Livewire\GuestLivewire;
use Livewire\Livewire;
use Tests\TestCase;

class PelangganTest extends TestCase {
    /** @test */
    public function testHalamanHome() {
        $this->get(route('user-home'))
            ->assertStatus(200);
        
        Livewire::test(GuestLivewire::class)
            ->assertViewIs('livewire.guest.home');
    }

    /** @test */
    public function testHalamanCheck(){
        $this->get(route('user-check'))
            ->assertStatus(200);
        
        Livewire::test(CheckLivewire::class)
            ->assertViewIs('livewire.guest.check');
    }
    
    /** @test */
    public function testCariDataTransaksi(){
        $namaPelanggan = 'Aditya Rizky';
        $nomorTelepon = '081212342222';

        Livewire::test(CheckLivewire::class)
            ->set('nama_pelanggan', $namaPelanggan)
            ->set('nomor_telepon', $nomorTelepon)
            ->call('doFindTransaksi')
            ->assertSee('Laundry Transaction Created');
    }
    
}
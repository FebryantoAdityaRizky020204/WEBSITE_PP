<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Livewire\CheckLivewire;
use App\Http\Livewire\GuestLivewire;
use App\Http\Livewire\Auth\LoginLivewire;
use Livewire\Livewire;

class InterfaceTest extends TestCase {
    // ? Test Status Halaman

    /** @test */
    public function guestLivewire_status() {
        Livewire::test(GuestLivewire::class)->assertStatus(200);
    }

    /** @test */
    public function loginLivewire_status() {
        Livewire::test(LoginLivewire::class)->assertStatus(200);
    }

    /** @test */
    public function checkLivewire_status() {
        Livewire::test(CheckLivewire::class)->assertStatus(200);
    }

    // ? Test Render Halaman Sudah Benar

    /** @test */
    public function guestLivewire_render() {
        Livewire::test(GuestLivewire::class)
            ->assertViewIs('livewire.guest.home');
    }

    /** @test */
    public function checkLivewire_render() {
        Livewire::test(CheckLivewire::class)
            ->assertViewIs('livewire.guest.check');
    }

    /** @test */
    public function loginLivewire_render() {
        Livewire::test(LoginLivewire::class)
            ->assertViewIs('livewire.auth.login');
    }

}
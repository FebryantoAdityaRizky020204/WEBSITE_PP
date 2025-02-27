<?php

namespace Tests\Integration;

use App\Http\Livewire\Auth\LoginLivewire;
use App\Http\Livewire\DashboardLivewire;
use App\Models\Pengelola;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class IntegrationsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function test_login_pengelola(){
        $user = Pengelola::factory()->create([
            'nama_pengelola' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret'),
        ]);

        Livewire::test(LoginLivewire::class)
            ->set('email', 'admin@material.com')
            ->set('password', 'secret')
            ->call('store')
            ->assertRedirect(route('dashboard'));
    }
}
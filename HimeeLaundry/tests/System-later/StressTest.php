<?php

namespace Tests\System;

use App\Http\Livewire\Auth\LoginLivewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class StressTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function stress_test_handle_login_100kali()
    {
        $this->withoutExceptionHandling();

        for ($i = 0; $i < 100; $i++) {
            Livewire::test(LoginLivewire::class)
                ->set('email', 'user@example.com')
                ->set('password', 'password123')
                ->call('store')
                ->assertOk();
        }
    }
}
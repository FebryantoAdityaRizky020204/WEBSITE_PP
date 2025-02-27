<?php

namespace Tests\System;


use App\Http\Livewire\DashboardLivewire;
use Livewire\Livewire;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    /** @test */
    public function security_test_buka_halaman_adminDashboard_tanpa_login()
    {
        $this->get(route('dashboard'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function security_test_buka_halaman_adminTransaction_tanpa_login()
    {
        $this->get(route('transactions'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function security_test_buka_halaman_adminDetilTransaction_tanpa_login()
    {
        $this->get(route('detail-transactions', ['id' => 'justrandomid']))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function security_test_buka_halaman_adminServices_tanpa_login()
    {
        $this->get(route('services'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
    
    /** @test */
    public function security_test_buka_halaman_adminFinance_tanpa_login()
    {
        $this->get(route('finance'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
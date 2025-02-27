<?php

namespace Tests\System;


use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\Auth\LoginLivewire;
use App\Http\Livewire\FinanceLivewire;
use App\Models\Pengelola;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PerformanceTest extends TestCase {
    
    use RefreshDatabase;
}
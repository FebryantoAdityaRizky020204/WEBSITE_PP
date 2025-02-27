<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pengelola;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Pengelola::factory()->create([
            'nama_pengelola' => 'Admin',
            'email' => 'admin@material.com',
            'password' => bcrypt('secret')
        ]);
    }
}
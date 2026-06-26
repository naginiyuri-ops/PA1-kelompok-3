<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah sudah ada, jika belum buat
        Admin::firstOrCreate(
            ['email' => 'admintamaneden@gmail.com'],
            [
                'name' => 'Admin GeoToba',
                'password' => Hash::make('admin123'),
            ]
        );
        
        $this->command->info('Admin berhasil dibuat!');
        $this->command->info('Email: admintamaneden@gmail.com');
        $this->command->info('Password: admin123');
    }
}
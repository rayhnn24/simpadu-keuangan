<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            KategoriUktSeeder::class,
            BeasiswaSeeder::class,
            MhsUktSeeder::class,
            BeasiswaMhsSeeder::class,
            PembayaranSeeder::class,
        ]);
    }
}
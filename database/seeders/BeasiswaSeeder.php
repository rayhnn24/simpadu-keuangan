<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beasiswa;

class BeasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Beasiswa::updateOrCreate(
            ['nama_beasiswa' => 'KIPK (Kartu Indonesia Pintar Kuliah)'],
            [
                'keterangan' => 'Eksternal',
                'potongan_persen' => 100,
            ]
        );

        Beasiswa::updateOrCreate(
            ['nama_beasiswa' => 'IBFL (Indonesian Bright Future Leaders)'],
            [
                'keterangan' => 'Eksternal',
                'potongan_persen' => 50,
            ]
        );

        Beasiswa::updateOrCreate(
            ['nama_beasiswa' => 'Lembaga Amil Zakat (LAZ Poliban)'],
            [
                'keterangan' => 'Internal',
                'potongan_persen' => 50,
            ]
        );
    }
}
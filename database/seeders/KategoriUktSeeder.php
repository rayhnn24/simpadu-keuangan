<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriUkt;

class KategoriUktSeeder extends Seeder
{
    public function run(): void
    {
        $dataProdi = [
            [
                'id_prodi' => 1,
                'jenjang' => 'D3',
                'prodi' => 'D3 Administrasi Bisnis',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 2,
                'jenjang' => 'D4',
                'prodi' => 'D4 Bisnis Digital',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 3,
                'jenjang' => 'D4',
                'prodi' => 'D4 Teknologi Rekayasa Pembangkit Energi',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 4,
                'jenjang' => 'D4',
                'prodi' => 'D4 Sistem Informasi Kota Cerdas',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 5,
                'jenjang' => 'D4',
                'prodi' => 'D4 Teknologi Rekayasa Otomasi',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 6,
                'jenjang' => 'D3',
                'prodi' => 'D3 Elektronika',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 7,
                'jenjang' => 'D3',
                'prodi' => 'D3 Teknik Informatika',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => 5700000
            ],
            [
                'id_prodi' => 8,
                'jenjang' => 'D3',
                'prodi' => 'D3 Teknik Listrik',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => 7000000
            ],
            [
                'id_prodi' => 9,
                'jenjang' => 'D3',
                'prodi' => 'D3 Sistem Informasi',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
        ];

        foreach ($dataProdi as $prodi) {
            foreach ($prodi['ukt'] as $index => $nominal) {
                KategoriUkt::updateOrCreate(
                    [
                        'id_prodi' => $prodi['id_prodi'],
                        'kategori' => 'UKT ' . ($index + 1),
                        'jenjang' => $prodi['jenjang']
                    ],
                    [
                        'nominal_ukt' => $nominal
                    ]
                );
            }

            if ($prodi['kerjasama'] !== null) {
                KategoriUkt::updateOrCreate(
                    [
                        'id_prodi' => $prodi['id_prodi'],
                        'kategori' => 'JALUR KERJASAMA',
                        'jenjang' => $prodi['jenjang']
                    ],
                    [
                        'nominal_ukt' => $prodi['kerjasama']
                    ]
                );
            }
        }
    }
}
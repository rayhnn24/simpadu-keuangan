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
                'prodi' => 'Administrasi Bisnis',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 2,
                'jenjang' => 'D3',
                'prodi' => 'Manajemen Informatika',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 3,
                'jenjang' => 'D3',
                'prodi' => 'Akuntansi',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 4,
                'jenjang' => 'D3',
                'prodi' => 'Komputerisasi Akuntansi',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 5,
                'jenjang' => 'D3',
                'prodi' => 'Elektronika',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 6,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Geodesi',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 7,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Informatika',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => 5700000
            ],
            [
                'id_prodi' => 8,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Listrik',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => 7000000
            ],
            [
                'id_prodi' => 9,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Mesin Produksi',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 10,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Mesin Otomotif',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 11,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Sipil',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 12,
                'jenjang' => 'D4',
                'prodi' => 'Akuntansi Lembaga Keuangan Syariah',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 13,
                'jenjang' => 'D4',
                'prodi' => 'Teknik Bangunan Rawa',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 14,
                'jenjang' => 'D3',
                'prodi' => 'Alat Berat',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => 5700000
            ],
            [
                'id_prodi' => 15,
                'jenjang' => 'D3',
                'prodi' => 'Teknik Pertambangan',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 16,
                'jenjang' => 'D4',
                'prodi' => 'Teknologi Rekayasa Konstruksi Jalan dan Jembatan',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 17,
                'jenjang' => 'D4',
                'prodi' => 'Bisnis Digital',
                'ukt' => [450000, 950000, 2000000, 3000000, 4000000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 18,
                'jenjang' => 'D4',
                'prodi' => 'Teknologi Rekayasa Pembangkit Energi',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 19,
                'jenjang' => 'D4',
                'prodi' => 'Sistem Informasi Kota Cerdas',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
            [
                'id_prodi' => 20,
                'jenjang' => 'D4',
                'prodi' => 'Teknologi Rekayasa Otomasi',
                'ukt' => [500000, 1000000, 2900000, 3900000, 4900000],
                'kerjasama' => null
            ],
        ];

        foreach ($dataProdi as $prodi) {
            foreach ($prodi['ukt'] as $index => $nominal) {
                KategoriUkt::create([
                    'id_prodi' => $prodi['id_prodi'],
                    'kategori' => 'UKT ' . ($index + 1),
                    'nominal_ukt' => $nominal,
                    'jenjang' => $prodi['jenjang']
                ]);
            }

            if ($prodi['kerjasama'] !== null) {
                KategoriUkt::create([
                    'id_prodi' => $prodi['id_prodi'],
                    'kategori' => 'JALUR KERJASAMA',
                    'nominal_ukt' => $prodi['kerjasama'],
                    'jenjang' => $prodi['jenjang']
                ]);
            }
        }
    }
}
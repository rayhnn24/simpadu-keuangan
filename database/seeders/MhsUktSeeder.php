<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MhsUkt;
use App\Models\KategoriUkt;
use App\Models\StatusMhs;

class MhsUktSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/mahasiswa.json');

        if (!file_exists($path)) {
            echo "File mahasiswa.json tidak ditemukan di database/seeders/data/mahasiswa.json\n";
            return;
        }

        $json = file_get_contents($path);
        $mahasiswaList = json_decode($json, true);

        if (!is_array($mahasiswaList)) {
            echo "Format JSON tidak valid.\n";
            return;
        }

        $kategoriUrutan = [
            'UKT 1',
            'UKT 2',
            'UKT 3',
            'UKT 4',
            'UKT 5',
            'JALUR KERJASAMA',
        ];

        $counterPerProdi = [];

        foreach ($mahasiswaList as $mahasiswa) {
            $nim = $mahasiswa['nomor_identitas'] ?? null;
            $prodiId = $mahasiswa['prodi_id'] ?? null;
            $semester = $mahasiswa['semester']['nomor_semester'] ?? null;
            $tahunAkademik = $mahasiswa['semester']['tahun_akademik_id'] ?? null;

            if (!$nim || !$prodiId || !$semester || !$tahunAkademik) {
                echo "Data tidak lengkap, dilewati.\n";
                continue;
            }

            $keyCounter = $prodiId . '-' . $semester . '-' . $tahunAkademik;

            if (!isset($counterPerProdi[$keyCounter])) {
                $counterPerProdi[$keyCounter] = 0;
            }

            $kategoriDipilih = null;
            $kategoriTersedia = [];

            foreach ($kategoriUrutan as $kategori) {
                $cekKategori = KategoriUkt::where('id_prodi', $prodiId)
                    ->where('kategori', $kategori)
                    ->first();

                if ($cekKategori) {
                    $kategoriTersedia[] = $kategori;
                }
            }

            if (count($kategoriTersedia) === 0) {
                echo "Kategori UKT untuk prodi {$prodiId} tidak ditemukan. NIM {$nim} dilewati.\n";
                continue;
            }

            $indexKategori = $counterPerProdi[$keyCounter] % count($kategoriTersedia);
            $kategoriDipilih = $kategoriTersedia[$indexKategori];
            $counterPerProdi[$keyCounter]++;

            $kategoriUkt = KategoriUkt::where('id_prodi', $prodiId)
                ->where('kategori', $kategoriDipilih)
                ->first();

            if (!$kategoriUkt) {
                echo "Kategori {$kategoriDipilih} untuk prodi {$prodiId} tidak ditemukan. NIM {$nim} dilewati.\n";
                continue;
            }

            $mhsUkt = MhsUkt::updateOrCreate(
                [
                    'nim' => $nim,
                    'semester' => $semester,
                    'tahun_akademik' => (string) $tahunAkademik,
                ],
                [
                    'id_kategori_ukt' => $kategoriUkt->id_kategori_ukt,
                    'status_pembayaran' => 'BELUM_LUNAS',
                    'total_tagihan' => $kategoriUkt->nominal_ukt,
                ]
            );

            StatusMhs::updateOrCreate(
                [
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                ],
                [
                    'status' => 'NONAKTIF',
                    'keterangan' => 'Mahasiswa belum melakukan pembayaran UKT',
                ]
            );

            echo "Berhasil seed NIM {$nim} - {$kategoriDipilih}\n";
        }
    }
}
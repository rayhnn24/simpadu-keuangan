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
            // Support format Kelompok 3 dan Kelompok 1
            $nim = $mahasiswa['nim']
                ?? $mahasiswa['nomor_identitas']
                ?? null;

            $nama = $mahasiswa['nama_mhs']
                ?? $mahasiswa['name']
                ?? '-';

            $prodiId = $mahasiswa['prodi_id']
                ?? ($mahasiswa['prodi']['id'] ?? null);

            // Jika prodi_id tidak ada, ambil dari prefix NIM
            if (!$prodiId && $nim) {
                $prodiId = $this->getProdiIdFromNim($nim);
            }

            // Jika semester dan tahun akademik tidak ada, kasih default
            $semester = $mahasiswa['semester']['nomor_semester']
                ?? $mahasiswa['semester']
                ?? 2;

            $tahunAkademik = $mahasiswa['semester']['tahun_akademik_id']
                ?? $mahasiswa['tahun_akademik']
                ?? '20242';

            if (!$nim || !$prodiId || !$semester || !$tahunAkademik) {
                echo "Data tidak lengkap, dilewati. NIM: " . ($nim ?? 'kosong') . "\n";
                continue;
            }

            $keyCounter = $prodiId . '-' . $semester . '-' . $tahunAkademik;

            if (!isset($counterPerProdi[$keyCounter])) {
                $counterPerProdi[$keyCounter] = 0;
            }

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

            echo "Berhasil seed NIM {$nim} - {$nama} - Prodi {$prodiId} - {$kategoriDipilih}\n";
        }
    }

    private function getProdiIdFromNim(string $nim): ?int
    {
        $prefix = substr($nim, 0, 4);

        $mapping = [
            'A001' => 1,  // D3 Administrasi Bisnis
            'A002' => 2,  // D4 Bisnis Digital
            'C003' => 3,  // D4 Teknologi Rekayasa Pembangkit Energi
            'C004' => 4,  // D4 Sistem Informasi Kota Cerdas
            'C005' => 5,  // D4 Teknologi Rekayasa Otomasi
            'C006' => 6,  // D3 Elektronika
            'C007' => 7,  // D3 Teknik Informatika
            'C008' => 8,  // D3 Teknik Listrik
            'A009' => 9,  // D3 Sistem Informasi
            'C010' => 10, // D3 Teknik Mesin
        ];

        return $mapping[$prefix] ?? null;
    }
}
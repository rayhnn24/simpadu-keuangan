<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MhsUkt;
use App\Models\Beasiswa;
use App\Models\BeasiswaMhs;
use App\Models\Pembayaran;
use App\Models\StatusMhs;

class BeasiswaMhsSeeder extends Seeder
{
    public function run(): void
    {
        $beasiswaList = Beasiswa::orderBy('id_beasiswa')->get();

        if ($beasiswaList->isEmpty()) {
            echo "Data beasiswa masih kosong. Jalankan BeasiswaSeeder terlebih dahulu.\n";
            return;
        }

        $mhsUktList = MhsUkt::with('kategori')
            ->orderBy('id_mhs_ukt')
            ->get();

        if ($mhsUktList->isEmpty()) {
            echo "Data mhs_ukt masih kosong. Jalankan MhsUktSeeder terlebih dahulu.\n";
            return;
        }

        /*
         * Hanya beberapa mahasiswa yang menerima beasiswa.
         * Contoh: setiap data ke-5 akan diberikan beasiswa.
         */
        $penerimaBeasiswa = $mhsUktList->filter(function ($mhsUkt, $index) {
            return $index % 5 === 0;
        })->values();

        foreach ($penerimaBeasiswa as $index => $mhsUkt) {
            $beasiswa = $beasiswaList[$index % $beasiswaList->count()];

            BeasiswaMhs::updateOrCreate(
                [
                    'nim' => $mhsUkt->nim,
                    'id_beasiswa' => $beasiswa->id_beasiswa,
                ],
                [
                    'keterangan' => 'Penerima beasiswa aktif',
                ]
            );

            $nominalUkt = $mhsUkt->kategori->nominal_ukt ?? $mhsUkt->total_tagihan;

            $potonganPersen = (float) $beasiswa->potongan_persen;
            $potonganNominal = ($potonganPersen / 100) * $nominalUkt;
            $totalTagihanBaru = max($nominalUkt - $potonganNominal, 0);

            $totalBayar = Pembayaran::where('id_mhs_ukt', $mhsUkt->id_mhs_ukt)
                ->sum('jumlah_bayar');

            if ($totalTagihanBaru <= 0) {
                $statusPembayaran = 'LUNAS';
                $statusMahasiswa = 'AKTIF';
                $keteranganStatus = 'Mahasiswa aktif karena mendapat beasiswa penuh';
            } elseif ($totalBayar >= $totalTagihanBaru) {
                $statusPembayaran = 'LUNAS';
                $statusMahasiswa = 'AKTIF';
                $keteranganStatus = 'Mahasiswa aktif karena tagihan setelah beasiswa sudah lunas';
            } elseif ($totalBayar > 0) {
                $statusPembayaran = 'CICILAN';
                $statusMahasiswa = 'AKTIF';
                $keteranganStatus = 'Mahasiswa aktif karena sudah melakukan cicilan pembayaran UKT';
            } else {
                $statusPembayaran = 'BELUM_LUNAS';
                $statusMahasiswa = 'NONAKTIF';
                $keteranganStatus = 'Mahasiswa belum melakukan pembayaran UKT setelah mendapat beasiswa';
            }

            $mhsUkt->update([
                'total_tagihan' => $totalTagihanBaru,
                'status_pembayaran' => $statusPembayaran,
            ]);

            StatusMhs::updateOrCreate(
                [
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                ],
                [
                    'status' => $statusMahasiswa,
                    'keterangan' => $keteranganStatus,
                ]
            );

            echo "Beasiswa {$beasiswa->nama_beasiswa} diberikan ke NIM {$mhsUkt->nim}\n";
        }
    }
}
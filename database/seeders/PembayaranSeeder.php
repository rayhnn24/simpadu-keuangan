<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MhsUkt;
use App\Models\Pembayaran;
use App\Models\StatusMhs;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $mhsUktList = MhsUkt::orderBy('id_mhs_ukt')->get();

        if ($mhsUktList->isEmpty()) {
            echo "Data mhs_ukt masih kosong. Jalankan MhsUktSeeder terlebih dahulu.\n";
            return;
        }

        foreach ($mhsUktList as $index => $mhsUkt) {
            $totalTagihan = (float) $mhsUkt->total_tagihan;

            if ($totalTagihan <= 0) {
                continue;
            }

            /*
             * Pola status pembayaran:
             * - Data ke-1, 4, 7, dst = LUNAS
             * - Data ke-2, 5, 8, dst = CICILAN
             * - Data ke-3, 6, 9, dst = BELUM_LUNAS
             */
            $pola = $index % 3;

            // Hapus pembayaran lama supaya tidak dobel ketika seeder dijalankan ulang
            Pembayaran::where('id_mhs_ukt', $mhsUkt->id_mhs_ukt)->delete();

            if ($pola === 0) {
                /*
                 * LUNAS
                 * Membayar penuh sesuai total tagihan
                 */
                Pembayaran::create([
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                    'jumlah_bayar' => $totalTagihan,
                    'tgl_pembayaran' => now()->subDays(rand(1, 10))->format('Y-m-d'),
                    'keterangan' => 'Pembayaran lunas',
                ]);

                $mhsUkt->update([
                    'status_pembayaran' => 'LUNAS',
                ]);

                StatusMhs::updateOrCreate(
                    [
                        'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                    ],
                    [
                        'status' => 'AKTIF',
                        'keterangan' => 'Mahasiswa aktif karena pembayaran UKT sudah lunas',
                    ]
                );

                echo "LUNAS: {$mhsUkt->nim}\n";

            } elseif ($pola === 1) {
                /*
                 * CICILAN
                 * Membayar sebagian, contoh 40% dari total tagihan
                 */
                $jumlahBayar = round($totalTagihan * 0.4);

                Pembayaran::create([
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                    'jumlah_bayar' => $jumlahBayar,
                    'tgl_pembayaran' => now()->subDays(rand(1, 10))->format('Y-m-d'),
                    'keterangan' => 'Cicilan pertama',
                ]);

                $mhsUkt->update([
                    'status_pembayaran' => 'CICILAN',
                ]);

                StatusMhs::updateOrCreate(
                    [
                        'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                    ],
                    [
                        'status' => 'AKTIF',
                        'keterangan' => 'Mahasiswa aktif karena sudah melakukan cicilan pembayaran UKT',
                    ]
                );

                echo "CICILAN: {$mhsUkt->nim}\n";

            } else {
                /*
                 * BELUM LUNAS
                 * Tidak ada pembayaran
                 */
                $mhsUkt->update([
                    'status_pembayaran' => 'BELUM_LUNAS',
                ]);

                StatusMhs::updateOrCreate(
                    [
                        'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                    ],
                    [
                        'status' => 'NONAKTIF',
                        'keterangan' => 'Mahasiswa belum melakukan pembayaran UKT',
                    ]
                );

                echo "BELUM_LUNAS: {$mhsUkt->nim}\n";
            }
        }
    }
}
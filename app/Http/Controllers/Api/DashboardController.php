<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use App\Models\BeasiswaMhs;
use App\Models\Pembayaran;
use App\Models\StatusMhs;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = MhsUkt::count();

        $totalAktif = StatusMhs::where('status', 'AKTIF')->count();
        $totalNonaktif = StatusMhs::where('status', 'NONAKTIF')->count();

        $totalLunas = MhsUkt::where('status_pembayaran', 'LUNAS')->count();
        $totalCicilan = MhsUkt::where('status_pembayaran', 'CICILAN')->count();
        $totalBelumLunas = MhsUkt::where('status_pembayaran', 'BELUM_LUNAS')->count();

        $totalPenerimaBeasiswa = BeasiswaMhs::count();

        $totalTagihan = MhsUkt::sum('total_tagihan');
        $totalPemasukan = Pembayaran::sum('jumlah_bayar');
        $totalTunggakan = $totalTagihan - $totalPemasukan;

        if ($totalTunggakan < 0) {
            $totalTunggakan = 0;
        }

        /*
         * Rekap UKT digabung berdasarkan kategori.
         * Jadi UKT 1 dari semua prodi akan dijumlahkan jadi satu baris.
         */
        $rekapUktPerGolongan = MhsUkt::join(
                'kategori_ukt',
                'mhs_ukt.id_kategori_ukt',
                '=',
                'kategori_ukt.id_kategori_ukt'
            )
            ->select(
                'kategori_ukt.kategori',
                DB::raw('COUNT(mhs_ukt.id_mhs_ukt) as jumlah_mahasiswa'),
                DB::raw('SUM(mhs_ukt.total_tagihan) as total_ukt')
            )
            ->groupBy('kategori_ukt.kategori')
            ->orderByRaw("
                CASE
                    WHEN kategori_ukt.kategori = 'UKT 1' THEN 1
                    WHEN kategori_ukt.kategori = 'UKT 2' THEN 2
                    WHEN kategori_ukt.kategori = 'UKT 3' THEN 3
                    WHEN kategori_ukt.kategori = 'UKT 4' THEN 4
                    WHEN kategori_ukt.kategori = 'UKT 5' THEN 5
                    WHEN kategori_ukt.kategori = 'JALUR KERJASAMA' THEN 6
                    ELSE 7
                END
            ")
            ->get()
            ->map(function ($item) {
                return [
                    'kategori' => $item->kategori,
                    'jumlah_mahasiswa' => (int) $item->jumlah_mahasiswa,
                    'total_ukt' => (float) $item->total_ukt,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data dashboard berhasil diambil',
            'data' => [
                'mahasiswa' => [
                    'total_mahasiswa' => $totalMahasiswa,
                    'total_aktif' => $totalAktif,
                    'total_nonaktif' => $totalNonaktif,
                ],
                'pembayaran' => [
                    'total_lunas' => $totalLunas,
                    'total_cicilan' => $totalCicilan,
                    'total_belum_lunas' => $totalBelumLunas,
                ],
                'beasiswa' => [
                    'total_penerima_beasiswa' => $totalPenerimaBeasiswa,
                ],
                'keuangan' => [
                    'total_tagihan' => (float) $totalTagihan,
                    'total_pemasukan' => (float) $totalPemasukan,
                    'total_tunggakan' => (float) $totalTunggakan,
                ],
                'rekap_ukt_per_golongan' => $rekapUktPerGolongan,
            ],
        ]);
    }
}
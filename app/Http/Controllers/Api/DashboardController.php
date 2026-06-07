<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use App\Models\BeasiswaMhs;
use App\Models\Pembayaran;
use App\Models\StatusMhs;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = MhsUkt::count();

        $totalLunas = MhsUkt::where(
            'status_pembayaran',
            'LUNAS'
        )->count();

        $totalCicilan = MhsUkt::where(
            'status_pembayaran',
            'CICILAN'
        )->count();

        $totalBelumLunas = MhsUkt::where(
            'status_pembayaran',
            'BELUM_LUNAS'
        )->count();

        $totalPenerimaBeasiswa = BeasiswaMhs::count();

        $totalAktif = StatusMhs::where(
            'status',
            'AKTIF'
        )->count();

        $totalNonaktif = StatusMhs::where(
            'status',
            'NONAKTIF'
        )->count();

        $totalPemasukan = Pembayaran::sum('jumlah_bayar');

        $totalTagihan = MhsUkt::sum('total_tagihan');

        $totalTunggakan = $totalTagihan - $totalPemasukan;

        if ($totalTunggakan < 0) {
            $totalTunggakan = 0;
        }

        return response()->json([
            'success' => true,
            'message' => 'Data dashboard berhasil diambil',
            'data' => [
                'mahasiswa' => [
                    'total_mahasiswa' => $totalMahasiswa,
                    'total_aktif' => $totalAktif,
                    'total_nonaktif' => $totalNonaktif
                ],

                'pembayaran' => [
                    'total_lunas' => $totalLunas,
                    'total_cicilan' => $totalCicilan,
                    'total_belum_lunas' => $totalBelumLunas
                ],

                'beasiswa' => [
                    'total_penerima_beasiswa' => $totalPenerimaBeasiswa
                ],

                'keuangan' => [
                    'total_tagihan' => (float) $totalTagihan,
                    'total_pemasukan' => (float) $totalPemasukan,
                    'total_tunggakan' => (float) $totalTunggakan
                ]
            ]
        ]);
    }
}
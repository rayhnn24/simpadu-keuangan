<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use App\Models\BeasiswaMhs;

class DashboardController extends Controller
{
    public function index()
    {
        // total mahasiswa
        $totalMahasiswa =
            MhsUkt::count();

        // total lunas
        $totalLunas =
            MhsUkt::where(
                'status_pembayaran',
                'LUNAS'
            )->count();

        // total cicilan
        $totalCicilan =
            MhsUkt::where(
                'status_pembayaran',
                'CICILAN'
            )->count();

        // total belum lunas
        $totalBelumLunas =
            MhsUkt::where(
                'status_pembayaran',
                'BELUM_LUNAS'
            )->count();

        // total penerima beasiswa
        $totalPenerimaBeasiswa =
            BeasiswaMhs::count();

        return response()->json([

            'success' => true,

            'message' =>
                'Data dashboard berhasil diambil',

            'data' => [

                'total_mahasiswa' =>
                    $totalMahasiswa,

                'total_lunas' =>
                    $totalLunas,

                'total_cicilan' =>
                    $totalCicilan,

                'total_belum_lunas' =>
                    $totalBelumLunas,

                'total_penerima_beasiswa' =>
                    $totalPenerimaBeasiswa
            ]
        ]);
    }
}
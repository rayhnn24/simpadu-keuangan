<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriUktController;
use App\Http\Controllers\Api\MhsUktController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\BeasiswaMhsController;
use App\Http\Controllers\Api\BeasiswaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LaporanKeuanganController;
use App\Http\Controllers\Api\StatusMhsController;

    Route::apiResource(
        'kategori-ukt',
        KategoriUktController::class
    );
    Route::get(
    'mhs-ukt/{id}/histori-pembayaran',
    [MhsUktController::class, 'historiPembayaran']
    );
    Route::apiResource(
        'mhs-ukt',
        MhsUktController::class
    );
    Route::apiResource(
        'pembayaran',
        PembayaranController::class
    );
    Route::get(
        'dashboard',
        [DashboardController::class, 'index']
    );
    Route::apiResource(
        'beasiswa',
        BeasiswaMhsController::class
    );
    Route::apiResource(
    'beasiswa-master',
     BeasiswaController::class
     );
     Route::get(
    '/laporan-keuangan',
    [LaporanKeuanganController::class, 'index']
    );

    Route::apiResource(
        'status-mhs', StatusMhsController::class
        );
    

   
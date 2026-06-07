<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriUktController;
use App\Http\Controllers\Api\MhsUktController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\BeasiswaMhsController;
use App\Http\Controllers\Api\BeasiswaController;
use App\Http\Controllers\Api\LaporanKeuanganController;
use App\Http\Controllers\Api\StatusMhsController;

// Dashboard
Route::get(
    'dashboard',
    [DashboardController::class, 'index']
);

// Laporan Keuangan
Route::get(
    'laporan-keuangan',
    [LaporanKeuanganController::class, 'index']
);

Route::get(
    'laporan-keuangan/semester/{semester}',
    [LaporanKeuanganController::class, 'getBySemester']
);

Route::get(
    'laporan-keuangan/tahun/{tahun_akademik}',
    [LaporanKeuanganController::class, 'getByTahunAkademik']
);

Route::get(
    'laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}',
    [LaporanKeuanganController::class, 'getBySemesterTahun']
);

// MHS UKT - route khusus
Route::get(
    'mhs-ukt/nim/{nim}',
    [MhsUktController::class, 'showByNim']
);

Route::get(
    'mhs-ukt/status/{status}',
    [MhsUktController::class, 'getByStatus']
);

Route::get(
    'mhs-ukt/semester/{semester}',
    [MhsUktController::class, 'getBySemester']
);

Route::get(
    'mhs-ukt/search/{keyword}',
    [MhsUktController::class, 'search']
);

Route::get(
    'mhs-ukt/{id}/histori-pembayaran',
    [MhsUktController::class, 'historiPembayaran']
);

// Kategori UKT - route khusus
Route::get(
    'kategori-ukt/prodi/{id_prodi}',
    [KategoriUktController::class, 'getByProdi']
);

Route::get(
    'kategori-ukt/prodi/{id_prodi}/jenjang/{jenjang}',
    [KategoriUktController::class, 'getByProdiJenjang']
);

// Pembayaran - route khusus
Route::get(
    'pembayaran/mhs-ukt/{id_mhs_ukt}',
    [PembayaranController::class, 'getByMhsUkt']
);

Route::get(
    'pembayaran/nim/{nim}',
    [PembayaranController::class, 'getByNim']
);

// Beasiswa Mahasiswa - route khusus
Route::get(
    'beasiswa/nim/{nim}',
    [BeasiswaMhsController::class, 'getByNim']
);

// Master Beasiswa - route khusus
Route::get(
    'beasiswa-master/nama/{nama}',
    [BeasiswaController::class, 'getByNama']
);

// Status Mahasiswa - route khusus
Route::get(
    'status-mhs/mhs-ukt/{id_mhs_ukt}',
    [StatusMhsController::class, 'getByMhsUkt']
);

Route::get(
    'status-mhs/nim/{nim}',
    [StatusMhsController::class, 'getByNim']
);

// Resource routes
Route::apiResource(
    'kategori-ukt',
    KategoriUktController::class
);

Route::apiResource(
    'mhs-ukt',
    MhsUktController::class
);

Route::apiResource(
    'pembayaran',
    PembayaranController::class
);

Route::apiResource(
    'beasiswa',
    BeasiswaMhsController::class
);

Route::apiResource(
    'beasiswa-master',
    BeasiswaController::class
);

Route::apiResource(
    'status-mhs',
    StatusMhsController::class
);
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\BeasiswaMhs;
use App\Models\MhsUkt;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class BeasiswaMhsController extends Controller
{
    /**
     * Menampilkan semua data penerima beasiswa
     */
    public function index()
    {
        $beasiswa = BeasiswaMhs::with('beasiswa')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil diambil',
            'data' => $beasiswa
        ]);
    }

    /**
     * Menyimpan data penerima beasiswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'id_beasiswa' => 'required|exists:beasiswa,id_beasiswa',
            'keterangan' => 'nullable'
        ]);

        // Simpan atau update beasiswa mahasiswa
        // Supaya 1 mahasiswa tidak punya beasiswa dobel
        $beasiswa = BeasiswaMhs::updateOrCreate(
            [
                'nim' => $request->nim
            ],
            [
                'id_beasiswa' => $request->id_beasiswa,
                'keterangan' => $request->keterangan
            ]
        );

        // Update total tagihan berdasarkan potongan beasiswa
        $this->updateTotalTagihanMahasiswa(
            $request->nim,
            $request->id_beasiswa
        );

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil ditambahkan',
            'data' => $beasiswa
        ], 201);
    }

    /**
     * Detail penerima beasiswa
     */
    public function show(string $id)
    {
        $beasiswa = BeasiswaMhs::with('beasiswa')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail beasiswa berhasil diambil',
            'data' => $beasiswa
        ]);
    }

    /**
     * Update data penerima beasiswa
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required',
            'id_beasiswa' => 'required|exists:beasiswa,id_beasiswa',
            'keterangan' => 'nullable'
        ]);

        $beasiswa = BeasiswaMhs::findOrFail($id);

        $beasiswa->update([
            'nim' => $request->nim,
            'id_beasiswa' => $request->id_beasiswa,
            'keterangan' => $request->keterangan
        ]);

        // Update ulang total tagihan setelah beasiswa diubah
        $this->updateTotalTagihanMahasiswa(
            $request->nim,
            $request->id_beasiswa
        );

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil diupdate',
            'data' => $beasiswa
        ]);
    }

    /**
     * Hapus data penerima beasiswa
     */
    public function destroy(string $id)
    {
        $beasiswa = BeasiswaMhs::findOrFail($id);

        $nim = $beasiswa->nim;

        $beasiswa->delete();

        // Setelah beasiswa dihapus, total tagihan dikembalikan ke nominal UKT asli
        $mhsUkt = MhsUkt::with('kategori')
            ->where('nim', $nim)
            ->first();

        if ($mhsUkt && $mhsUkt->kategori) {
            $nominalUkt = $mhsUkt->kategori->nominal_ukt;

            $totalBayar = Pembayaran::where(
                'id_mhs_ukt',
                $mhsUkt->id_mhs_ukt
            )->sum('jumlah_bayar');

            if ($totalBayar <= 0) {
                $statusPembayaran = 'BELUM_LUNAS';
            } elseif ($totalBayar < $nominalUkt) {
                $statusPembayaran = 'CICILAN';
            } else {
                $statusPembayaran = 'LUNAS';
            }

            $mhsUkt->update([
                'total_tagihan' => $nominalUkt,
                'status_pembayaran' => $statusPembayaran
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil dihapus'
        ]);
    }

    /**
     * Update total tagihan mahasiswa berdasarkan beasiswa
     */
    private function updateTotalTagihanMahasiswa($nim, $idBeasiswa)
    {
        $mhsUkt = MhsUkt::with('kategori')
            ->where('nim', $nim)
            ->first();

        $masterBeasiswa = Beasiswa::findOrFail($idBeasiswa);

        if (!$mhsUkt || !$mhsUkt->kategori) {
            return;
        }

        $nominalUkt = $mhsUkt->kategori->nominal_ukt;

        $potonganNominal =
            ($masterBeasiswa->potongan_persen / 100)
            * $nominalUkt;

        $totalTagihan =
            $nominalUkt - $potonganNominal;

        if ($totalTagihan < 0) {
            $totalTagihan = 0;
        }

        $totalBayar = Pembayaran::where(
            'id_mhs_ukt',
            $mhsUkt->id_mhs_ukt
        )->sum('jumlah_bayar');

        if ($totalTagihan <= 0) {
            $statusPembayaran = 'LUNAS';
        } elseif ($totalBayar <= 0) {
            $statusPembayaran = 'BELUM_LUNAS';
        } elseif ($totalBayar < $totalTagihan) {
            $statusPembayaran = 'CICILAN';
        } else {
            $statusPembayaran = 'LUNAS';
        }

        $mhsUkt->update([
            'total_tagihan' => $totalTagihan,
            'status_pembayaran' => $statusPembayaran
        ]);
    }
}
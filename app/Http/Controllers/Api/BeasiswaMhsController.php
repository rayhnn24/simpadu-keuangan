<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\BeasiswaMhs;
use App\Models\MhsUkt;
use App\Models\Pembayaran;
use App\Models\StatusMhs;
use Illuminate\Http\Request;

class BeasiswaMhsController extends Controller
{
    /**
     * Menampilkan semua data penerima beasiswa
     */
    public function index()
    {
        $beasiswa = BeasiswaMhs::with('beasiswa')->get();

        $data = $beasiswa->map(function ($item) {
            return $this->formatBeasiswaMhsResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Menampilkan data beasiswa berdasarkan NIM
     */
    public function getByNim(string $nim)
    {
        $beasiswa = BeasiswaMhs::with('beasiswa')
            ->whereRaw('LOWER(nim) = ?', [strtolower($nim)])
            ->first();

        if (!$beasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data beasiswa mahasiswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa mahasiswa berhasil diambil',
            'data' => $this->formatBeasiswaMhsResponse($beasiswa)
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

        $beasiswa = BeasiswaMhs::updateOrCreate(
            [
                'nim' => $request->nim
            ],
            [
                'id_beasiswa' => $request->id_beasiswa,
                'keterangan' => $request->keterangan
            ]
        );

        $hasilUpdate = $this->updateTotalTagihanMahasiswa(
            $request->nim,
            $request->id_beasiswa
        );

        $beasiswa = BeasiswaMhs::with('beasiswa')
            ->findOrFail($beasiswa->id_beasiswa_mhs);

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil ditambahkan',
            'data' => $this->formatBeasiswaMhsResponse($beasiswa),
            'ringkasan' => $hasilUpdate
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
            'data' => $this->formatBeasiswaMhsResponse($beasiswa)
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

        $hasilUpdate = $this->updateTotalTagihanMahasiswa(
            $request->nim,
            $request->id_beasiswa
        );

        $beasiswa = BeasiswaMhs::with('beasiswa')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil diupdate',
            'data' => $this->formatBeasiswaMhsResponse($beasiswa),
            'ringkasan' => $hasilUpdate
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

        $mhsUkt = MhsUkt::with('kategori')
            ->where('nim', $nim)
            ->first();

        $ringkasan = null;

        if ($mhsUkt && $mhsUkt->kategori) {
            $nominalUkt = $mhsUkt->kategori->nominal_ukt;

            $totalBayar = Pembayaran::where(
                'id_mhs_ukt',
                $mhsUkt->id_mhs_ukt
            )->sum('jumlah_bayar');

            if ($totalBayar <= 0) {
                $statusPembayaran = 'BELUM_LUNAS';
                $statusMahasiswa = 'NONAKTIF';
                $keteranganStatus = 'Mahasiswa belum melakukan pembayaran UKT';
            } elseif ($totalBayar < $nominalUkt) {
                $statusPembayaran = 'CICILAN';
                $statusMahasiswa = 'AKTIF';
                $keteranganStatus = 'Mahasiswa aktif karena sudah melakukan pembayaran UKT';
            } else {
                $statusPembayaran = 'LUNAS';
                $statusMahasiswa = 'AKTIF';
                $keteranganStatus = 'Mahasiswa aktif karena pembayaran UKT sudah lunas';
            }

            $sisaTagihan = $nominalUkt - $totalBayar;

            if ($sisaTagihan < 0) {
                $sisaTagihan = 0;
            }

            $mhsUkt->update([
                'total_tagihan' => $nominalUkt,
                'status_pembayaran' => $statusPembayaran
            ]);

            StatusMhs::updateOrCreate(
                [
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt
                ],
                [
                    'status' => $statusMahasiswa,
                    'keterangan' => $keteranganStatus
                ]
            );

            $ringkasan = [
                'nim' => $nim,
                'total_tagihan' => (float) $nominalUkt,
                'total_bayar' => (float) $totalBayar,
                'sisa_tagihan' => (float) $sisaTagihan,
                'status_pembayaran' => $statusPembayaran,
                'status_mhs' => $statusMahasiswa,
                'keterangan_status' => $keteranganStatus
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil dihapus',
            'ringkasan' => $ringkasan
        ]);
    }

    /**
     * Format response beasiswa mahasiswa
     */
    private function formatBeasiswaMhsResponse($item)
    {
        return [
            'id_beasiswa_mhs' => $item->id_beasiswa_mhs,
            'nim' => $item->nim,
            'keterangan' => $item->keterangan,

            'beasiswa' => [
                'id_beasiswa' => $item->beasiswa
                    ? $item->beasiswa->id_beasiswa
                    : null,

                'nama_beasiswa' => $item->beasiswa
                    ? $item->beasiswa->nama_beasiswa
                    : null,

                'potongan_persen' => $item->beasiswa
                    ? (float) $item->beasiswa->potongan_persen
                    : 0
            ]
        ];
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
            return [
                'updated' => false,
                'message' => 'Data mahasiswa UKT tidak ditemukan'
            ];
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

        $sisaTagihan = $totalTagihan - $totalBayar;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
        }

        if ($totalTagihan <= 0) {
            $statusPembayaran = 'LUNAS';
            $statusMahasiswa = 'AKTIF';
            $keteranganStatus = 'Mahasiswa aktif karena mendapat beasiswa penuh';
        } elseif ($totalBayar <= 0) {
            $statusPembayaran = 'BELUM_LUNAS';
            $statusMahasiswa = 'NONAKTIF';
            $keteranganStatus = 'Mahasiswa belum melakukan pembayaran UKT';
        } elseif ($totalBayar < $totalTagihan) {
            $statusPembayaran = 'CICILAN';
            $statusMahasiswa = 'AKTIF';
            $keteranganStatus = 'Mahasiswa aktif karena sudah melakukan pembayaran UKT';
        } else {
            $statusPembayaran = 'LUNAS';
            $statusMahasiswa = 'AKTIF';
            $keteranganStatus = 'Mahasiswa aktif karena pembayaran UKT sudah lunas';
        }

        $mhsUkt->update([
            'total_tagihan' => $totalTagihan,
            'status_pembayaran' => $statusPembayaran
        ]);

        StatusMhs::updateOrCreate(
            [
                'id_mhs_ukt' => $mhsUkt->id_mhs_ukt
            ],
            [
                'status' => $statusMahasiswa,
                'keterangan' => $keteranganStatus
            ]
        );

        return [
            'updated' => true,

            'mahasiswa_ukt' => [
                'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                'nim' => $mhsUkt->nim,
                'semester' => $mhsUkt->semester,
                'tahun_akademik' => $mhsUkt->tahun_akademik
            ],

            'beasiswa' => [
                'id_beasiswa' => $masterBeasiswa->id_beasiswa,
                'nama_beasiswa' => $masterBeasiswa->nama_beasiswa,
                'potongan_persen' => (float) $masterBeasiswa->potongan_persen,
                'potongan_nominal' => (float) $potonganNominal
            ],

            'tagihan' => [
                'nominal_ukt' => (float) $nominalUkt,
                'total_tagihan' => (float) $totalTagihan,
                'total_bayar' => (float) $totalBayar,
                'sisa_tagihan' => (float) $sisaTagihan
            ],

            'status' => [
                'status_pembayaran' => $statusPembayaran,
                'status_mhs' => $statusMahasiswa,
                'keterangan_status' => $keteranganStatus
            ]
        ];
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StatusMhs;
use Illuminate\Http\Request;

class StatusMhsController extends Controller
{
    /**
     * Menampilkan semua status mahasiswa
     */
    public function index()
    {
        $statusMhs = StatusMhs::with('mhsUkt')->get();

        $data = $statusMhs->map(function ($item) {
            return $this->formatStatusMhsResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data status mahasiswa berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Menampilkan status mahasiswa berdasarkan id_mhs_ukt
     */
    public function getByMhsUkt(string $id_mhs_ukt)
    {
        $statusMhs = StatusMhs::with('mhsUkt')
            ->where('id_mhs_ukt', $id_mhs_ukt)
            ->first();

        if (!$statusMhs) {
            return response()->json([
                'success' => false,
                'message' => 'Status mahasiswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status mahasiswa berhasil diambil',
            'data' => $this->formatStatusMhsResponse($statusMhs)
        ]);
    }

    /**
     * Menampilkan status mahasiswa berdasarkan NIM
     */
    public function getByNim(string $nim)
    {
        $statusMhs = StatusMhs::with('mhsUkt')
            ->whereHas('mhsUkt', function ($query) use ($nim) {
                $query->whereRaw(
                    'LOWER(nim) = ?',
                    [strtolower($nim)]
                );
            })
            ->first();

        if (!$statusMhs) {
            return response()->json([
                'success' => false,
                'message' => 'Status mahasiswa berdasarkan NIM tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status mahasiswa berdasarkan NIM berhasil diambil',
            'data' => $this->formatStatusMhsResponse($statusMhs)
        ]);
    }

    /**
     * Menyimpan status mahasiswa baru / update jika sudah ada
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mhs_ukt' => 'required|exists:mhs_ukt,id_mhs_ukt',
            'status' => 'required|in:AKTIF,NONAKTIF',
            'keterangan' => 'nullable'
        ]);

        $statusMhs = StatusMhs::updateOrCreate(
            [
                'id_mhs_ukt' => $request->id_mhs_ukt
            ],
            [
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]
        );

        $statusMhs = StatusMhs::with('mhsUkt')
            ->findOrFail($statusMhs->id_status);

        return response()->json([
            'success' => true,
            'message' => 'Status mahasiswa berhasil disimpan',
            'data' => $this->formatStatusMhsResponse($statusMhs)
        ], 201);
    }

    /**
     * Menampilkan detail status mahasiswa
     */
    public function show(string $id)
    {
        $statusMhs = StatusMhs::with('mhsUkt')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail status mahasiswa berhasil diambil',
            'data' => $this->formatStatusMhsResponse($statusMhs)
        ]);
    }

    /**
     * Update status mahasiswa
     */
    public function update(Request $request, string $id)
    {
        $statusMhs = StatusMhs::findOrFail($id);

        $request->validate([
            'status' => 'required|in:AKTIF,NONAKTIF',
            'keterangan' => 'nullable'
        ]);

        $statusMhs->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        $statusMhs = StatusMhs::with('mhsUkt')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Status mahasiswa berhasil diupdate',
            'data' => $this->formatStatusMhsResponse($statusMhs)
        ]);
    }

    /**
     * Menghapus status mahasiswa
     */
    public function destroy(string $id)
    {
        $statusMhs = StatusMhs::findOrFail($id);

        $statusMhs->delete();

        return response()->json([
            'success' => true,
            'message' => 'Status mahasiswa berhasil dihapus'
        ]);
    }

    /**
     * Format response status mahasiswa
     */
    private function formatStatusMhsResponse($item)
    {
        return [
            'id_status' => $item->id_status,

            'mahasiswa_ukt' => [
                'id_mhs_ukt' => $item->mhsUkt
                    ? $item->mhsUkt->id_mhs_ukt
                    : $item->id_mhs_ukt,

                'nim' => $item->mhsUkt
                    ? $item->mhsUkt->nim
                    : null,

                'semester' => $item->mhsUkt
                    ? $item->mhsUkt->semester
                    : null,

                'tahun_akademik' => $item->mhsUkt
                    ? $item->mhsUkt->tahun_akademik
                    : null
            ],

            'status' => [
                'status_mhs' => $item->status,
                'keterangan' => $item->keterangan
            ]
        ];
    }
}
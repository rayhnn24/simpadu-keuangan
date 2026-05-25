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

        return response()->json([
            'success' => true,
            'message' => 'Data status mahasiswa berhasil diambil',
            'data' => $statusMhs
        ]);
    }

    /**
     * Menyimpan status mahasiswa baru
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

    return response()->json([
        'success' => true,
        'message' => 'Status mahasiswa berhasil disimpan',
        'data' => $statusMhs
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
            'data' => $statusMhs
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

        return response()->json([
            'success' => true,
            'message' => 'Status mahasiswa berhasil diupdate',
            'data' => $statusMhs
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
}
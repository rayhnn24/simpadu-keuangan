<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Menampilkan semua master beasiswa
     */
    public function index()
    {
        $beasiswa = Beasiswa::get();

        $data = $beasiswa->map(function ($item) {
            return $this->formatBeasiswaResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Cari beasiswa berdasarkan nama
     */
    public function getByNama(string $nama)
    {
        $beasiswa = Beasiswa::whereRaw(
            'LOWER(nama_beasiswa) LIKE ?',
            ['%' . strtolower($nama) . '%']
        )->get();

        $data = $beasiswa->map(function ($item) {
            return $this->formatBeasiswaResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil dicari',
            'data' => $data
        ]);
    }

    /**
     * Menyimpan master beasiswa baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'potongan_persen' => 'required|numeric|min:0|max:100',
            'keterangan' => 'nullable'
        ]);

        $beasiswa = Beasiswa::create([
            'nama_beasiswa' => $request->nama_beasiswa,
            'keterangan' => $request->keterangan,
            'potongan_persen' => $request->potongan_persen
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Beasiswa berhasil ditambahkan',
            'data' => $this->formatBeasiswaResponse($beasiswa)
        ], 201);
    }

    /**
     * Menampilkan detail master beasiswa
     */
    public function show(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail beasiswa berhasil diambil',
            'data' => $this->formatBeasiswaResponse($beasiswa)
        ]);
    }

    /**
     * Update master beasiswa
     */
    public function update(Request $request, string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        $request->validate([
            'nama_beasiswa' => 'required',
            'potongan_persen' => 'required|numeric|min:0|max:100',
            'keterangan' => 'nullable'
        ]);

        $beasiswa->update([
            'nama_beasiswa' => $request->nama_beasiswa,
            'keterangan' => $request->keterangan,
            'potongan_persen' => $request->potongan_persen
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Beasiswa berhasil diupdate',
            'data' => $this->formatBeasiswaResponse($beasiswa)
        ]);
    }

    /**
     * Hapus master beasiswa
     */
    public function destroy(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        $beasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Beasiswa berhasil dihapus'
        ]);
    }

    /**
     * Format response master beasiswa
     */
    private function formatBeasiswaResponse($item)
    {
        return [
            'id_beasiswa' => $item->id_beasiswa,
            'nama_beasiswa' => $item->nama_beasiswa,
            'keterangan' => $item->keterangan,
            'potongan_persen' => (float) $item->potongan_persen
        ];
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriUkt;
use Illuminate\Http\Request;

class KategoriUktController extends Controller
{
    /**
     * Menampilkan semua kategori UKT
     * Bisa filter:
     * GET /api/kategori-ukt?id_prodi=7
     * GET /api/kategori-ukt?id_prodi=7&jenjang=D3
     */
    public function index(Request $request)
    {
        $query = KategoriUkt::query();

        if ($request->id_prodi) {
            $query->where(
                'id_prodi',
                $request->id_prodi
            );
        }

        if ($request->jenjang) {
            $query->where(
                'jenjang',
                strtoupper($request->jenjang)
            );
        }

        $kategori = $query->get();

        $data = $kategori->map(function ($item) {
            return $this->formatKategoriResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data kategori UKT berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Menampilkan kategori UKT berdasarkan id_prodi
     */
    public function getByProdi(string $id_prodi)
    {
        $kategori = KategoriUkt::where(
            'id_prodi',
            $id_prodi
        )->get();

        $data = $kategori->map(function ($item) {
            return $this->formatKategoriResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data kategori UKT berdasarkan prodi berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Menampilkan kategori UKT berdasarkan id_prodi dan jenjang
     */
    public function getByProdiJenjang(string $id_prodi, string $jenjang)
    {
        $kategori = KategoriUkt::where(
                'id_prodi',
                $id_prodi
            )
            ->where(
                'jenjang',
                strtoupper($jenjang)
            )
            ->get();

        $data = $kategori->map(function ($item) {
            return $this->formatKategoriResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data kategori UKT berdasarkan prodi dan jenjang berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Menyimpan kategori UKT baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_prodi' => 'required|numeric',
            'kategori' => 'required',
            'nominal_ukt' => 'required|numeric|min:0',
            'jenjang' => 'required'
        ]);

        $kategori = KategoriUkt::create([
            'id_prodi' => $request->id_prodi,
            'kategori' => strtoupper($request->kategori),
            'nominal_ukt' => $request->nominal_ukt,
            'jenjang' => strtoupper($request->jenjang)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori UKT berhasil ditambahkan',
            'data' => $this->formatKategoriResponse($kategori)
        ], 201);
    }

    /**
     * Menampilkan detail kategori UKT
     */
    public function show(string $id)
    {
        $kategori = KategoriUkt::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail kategori UKT berhasil diambil',
            'data' => $this->formatKategoriResponse($kategori)
        ]);
    }

    /**
     * Update kategori UKT
     */
    public function update(Request $request, string $id)
    {
        $kategori = KategoriUkt::findOrFail($id);

        $request->validate([
            'id_prodi' => 'required|numeric',
            'kategori' => 'required',
            'nominal_ukt' => 'required|numeric|min:0',
            'jenjang' => 'required'
        ]);

        $kategori->update([
            'id_prodi' => $request->id_prodi,
            'kategori' => strtoupper($request->kategori),
            'nominal_ukt' => $request->nominal_ukt,
            'jenjang' => strtoupper($request->jenjang)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori UKT berhasil diupdate',
            'data' => $this->formatKategoriResponse($kategori)
        ]);
    }

    /**
     * Hapus kategori UKT
     */
    public function destroy(string $id)
    {
        $kategori = KategoriUkt::findOrFail($id);

        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori UKT berhasil dihapus'
        ]);
    }

    /**
     * Format response kategori UKT
     */
    private function formatKategoriResponse($item)
    {
        return [
            'id_kategori_ukt' => $item->id_kategori_ukt,
            'id_prodi' => $item->id_prodi,
            'kategori' => $item->kategori,
            'jenjang' => $item->jenjang,
            'nominal_ukt' => (float) $item->nominal_ukt
        ];
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriUkt;
use Illuminate\Http\Request;

class KategoriUktController extends Controller
{
    public function index(Request $request)
    {
        $query = KategoriUkt::query();

        if ($request->id_prodi) {
            $query->where('id_prodi', $request->id_prodi);
        }

        if ($request->jenjang) {
            $query->where('jenjang', $request->jenjang);
        }

        $kategori = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kategori UKT berhasil diambil',
            'data' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_prodi' => 'required|numeric',
            'kelompok_kategori' => 'required',
            'nominal_ukt' => 'required|numeric|min:0',
            'jenjang' => 'required'
        ]);

        $kategori = KategoriUkt::create([
            'id_prodi' => $request->id_prodi,
            'kelompok_kategori' => $request->kelompok_kategori,
            'nominal_ukt' => $request->nominal_ukt,
            'jenjang' => $request->jenjang
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori UKT berhasil ditambahkan',
            'data' => $kategori
        ], 201);
    }

    public function show(string $id)
    {
        $kategori = KategoriUkt::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail kategori UKT berhasil diambil',
            'data' => $kategori
        ]);
    }

    public function update(Request $request, string $id)
    {
        $kategori = KategoriUkt::findOrFail($id);

        $request->validate([
            'id_prodi' => 'required|numeric',
            'kelompok_kategori' => 'required',
            'nominal_ukt' => 'required|numeric|min:0',
            'jenjang' => 'required'
        ]);

        $kategori->update([
            'id_prodi' => $request->id_prodi,
            'kelompok_kategori' => $request->kelompok_kategori,
            'nominal_ukt' => $request->nominal_ukt,
            'jenjang' => $request->jenjang
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori UKT berhasil diupdate',
            'data' => $kategori
        ]);
    }

    public function destroy(string $id)
    {
        $kategori = KategoriUkt::findOrFail($id);

        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori UKT berhasil dihapus'
        ]);
    }
}
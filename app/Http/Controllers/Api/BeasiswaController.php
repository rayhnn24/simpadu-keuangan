<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        $data = Beasiswa::get();

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil diambil',
            'data' => $data
        ]);
    }
        public function getByNama(string $nama)
    {
        $beasiswa = Beasiswa::whereRaw(
            'LOWER(nama_beasiswa) LIKE ?',
            ['%' . strtolower($nama) . '%']
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Data beasiswa berhasil dicari',
            'data' => $beasiswa
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'potongan_persen' => 'required|numeric|min:0|max:100'
        ]);

        $beasiswa = Beasiswa::create([
            'nama_beasiswa' => $request->nama_beasiswa,
            'keterangan' => $request->keterangan,
            'potongan_persen' => $request->potongan_persen
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Beasiswa berhasil ditambahkan',
            'data' => $beasiswa
        ], 201);
    }

    public function show(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $beasiswa
        ]);
    }

    public function update(Request $request, string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        $beasiswa->update([
            'nama_beasiswa' => $request->nama_beasiswa,
            'keterangan' => $request->keterangan,
            'potongan_persen' => $request->potongan_persen
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Beasiswa berhasil diupdate',
            'data' => $beasiswa
        ]);
    }

    public function destroy(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        $beasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Beasiswa berhasil dihapus'
        ]);
    }
}
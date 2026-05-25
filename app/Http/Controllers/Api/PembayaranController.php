<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Menampilkan semua pembayaran
     */
    public function index()
    {
        $pembayaran = Pembayaran::with(
            'mhsUkt.kategori',
            'mhsUkt.beasiswaMhs.beasiswa'
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil diambil',
            'data' => $pembayaran
        ]);
    }

    /**
     * Menyimpan pembayaran baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mhs_ukt' => 'required|exists:mhs_ukt,id_mhs_ukt',
            'jumlah_bayar' => 'required|numeric|min:1',
            'tgl_pembayaran' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        // Ambil data mahasiswa UKT
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa'
        )->findOrFail($request->id_mhs_ukt);

        // Ambil total tagihan dari kolom mhs_ukt
        $totalTagihan = $mhsUkt->total_tagihan;

        // Kalau total_tagihan masih 0 padahal tidak punya beasiswa penuh,
        // gunakan nominal UKT sebagai fallback agar tidak error saat data lama.
        if ($totalTagihan <= 0) {
            $punyaBeasiswaPenuh =
                $mhsUkt->beasiswaMhs &&
                $mhsUkt->beasiswaMhs->beasiswa &&
                $mhsUkt->beasiswaMhs->beasiswa->potongan_persen >= 100;

            if (!$punyaBeasiswaPenuh && $mhsUkt->kategori) {
                $totalTagihan = $mhsUkt->kategori->nominal_ukt;

                $mhsUkt->update([
                    'total_tagihan' => $totalTagihan
                ]);
            }
        }

        // Ambil info UKT asli untuk response
        $totalTagihanAsli = $mhsUkt->kategori
            ? $mhsUkt->kategori->nominal_ukt
            : 0;

        // Ambil info beasiswa untuk response
        $potonganPersen = 0;
        $namaBeasiswa = null;

        if (
            $mhsUkt->beasiswaMhs &&
            $mhsUkt->beasiswaMhs->beasiswa
        ) {
            $potonganPersen =
                $mhsUkt->beasiswaMhs->beasiswa->potongan_persen;

            $namaBeasiswa =
                $mhsUkt->beasiswaMhs->beasiswa->nama_beasiswa;
        }

        $potonganNominal =
            ($potonganPersen / 100) * $totalTagihanAsli;

        // Jika total tagihan 0, berarti beasiswa penuh / KIP
        if ($totalTagihan <= 0) {
            $mhsUkt->update([
                'status_pembayaran' => 'LUNAS'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa mendapat beasiswa penuh',
                'total_tagihan_asli' => $totalTagihanAsli,
                'nama_beasiswa' => $namaBeasiswa,
                'potongan_persen' => $potonganPersen,
                'potongan_nominal' => $potonganNominal,
                'total_tagihan' => 0,
                'total_bayar' => 0,
                'sisa_tagihan' => 0,
                'status_pembayaran' => 'LUNAS'
            ]);
        }

        // Hitung total pembayaran sebelumnya
        $totalBayar = Pembayaran::where(
            'id_mhs_ukt',
            $request->id_mhs_ukt
        )->sum('jumlah_bayar');

        // Validasi pembayaran tidak boleh melebihi total tagihan
        if (($totalBayar + $request->jumlah_bayar) > $totalTagihan) {
            return response()->json([
                'success' => false,
                'message' => 'Pembayaran melebihi total tagihan'
            ], 400);
        }

        // Simpan pembayaran
        $pembayaran = Pembayaran::create([
            'id_mhs_ukt' => $request->id_mhs_ukt,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'keterangan' => $request->keterangan
        ]);

        // Hitung ulang total pembayaran setelah transaksi
        $totalBayarBaru = Pembayaran::where(
            'id_mhs_ukt',
            $request->id_mhs_ukt
        )->sum('jumlah_bayar');

        // Hitung sisa tagihan
        $sisaTagihan = $totalTagihan - $totalBayarBaru;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
        }

        // Tentukan status pembayaran
        if ($totalBayarBaru <= 0) {
            $status = 'BELUM_LUNAS';
        } elseif ($totalBayarBaru < $totalTagihan) {
            $status = 'CICILAN';
        } else {
            $status = 'LUNAS';
        }

        // Update status pembayaran mahasiswa
        $mhsUkt->update([
            'status_pembayaran' => $status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil ditambahkan',

            'total_tagihan_asli' => $totalTagihanAsli,
            'nama_beasiswa' => $namaBeasiswa,
            'potongan_persen' => $potonganPersen,
            'potongan_nominal' => $potonganNominal,

            'total_tagihan' => $totalTagihan,
            'total_bayar' => $totalBayarBaru,
            'sisa_tagihan' => $sisaTagihan,
            'status_pembayaran' => $status,

            'data' => $pembayaran
        ], 201);
    }

    /**
     * Detail pembayaran
     */
    public function show(string $id)
    {
        $pembayaran = Pembayaran::with(
            'mhsUkt.kategori',
            'mhsUkt.beasiswaMhs.beasiswa'
        )->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail pembayaran berhasil diambil',
            'data' => $pembayaran
        ]);
    }

    /**
     * Update pembayaran
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jumlah_bayar' => 'required|numeric|min:1',
            'tgl_pembayaran' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'jumlah_bayar' => $request->jumlah_bayar,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'keterangan' => $request->keterangan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil diupdate',
            'data' => $pembayaran
        ]);
    }

    /**
     * Hapus pembayaran
     */
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil dihapus'
        ]);
    }
}
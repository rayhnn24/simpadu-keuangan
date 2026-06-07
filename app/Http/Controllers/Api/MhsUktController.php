<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use App\Models\KategoriUkt;
use App\Models\StatusMhs;
use Illuminate\Http\Request;

class MhsUktController extends Controller
{
    public function index(Request $request)
    {
        $query = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        );

        if ($request->status) {
            $query->where('status_pembayaran', strtoupper($request->status));
        }

        if ($request->semester) {
            $query->where('semester', $request->semester);
        }

        if ($request->search) {
            $search = strtolower($request->search);

            $query->whereRaw(
                'LOWER(nim) LIKE ?',
                ["%{$search}%"]
            );
        }

        $mhsUkt = $query->get();

        $data = $mhsUkt->map(function ($item) {
            return $this->formatMhsUktResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa UKT berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'id_kategori_ukt' => 'required|exists:kategori_ukt,id_kategori_ukt',
            'semester' => 'required|numeric',
            'tahun_akademik' => 'required'
        ]);

        $kategori = KategoriUkt::findOrFail(
            $request->id_kategori_ukt
        );

        $mhsUkt = MhsUkt::create([
            'nim' => $request->nim,
            'id_kategori_ukt' => $request->id_kategori_ukt,
            'semester' => $request->semester,
            'tahun_akademik' => $request->tahun_akademik,
            'status_pembayaran' => 'BELUM_LUNAS',
            'total_tagihan' => $kategori->nominal_ukt
        ]);

        StatusMhs::updateOrCreate(
            [
                'id_mhs_ukt' => $mhsUkt->id_mhs_ukt
            ],
            [
                'status' => 'NONAKTIF',
                'keterangan' => 'Mahasiswa belum melakukan pembayaran UKT'
            ]
        );

        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )->findOrFail($mhsUkt->id_mhs_ukt);

        return response()->json([
            'success' => true,
            'message' => 'Tagihan UKT berhasil ditambahkan',
            'data' => $this->formatMhsUktResponse($mhsUkt)
        ], 201);
    }

    public function show(string $id)
    {
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail mahasiswa UKT berhasil diambil',
            'data' => $this->formatMhsUktResponse($mhsUkt)
        ]);
    }

    public function showByNim(string $nim)
    {
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )
            ->whereRaw('LOWER(nim) = ?', [strtolower($nim)])
            ->first();

        if (!$mhsUkt) {
            return response()->json([
                'success' => false,
                'message' => 'Data mahasiswa UKT tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa UKT berhasil diambil',
            'data' => $this->formatMhsUktResponse($mhsUkt)
        ]);
    }

    public function getByStatus(string $status)
    {
        $status = strtoupper($status);

        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )
            ->where('status_pembayaran', $status)
            ->get();

        $data = $mhsUkt->map(function ($item) {
            return $this->formatMhsUktResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa UKT berdasarkan status berhasil diambil',
            'data' => $data
        ]);
    }

    public function getBySemester(string $semester)
    {
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )
            ->where('semester', $semester)
            ->get();

        $data = $mhsUkt->map(function ($item) {
            return $this->formatMhsUktResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa UKT berdasarkan semester berhasil diambil',
            'data' => $data
        ]);
    }

    public function search(string $keyword)
    {
        $keyword = strtolower($keyword);

        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )
            ->whereRaw(
                'LOWER(nim) LIKE ?',
                ["%{$keyword}%"]
            )
            ->get();

        $data = $mhsUkt->map(function ($item) {
            return $this->formatMhsUktResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa UKT berhasil dicari',
            'data' => $data
        ]);
    }

    public function update(Request $request, string $id)
    {
        $mhsUkt = MhsUkt::findOrFail($id);

        $request->validate([
            'nim' => 'required',
            'id_kategori_ukt' => 'required|exists:kategori_ukt,id_kategori_ukt',
            'semester' => 'required|numeric',
            'tahun_akademik' => 'required'
        ]);

        $kategori = KategoriUkt::findOrFail(
            $request->id_kategori_ukt
        );

        $mhsUkt->update([
            'nim' => $request->nim,
            'id_kategori_ukt' => $request->id_kategori_ukt,
            'semester' => $request->semester,
            'tahun_akademik' => $request->tahun_akademik,
            'total_tagihan' => $kategori->nominal_ukt
        ]);

        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $this->formatMhsUktResponse($mhsUkt)
        ]);
    }

    public function destroy(string $id)
    {
        $mhsUkt = MhsUkt::findOrFail($id);

        $mhsUkt->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function historiPembayaran(string $id)
    {
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )->findOrFail($id);

        $ringkasan = $this->formatMhsUktResponse($mhsUkt);

        $historiPembayaran = $mhsUkt->pembayaran->map(function ($item) {
            return [
                'id_pembayaran' => $item->id_pembayaran,
                'jumlah_bayar' => (float) $item->jumlah_bayar,
                'tgl_pembayaran' => $item->tgl_pembayaran,
                'keterangan' => $item->keterangan
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Histori pembayaran berhasil diambil',
            'data' => [
                'mahasiswa_ukt' => [
                    'id_mhs_ukt' => $ringkasan['id_mhs_ukt'],
                    'nim' => $ringkasan['nim'],
                    'semester' => $ringkasan['semester'],
                    'tahun_akademik' => $ringkasan['tahun_akademik']
                ],

                'kategori_ukt' => $ringkasan['kategori_ukt'],

                'beasiswa' => $ringkasan['beasiswa'],

                'tagihan' => $ringkasan['tagihan'],

                'status' => $ringkasan['status'],

                'histori_pembayaran' => $historiPembayaran
            ]
        ]);
    }

    private function formatMhsUktResponse($item)
    {
        $totalBayar = $item->pembayaran->sum('jumlah_bayar');

        $nominalUkt = $item->kategori
            ? $item->kategori->nominal_ukt
            : 0;

        $totalTagihan = $item->total_tagihan;

        if ($totalTagihan <= 0) {
            $punyaBeasiswaPenuh =
                $item->beasiswaMhs &&
                $item->beasiswaMhs->beasiswa &&
                $item->beasiswaMhs->beasiswa->potongan_persen >= 100;

            if (!$punyaBeasiswaPenuh) {
                $totalTagihan = $nominalUkt;
            }
        }

        $potonganPersen = (
            $item->beasiswaMhs &&
            $item->beasiswaMhs->beasiswa
        )
            ? $item->beasiswaMhs->beasiswa->potongan_persen
            : 0;

        $potonganNominal = $nominalUkt - $totalTagihan;

        if ($potonganNominal < 0) {
            $potonganNominal = 0;
        }

        $sisaTagihan = $totalTagihan - $totalBayar;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
        }

        return [
            'id_mhs_ukt' => $item->id_mhs_ukt,
            'nim' => $item->nim,
            'semester' => $item->semester,
            'tahun_akademik' => $item->tahun_akademik,

            'kategori_ukt' => [
                'id_kategori_ukt' => $item->kategori
                    ? $item->kategori->id_kategori_ukt
                    : null,

                'id_prodi' => $item->kategori
                    ? $item->kategori->id_prodi
                    : null,

                'kategori' => $item->kategori
                    ? $item->kategori->kategori
                    : null,

                'jenjang' => $item->kategori
                    ? $item->kategori->jenjang
                    : null,

                'nominal_ukt' => (float) $nominalUkt
            ],

            'beasiswa' => [
                'id_beasiswa_mhs' => $item->beasiswaMhs
                    ? $item->beasiswaMhs->id_beasiswa_mhs
                    : null,

                'id_beasiswa' => $item->beasiswaMhs
                    ? $item->beasiswaMhs->id_beasiswa
                    : null,

                'nama_beasiswa' => (
                    $item->beasiswaMhs &&
                    $item->beasiswaMhs->beasiswa
                )
                    ? $item->beasiswaMhs->beasiswa->nama_beasiswa
                    : null,

                'potongan_persen' => (float) $potonganPersen,
                'potongan_nominal' => (float) $potonganNominal
            ],

            'tagihan' => [
                'total_tagihan' => (float) $totalTagihan,
                'total_bayar' => (float) $totalBayar,
                'sisa_tagihan' => (float) $sisaTagihan
            ],

            'status' => [
                'status_pembayaran' => $item->status_pembayaran,
                'status_mhs' => $item->statusMhs
                    ? $item->statusMhs->status
                    : 'NONAKTIF'
            ]
        ];
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use Illuminate\Http\Request;
use App\Models\KategoriUkt;

class MhsUktController extends Controller
{
    public function index(Request $request)
    {
        $query = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran'
        );

        if ($request->status) {
            $query->where('status_pembayaran', $request->status);
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

        return response()->json([
            'success' => true,
            'message' => 'Tagihan UKT berhasil ditambahkan',
            'data' => $mhsUkt
        ], 201);
    }

    public function show(string $id)
    {
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran'
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
            'pembayaran'
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
            'pembayaran'
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
            'pembayaran'
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
            'pembayaran'
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

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $mhsUkt
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
            'pembayaran'
        )->findOrFail($id);

        $mahasiswa = $this->getMahasiswaByNim($mhsUkt->nim);

        $nominalUkt = $mhsUkt->kategori
            ? $mhsUkt->kategori->nominal_ukt
            : 0;

        $totalTagihan = $mhsUkt->total_tagihan;

        if ($totalTagihan <= 0) {
            $punyaBeasiswaPenuh =
                $mhsUkt->beasiswaMhs &&
                $mhsUkt->beasiswaMhs->beasiswa &&
                $mhsUkt->beasiswaMhs->beasiswa->potongan_persen >= 100;

            if (!$punyaBeasiswaPenuh) {
                $totalTagihan = $nominalUkt;
            }
        }

        $potonganPersen = (
            $mhsUkt->beasiswaMhs &&
            $mhsUkt->beasiswaMhs->beasiswa
        )
            ? $mhsUkt->beasiswaMhs->beasiswa->potongan_persen
            : 0;

        $potonganNominal = $nominalUkt - $totalTagihan;

        if ($potonganNominal < 0) {
            $potonganNominal = 0;
        }

        $totalBayar = $mhsUkt->pembayaran->sum('jumlah_bayar');

        $sisaTagihan = $totalTagihan - $totalBayar;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
        }

        return response()->json([
            'success' => true,
            'message' => 'Histori pembayaran berhasil diambil',
            'data' => [
                'mahasiswa' => [
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                    'nim' => $mhsUkt->nim,
                    'nama_mahasiswa' => $mahasiswa['nama_mahasiswa'],
                    'prodi' => $mahasiswa['prodi'],
                    'semester' => $mhsUkt->semester,
                    'tahun_akademik' => $mhsUkt->tahun_akademik,
                    'status_pembayaran' => $mhsUkt->status_pembayaran,
                ],

                'tagihan' => [
                    'kategori_ukt' => $mhsUkt->kategori
                        ? $mhsUkt->kategori->kategori
                        : null,

                    'nominal_ukt' => $nominalUkt,

                    'nama_beasiswa' => (
                        $mhsUkt->beasiswaMhs &&
                        $mhsUkt->beasiswaMhs->beasiswa
                    )
                        ? $mhsUkt->beasiswaMhs->beasiswa->nama_beasiswa
                        : null,

                    'potongan_persen' => $potonganPersen,
                    'potongan_nominal' => $potonganNominal,
                    'total_tagihan' => $totalTagihan,
                    'total_bayar' => $totalBayar,
                    'sisa_tagihan' => $sisaTagihan,
                ],

                'histori_pembayaran' => $mhsUkt->pembayaran->map(function ($item) {
                    return [
                        'id_pembayaran' => $item->id_pembayaran,
                        'jumlah_bayar' => $item->jumlah_bayar,
                        'tgl_pembayaran' => $item->tgl_pembayaran,
                        'keterangan' => $item->keterangan,
                        'created_at' => $item->created_at,
                    ];
                })
            ]
        ]);
    }

    private function formatMhsUktResponse($item)
    {
        $mahasiswa = $this->getMahasiswaByNim($item->nim);

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
            'nama_mahasiswa' => $mahasiswa['nama_mahasiswa'],
            'prodi' => $mahasiswa['prodi'],
            'semester' => $item->semester,
            'tahun_akademik' => $item->tahun_akademik,
            'status_pembayaran' => $item->status_pembayaran,

            'kategori_ukt' => $item->kategori
                ? $item->kategori->kategori
                : null,

            'id_prodi' => $item->kategori
                ? $item->kategori->id_prodi
                : null,

            'jenjang' => $item->kategori
                ? $item->kategori->jenjang
                : null,

            'nominal_ukt' => $nominalUkt,

            'nama_beasiswa' => (
                $item->beasiswaMhs &&
                $item->beasiswaMhs->beasiswa
            )
                ? $item->beasiswaMhs->beasiswa->nama_beasiswa
                : null,

            'potongan_persen' => $potonganPersen,
            'potongan_nominal' => $potonganNominal,
            'total_tagihan' => $totalTagihan,
            'total_bayar' => $totalBayar,
            'sisa_tagihan' => $sisaTagihan
        ];
    }

    private function getMahasiswaByNim($nim)
    {
        $dummyMahasiswa = [
            'C030324095' => [
                'nama_mahasiswa' => 'Rayhan',
                'prodi' => 'Teknik Informatika'
            ],
            'C030324094' => [
                'nama_mahasiswa' => 'imam',
                'prodi' => 'Sistem Informasi'
            ],
            'C030324093' => [
                'nama_mahasiswa' => 'Ijan',
                'prodi' => 'Teknik Informatika'
            ],
            'C030324096' => [
                'nama_mahasiswa' => 'adit',
                'prodi' => 'Sistem Informasi'
            ]
        ];

        return $dummyMahasiswa[$nim] ?? [
            'nama_mahasiswa' => 'Tidak ditemukan',
            'prodi' => '-'
        ];
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use App\Models\Pembayaran;
use App\Models\StatusMhs;
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
            'mhsUkt.beasiswaMhs.beasiswa',
            'mhsUkt.statusMhs'
        )->get();

        $data = $pembayaran->map(function ($item) {
            return $this->formatPembayaranResponse($item);
        });

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Menampilkan pembayaran berdasarkan id_mhs_ukt
     * Endpoint: GET /api/pembayaran/mhs-ukt/{id_mhs_ukt}
     */
    public function getByMhsUkt(string $id_mhs_ukt)
    {
        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        )->findOrFail($id_mhs_ukt);

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran mahasiswa berhasil diambil',
            'data' => $this->formatPembayaranMahasiswaResponse($mhsUkt)
        ]);
    }

    /**
     * Menampilkan pembayaran berdasarkan NIM
     */
    public function getByNim(string $nim)
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
            'message' => 'Data pembayaran mahasiswa berhasil diambil berdasarkan NIM',
            'data' => $this->formatPembayaranMahasiswaResponse($mhsUkt)
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

        $mhsUkt = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'statusMhs'
        )->findOrFail($request->id_mhs_ukt);

        $totalTagihan = $mhsUkt->total_tagihan;

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

        $totalTagihanAsli = $mhsUkt->kategori
            ? $mhsUkt->kategori->nominal_ukt
            : 0;

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

            StatusMhs::updateOrCreate(
                [
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt
                ],
                [
                    'status' => 'AKTIF',
                    'keterangan' => 'Mahasiswa aktif karena mendapat beasiswa penuh'
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa mendapat beasiswa penuh',
                'data' => [
                    'mahasiswa_ukt' => [
                        'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                        'nim' => $mhsUkt->nim,
                        'semester' => $mhsUkt->semester,
                        'tahun_akademik' => $mhsUkt->tahun_akademik
                    ],
                    'beasiswa' => [
                        'nama_beasiswa' => $namaBeasiswa,
                        'potongan_persen' => (float) $potonganPersen,
                        'potongan_nominal' => (float) $potonganNominal
                    ],
                    'tagihan' => [
                        'total_tagihan_asli' => (float) $totalTagihanAsli,
                        'total_tagihan' => 0,
                        'total_bayar' => 0,
                        'sisa_tagihan' => 0
                    ],
                    'status' => [
                        'status_pembayaran' => 'LUNAS',
                        'status_mhs' => 'AKTIF'
                    ]
                ]
            ]);
        }

        $totalBayar = Pembayaran::where(
            'id_mhs_ukt',
            $request->id_mhs_ukt
        )->sum('jumlah_bayar');

        if (($totalBayar + $request->jumlah_bayar) > $totalTagihan) {
            return response()->json([
                'success' => false,
                'message' => 'Pembayaran melebihi total tagihan'
            ], 400);
        }

        $pembayaran = Pembayaran::create([
            'id_mhs_ukt' => $request->id_mhs_ukt,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'keterangan' => $request->keterangan
        ]);

        $totalBayarBaru = Pembayaran::where(
            'id_mhs_ukt',
            $request->id_mhs_ukt
        )->sum('jumlah_bayar');

        $sisaTagihan = $totalTagihan - $totalBayarBaru;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
        }

        if ($totalBayarBaru <= 0) {
            $status = 'BELUM_LUNAS';
        } elseif ($totalBayarBaru < $totalTagihan) {
            $status = 'CICILAN';
        } else {
            $status = 'LUNAS';
        }

        $mhsUkt->update([
            'status_pembayaran' => $status
        ]);

        if ($status === 'CICILAN' || $status === 'LUNAS') {
            StatusMhs::updateOrCreate(
                [
                    'id_mhs_ukt' => $mhsUkt->id_mhs_ukt
                ],
                [
                    'status' => 'AKTIF',
                    'keterangan' => 'Mahasiswa aktif karena sudah melakukan pembayaran UKT'
                ]
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => [
                'pembayaran' => [
                    'id_pembayaran' => $pembayaran->id_pembayaran,
                    'id_mhs_ukt' => $pembayaran->id_mhs_ukt,
                    'nim' => $mhsUkt->nim,
                    'jumlah_bayar' => (float) $pembayaran->jumlah_bayar,
                    'tgl_pembayaran' => $pembayaran->tgl_pembayaran,
                    'keterangan' => $pembayaran->keterangan
                ],
                'beasiswa' => [
                    'nama_beasiswa' => $namaBeasiswa,
                    'potongan_persen' => (float) $potonganPersen,
                    'potongan_nominal' => (float) $potonganNominal
                ],
                'tagihan' => [
                    'total_tagihan_asli' => (float) $totalTagihanAsli,
                    'total_tagihan' => (float) $totalTagihan,
                    'total_bayar' => (float) $totalBayarBaru,
                    'sisa_tagihan' => (float) $sisaTagihan
                ],
                'status' => [
                    'status_pembayaran' => $status,
                    'status_mhs' => ($status === 'CICILAN' || $status === 'LUNAS')
                        ? 'AKTIF'
                        : 'NONAKTIF'
                ]
            ]
        ], 201);
    }

    /**
     * Detail pembayaran
     */
    public function show(string $id)
    {
        $pembayaran = Pembayaran::with(
            'mhsUkt.kategori',
            'mhsUkt.beasiswaMhs.beasiswa',
            'mhsUkt.statusMhs'
        )->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail pembayaran berhasil diambil',
            'data' => $this->formatPembayaranResponse($pembayaran)
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
            'data' => [
                'id_pembayaran' => $pembayaran->id_pembayaran,
                'id_mhs_ukt' => $pembayaran->id_mhs_ukt,
                'jumlah_bayar' => (float) $pembayaran->jumlah_bayar,
                'tgl_pembayaran' => $pembayaran->tgl_pembayaran,
                'keterangan' => $pembayaran->keterangan
            ]
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

    private function formatPembayaranResponse($item)
    {
        return [
            'id_pembayaran' => $item->id_pembayaran,
            'jumlah_bayar' => (float) $item->jumlah_bayar,
            'tgl_pembayaran' => $item->tgl_pembayaran,
            'keterangan' => $item->keterangan,

            'mahasiswa_ukt' => [
                'id_mhs_ukt' => $item->mhsUkt
                    ? $item->mhsUkt->id_mhs_ukt
                    : null,

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

            'kategori_ukt' => [
                'id_kategori_ukt' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->kategori
                )
                    ? $item->mhsUkt->kategori->id_kategori_ukt
                    : null,

                'id_prodi' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->kategori
                )
                    ? $item->mhsUkt->kategori->id_prodi
                    : null,

                'kategori' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->kategori
                )
                    ? $item->mhsUkt->kategori->kategori
                    : null,

                'jenjang' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->kategori
                )
                    ? $item->mhsUkt->kategori->jenjang
                    : null,

                'nominal_ukt' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->kategori
                )
                    ? (float) $item->mhsUkt->kategori->nominal_ukt
                    : 0
            ],

            'beasiswa' => [
                'nama_beasiswa' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->beasiswaMhs &&
                    $item->mhsUkt->beasiswaMhs->beasiswa
                )
                    ? $item->mhsUkt->beasiswaMhs->beasiswa->nama_beasiswa
                    : null,

                'potongan_persen' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->beasiswaMhs &&
                    $item->mhsUkt->beasiswaMhs->beasiswa
                )
                    ? (float) $item->mhsUkt->beasiswaMhs->beasiswa->potongan_persen
                    : 0
            ],

            'status' => [
                'status_pembayaran' => $item->mhsUkt
                    ? $item->mhsUkt->status_pembayaran
                    : null,

                'status_mhs' => (
                    $item->mhsUkt &&
                    $item->mhsUkt->statusMhs
                )
                    ? $item->mhsUkt->statusMhs->status
                    : 'NONAKTIF'
            ]
        ];
    }

    private function formatPembayaranMahasiswaResponse($mhsUkt)
    {
        $totalTagihan = $mhsUkt->total_tagihan;

        $nominalUkt = $mhsUkt->kategori
            ? $mhsUkt->kategori->nominal_ukt
            : 0;

        if ($totalTagihan <= 0) {
            $punyaBeasiswaPenuh =
                $mhsUkt->beasiswaMhs &&
                $mhsUkt->beasiswaMhs->beasiswa &&
                $mhsUkt->beasiswaMhs->beasiswa->potongan_persen >= 100;

            if (!$punyaBeasiswaPenuh) {
                $totalTagihan = $nominalUkt;
            }
        }

        $totalBayar = $mhsUkt->pembayaran->sum('jumlah_bayar');

        $sisaTagihan = $totalTagihan - $totalBayar;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
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

        return [
            'mahasiswa_ukt' => [
                'id_mhs_ukt' => $mhsUkt->id_mhs_ukt,
                'nim' => $mhsUkt->nim,
                'semester' => $mhsUkt->semester,
                'tahun_akademik' => $mhsUkt->tahun_akademik
            ],

            'kategori_ukt' => [
                'id_kategori_ukt' => $mhsUkt->kategori
                    ? $mhsUkt->kategori->id_kategori_ukt
                    : null,

                'id_prodi' => $mhsUkt->kategori
                    ? $mhsUkt->kategori->id_prodi
                    : null,

                'kategori' => $mhsUkt->kategori
                    ? $mhsUkt->kategori->kategori
                    : null,

                'jenjang' => $mhsUkt->kategori
                    ? $mhsUkt->kategori->jenjang
                    : null,

                'nominal_ukt' => (float) $nominalUkt
            ],

            'beasiswa' => [
                'nama_beasiswa' => (
                    $mhsUkt->beasiswaMhs &&
                    $mhsUkt->beasiswaMhs->beasiswa
                )
                    ? $mhsUkt->beasiswaMhs->beasiswa->nama_beasiswa
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
                'status_pembayaran' => $mhsUkt->status_pembayaran,
                'status_mhs' => $mhsUkt->statusMhs
                    ? $mhsUkt->statusMhs->status
                    : 'NONAKTIF'
            ],

            'riwayat_pembayaran' => $mhsUkt->pembayaran->map(function ($item) {
                return [
                    'id_pembayaran' => $item->id_pembayaran,
                    'jumlah_bayar' => (float) $item->jumlah_bayar,
                    'tgl_pembayaran' => $item->tgl_pembayaran,
                    'keterangan' => $item->keterangan
                ];
            })
        ];
    }
}
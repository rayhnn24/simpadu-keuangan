<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index(Request $request)
    {
        $query = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran',
            'statusMhs'
        );

        if ($request->semester) {
            $query->where(
                'semester',
                $request->semester
            );
        }

        if ($request->tahun_akademik) {
            $query->where(
                'tahun_akademik',
                $request->tahun_akademik
            );
        }

        $mhsUkt = $query->get();

        $totalPemasukan = 0;
        $totalTunggakan = 0;
        $totalPotonganBeasiswa = 0;
        $totalTagihanKeseluruhan = 0;

        $mahasiswaMenunggak = [];

        foreach ($mhsUkt as $item) {
            $ringkasan = $this->formatLaporanItem($item);

            $totalPemasukan += $ringkasan['tagihan']['total_bayar'];
            $totalTunggakan += $ringkasan['tagihan']['sisa_tagihan'];
            $totalPotonganBeasiswa += $ringkasan['beasiswa']['potongan_nominal'];
            $totalTagihanKeseluruhan += $ringkasan['tagihan']['total_tagihan'];

            if ($ringkasan['tagihan']['sisa_tagihan'] > 0) {
                $mahasiswaMenunggak[] = $ringkasan;
            }
        }

        $totalLunas = $mhsUkt
            ->where('status_pembayaran', 'LUNAS')
            ->count();

        $totalCicilan = $mhsUkt
            ->where('status_pembayaran', 'CICILAN')
            ->count();

        $totalBelumLunas = $mhsUkt
            ->where('status_pembayaran', 'BELUM_LUNAS')
            ->count();

        $totalAktif = $mhsUkt
            ->filter(function ($item) {
                return $item->statusMhs &&
                    $item->statusMhs->status === 'AKTIF';
            })
            ->count();

        $totalNonaktif = $mhsUkt
            ->filter(function ($item) {
                return !$item->statusMhs ||
                    $item->statusMhs->status === 'NONAKTIF';
            })
            ->count();

        return response()->json([
            'success' => true,
            'message' => 'Laporan keuangan berhasil diambil',

            'filter' => [
                'semester' => $request->semester,
                'tahun_akademik' => $request->tahun_akademik
            ],

            'data' => [
                'ringkasan_keuangan' => [
                    'total_tagihan' => (float) $totalTagihanKeseluruhan,
                    'total_pemasukan' => (float) $totalPemasukan,
                    'total_tunggakan' => (float) $totalTunggakan,
                    'total_potongan_beasiswa' => (float) $totalPotonganBeasiswa
                ],

                'ringkasan_pembayaran' => [
                    'total_lunas' => $totalLunas,
                    'total_cicilan' => $totalCicilan,
                    'total_belum_lunas' => $totalBelumLunas
                ],

                'ringkasan_status_mahasiswa' => [
                    'total_aktif' => $totalAktif,
                    'total_nonaktif' => $totalNonaktif
                ],

                'mahasiswa_menunggak' => $mahasiswaMenunggak
            ]
        ]);
    }

    public function getBySemester(string $semester)
    {
        $request = new Request();

        $request->merge([
            'semester' => $semester
        ]);

        return $this->index($request);
    }

    public function getByTahunAkademik(string $tahun_akademik)
    {
        $tahunAkademik = str_replace('-', '/', $tahun_akademik);

        $request = new Request();

        $request->merge([
            'tahun_akademik' => $tahunAkademik
        ]);

        return $this->index($request);
    }

    public function getBySemesterTahun(
        string $semester,
        string $tahun_akademik
    ) {
        $tahunAkademik = str_replace('-', '/', $tahun_akademik);

        $request = new Request();

        $request->merge([
            'semester' => $semester,
            'tahun_akademik' => $tahunAkademik
        ]);

        return $this->index($request);
    }

    private function formatLaporanItem($item)
    {
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

        $totalBayar = $item->pembayaran->sum('jumlah_bayar');

        $sisaTagihan = $totalTagihan - $totalBayar;

        if ($sisaTagihan < 0) {
            $sisaTagihan = 0;
        }

        return [
            'mahasiswa_ukt' => [
                'id_mhs_ukt' => $item->id_mhs_ukt,
                'nim' => $item->nim,
                'semester' => $item->semester,
                'tahun_akademik' => $item->tahun_akademik
            ],

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
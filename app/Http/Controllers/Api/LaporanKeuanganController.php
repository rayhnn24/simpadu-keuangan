<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MhsUkt;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index(Request $request)
    {
        // Query dasar
        $query = MhsUkt::with(
            'kategori',
            'beasiswaMhs.beasiswa',
            'pembayaran'
        );

        // Filter semester
        if ($request->semester) {
            $query->where(
                'semester',
                $request->semester
            );
        }

        // Filter tahun akademik
        if ($request->tahun_akademik) {
            $query->where(
                'tahun_akademik',
                $request->tahun_akademik
            );
        }

        // Ambil data mahasiswa UKT
        $mhsUkt = $query->get();

        // Total pemasukan
        $totalPemasukan = 0;

        // Total tunggakan
        $totalTunggakan = 0;

        // Total potongan beasiswa
        $totalPotonganBeasiswa = 0;

        // Detail mahasiswa menunggak
        $mahasiswaMenunggak = [];

        foreach ($mhsUkt as $item) {

            // Nominal UKT asli
            $nominalUkt = $item->kategori
                ? $item->kategori->nominal_ukt
                : 0;

            // Total tagihan dari kolom mhs_ukt
            $totalTagihan = $item->total_tagihan;

            // Fallback jika total_tagihan masih 0 tetapi bukan beasiswa penuh
            if ($totalTagihan <= 0) {
                $punyaBeasiswaPenuh =
                    $item->beasiswaMhs &&
                    $item->beasiswaMhs->beasiswa &&
                    $item->beasiswaMhs->beasiswa->potongan_persen >= 100;

                if (!$punyaBeasiswaPenuh) {
                    $totalTagihan = $nominalUkt;
                }
            }

            // Data beasiswa
            $potonganPersen = 0;
            $namaBeasiswa = null;

            if (
                $item->beasiswaMhs &&
                $item->beasiswaMhs->beasiswa
            ) {
                $potonganPersen =
                    $item->beasiswaMhs->beasiswa->potongan_persen;

                $namaBeasiswa =
                    $item->beasiswaMhs->beasiswa->nama_beasiswa;
            }

            // Hitung nominal potongan dari selisih nominal UKT dan total tagihan
            $potonganNominal = $nominalUkt - $totalTagihan;

            if ($potonganNominal < 0) {
                $potonganNominal = 0;
            }

            // Total pembayaran
            $totalBayar =
                $item->pembayaran->sum('jumlah_bayar');

            // Sisa tagihan
            $sisaTagihan =
                $totalTagihan - $totalBayar;

            if ($sisaTagihan < 0) {
                $sisaTagihan = 0;
            }

            // Akumulasi laporan
            $totalPemasukan += $totalBayar;
            $totalTunggakan += $sisaTagihan;
            $totalPotonganBeasiswa += $potonganNominal;

            // Mahasiswa menunggak
            if ($sisaTagihan > 0) {
                $mahasiswa =
                    $this->getMahasiswaByNim($item->nim);

                $mahasiswaMenunggak[] = [
                    'nim' => $item->nim,

                    'nama_mahasiswa' =>
                        $mahasiswa['nama_mahasiswa'],

                    'prodi' =>
                        $mahasiswa['prodi'],

                    'semester' =>
                        $item->semester,

                    'tahun_akademik' =>
                        $item->tahun_akademik,

                    'kategori_ukt' => $item->kategori
                        ? $item->kategori->kategori
                        : null,

                    'nominal_ukt' =>
                        $nominalUkt,

                    'nama_beasiswa' =>
                        $namaBeasiswa,

                    'potongan_persen' =>
                        $potonganPersen,

                    'potongan_nominal' =>
                        $potonganNominal,

                    'total_tagihan' =>
                        $totalTagihan,

                    'total_bayar' =>
                        $totalBayar,

                    'sisa_tagihan' =>
                        $sisaTagihan,

                    'status_pembayaran' =>
                        $item->status_pembayaran
                ];
            }
        }

        // Statistik pembayaran
        $totalLunas =
            $mhsUkt
                ->where('status_pembayaran', 'LUNAS')
                ->count();

        $totalCicilan =
            $mhsUkt
                ->where('status_pembayaran', 'CICILAN')
                ->count();

        $totalBelumLunas =
            $mhsUkt
                ->where('status_pembayaran', 'BELUM_LUNAS')
                ->count();

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Laporan keuangan berhasil diambil',

            'filter' => [
                'semester' =>
                    $request->semester,

                'tahun_akademik' =>
                    $request->tahun_akademik
            ],

            'data' => [
                'total_pemasukan' =>
                    $totalPemasukan,

                'total_tunggakan' =>
                    $totalTunggakan,

                'total_potongan_beasiswa' =>
                    $totalPotonganBeasiswa,

                'total_lunas' =>
                    $totalLunas,

                'total_cicilan' =>
                    $totalCicilan,

                'total_belum_lunas' =>
                    $totalBelumLunas,

                'mahasiswa_menunggak' =>
                    $mahasiswaMenunggak
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
        $tahunAkademik =
            str_replace('-', '/', $tahun_akademik);

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
        $tahunAkademik =
            str_replace('-', '/', $tahun_akademik);

        $request = new Request();

        $request->merge([
            'semester' => $semester,
            'tahun_akademik' => $tahunAkademik
        ]);

        return $this->index($request);
    }

    // Dummy data mahasiswa
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
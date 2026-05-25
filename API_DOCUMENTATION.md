# API Documentation — SIMPADU Keuangan

> **Base URL:** `http://127.0.0.1:8000/api`  
> **Auth:** Bearer Token dari service Auth / Kelompok 4  
> **Role Utama:** Admin Keuangan  
> **Modul:** Keuangan  
> **Format Response:** JSON

---

## Catatan Umum

API ini digunakan untuk mengelola data keuangan mahasiswa, meliputi kategori UKT, tagihan UKT mahasiswa, pembayaran, beasiswa, status mahasiswa, dashboard, dan laporan keuangan.

Pada tahap pengembangan lokal, beberapa data mahasiswa seperti nama dan prodi masih menggunakan dummy pada controller. Nantinya data mahasiswa, prodi, jurusan, dan tahun akademik dapat diambil dari API kelompok lain.

Header yang disarankan ketika auth sudah terintegrasi:

```http
Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json
```

---

## Daftar Modul

| Modul | Fungsi |
|---|---|
| Kategori UKT | Mengelola nominal UKT per prodi, jenjang, dan kategori |
| MHS UKT | Mengelola tagihan UKT mahasiswa |
| Pembayaran | Mengelola transaksi pembayaran UKT |
| Beasiswa Mahasiswa | Mengelola penerima beasiswa |
| Master Beasiswa | Mengelola jenis beasiswa dan persentase potongan |
| Status Mahasiswa | Mengelola status aktif/nonaktif mahasiswa |
| Dashboard | Menampilkan ringkasan data keuangan |
| Laporan Keuangan | Menampilkan laporan pemasukan, tunggakan, dan beasiswa |

---

# 1. Kategori UKT

Kategori UKT adalah data master yang berisi nominal UKT berdasarkan program studi, jenjang, dan kelompok UKT.

---

## #1. GET `/api/kategori-ukt`

Menampilkan seluruh data kategori UKT.

**Hak Akses:** Admin Keuangan

**Contoh Response:**

```json
{
  "success": true,
  "message": "Data kategori UKT berhasil diambil",
  "data": [
    {
      "id_kategori_ukt": 1,
      "id_prodi": 7,
      "kategori": "UKT 1",
      "nominal_ukt": "500000.00",
      "jenjang": "D3"
    }
  ]
}
```

---

## #2. GET `/api/kategori-ukt/{id}`

Menampilkan detail kategori UKT berdasarkan ID.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/kategori-ukt/1
```

---

## #3. GET `/api/kategori-ukt/prodi/{id_prodi}`

Menampilkan kategori UKT berdasarkan program studi.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/kategori-ukt/prodi/7
```

---

## #4. GET `/api/kategori-ukt/prodi/{id_prodi}/jenjang/{jenjang}`

Menampilkan kategori UKT berdasarkan program studi dan jenjang.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/kategori-ukt/prodi/7/jenjang/D3
```

---

## #5. POST `/api/kategori-ukt`

Menambahkan kategori UKT baru.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "id_prodi": 7,
  "kategori": "UKT 1",
  "nominal_ukt": 500000,
  "jenjang": "D3"
}
```

---

## #6. PUT `/api/kategori-ukt/{id}`

Mengubah data kategori UKT.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "id_prodi": 7,
  "kategori": "UKT 2",
  "nominal_ukt": 1000000,
  "jenjang": "D3"
}
```

---

## #7. DELETE `/api/kategori-ukt/{id}`

Menghapus data kategori UKT.

**Hak Akses:** Admin Keuangan

---

# 2. Mahasiswa UKT

Modul ini digunakan untuk menyimpan tagihan UKT mahasiswa. Ketika data dibuat, `total_tagihan` otomatis mengikuti `nominal_ukt` dari kategori UKT yang dipilih.

---

## #8. GET `/api/mhs-ukt`

Menampilkan seluruh data mahasiswa UKT.

**Hak Akses:** Admin Keuangan

---

## #9. GET `/api/mhs-ukt/{id}`

Menampilkan detail mahasiswa UKT berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/mhs-ukt/1
```

---

## #10. GET `/api/mhs-ukt/nim/{nim}`

Menampilkan detail mahasiswa UKT berdasarkan NIM.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/mhs-ukt/nim/C030324095
```

---

## #11. GET `/api/mhs-ukt/status/{status}`

Menampilkan data mahasiswa UKT berdasarkan status pembayaran.

**Hak Akses:** Admin Keuangan

Status yang tersedia:

```text
BELUM_LUNAS
CICILAN
LUNAS
```

Contoh:

```http
GET /api/mhs-ukt/status/LUNAS
```

---

## #12. GET `/api/mhs-ukt/semester/{semester}`

Menampilkan data mahasiswa UKT berdasarkan semester.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/mhs-ukt/semester/4
```

---

## #13. GET `/api/mhs-ukt/search/{keyword}`

Mencari data mahasiswa UKT berdasarkan NIM.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/mhs-ukt/search/C030324095
```

---

## #14. GET `/api/mhs-ukt/{id}/histori-pembayaran`

Menampilkan histori pembayaran mahasiswa berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/mhs-ukt/1/histori-pembayaran
```

---

## #15. POST `/api/mhs-ukt`

Menambahkan tagihan UKT mahasiswa.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "nim": "C030324095",
  "id_kategori_ukt": 41,
  "semester": 4,
  "tahun_akademik": "2025/2026"
}
```

**Catatan:**

`id_kategori_ukt` harus berasal dari endpoint kategori UKT, misalnya:

```http
GET /api/kategori-ukt/prodi/7
```

---

## #16. PUT `/api/mhs-ukt/{id}`

Mengubah data tagihan UKT mahasiswa.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "nim": "C030324095",
  "id_kategori_ukt": 42,
  "semester": 4,
  "tahun_akademik": "2025/2026"
}
```

---

## #17. DELETE `/api/mhs-ukt/{id}`

Menghapus data tagihan UKT mahasiswa.

**Hak Akses:** Admin Keuangan

---

# 3. Pembayaran

Modul pembayaran digunakan untuk mencatat pembayaran UKT. Sistem akan menghitung total bayar, sisa tagihan, dan status pembayaran secara otomatis.

---

## #18. GET `/api/pembayaran`

Menampilkan seluruh data pembayaran.

**Hak Akses:** Admin Keuangan

---

## #19. GET `/api/pembayaran/{id}`

Menampilkan detail pembayaran berdasarkan ID.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/pembayaran/1
```

---

## #20. GET `/api/pembayaran/mhs-ukt/{id_mhs_ukt}`

Menampilkan riwayat pembayaran berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/pembayaran/mhs-ukt/1
```

---

## #21. GET `/api/pembayaran/nim/{nim}`

Menampilkan riwayat pembayaran berdasarkan NIM.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/pembayaran/nim/C030324095
```

---

## #22. POST `/api/pembayaran`

Menambahkan pembayaran baru.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "id_mhs_ukt": 1,
  "jumlah_bayar": 1000000,
  "tgl_pembayaran": "2026-05-25",
  "keterangan": "Cicilan pertama"
}
```

**Validasi Backend:**

- `jumlah_bayar` tidak boleh melebihi sisa tagihan.
- Jika pembayaran sebagian, status menjadi `CICILAN`.
- Jika pembayaran sudah sama dengan total tagihan, status menjadi `LUNAS`.
- Jika mahasiswa mendapat beasiswa penuh, status menjadi `LUNAS`.

---

## #23. PUT `/api/pembayaran/{id}`

Mengubah data pembayaran.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "jumlah_bayar": 1000000,
  "tgl_pembayaran": "2026-05-25",
  "keterangan": "Update pembayaran"
}
```

---

## #24. DELETE `/api/pembayaran/{id}`

Menghapus data pembayaran.

**Hak Akses:** Admin Keuangan

---

# 4. Master Beasiswa

Master beasiswa digunakan untuk menyimpan jenis beasiswa dan persentase potongan UKT.

---

## #25. GET `/api/beasiswa-master`

Menampilkan seluruh master beasiswa.

**Hak Akses:** Admin Keuangan

---

## #26. GET `/api/beasiswa-master/{id}`

Menampilkan detail master beasiswa berdasarkan ID.

**Hak Akses:** Admin Keuangan

---

## #27. GET `/api/beasiswa-master/nama/{nama}`

Mencari master beasiswa berdasarkan nama.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/beasiswa-master/nama/kip
```

---

## #28. POST `/api/beasiswa-master`

Menambahkan master beasiswa baru.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "nama_beasiswa": "KIP Kuliah",
  "keterangan": "Beasiswa penuh",
  "potongan_persen": 100
}
```

---

## #29. PUT `/api/beasiswa-master/{id}`

Mengubah master beasiswa.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "nama_beasiswa": "Beasiswa Prestasi",
  "keterangan": "Potongan UKT 50%",
  "potongan_persen": 50
}
```

---

## #30. DELETE `/api/beasiswa-master/{id}`

Menghapus master beasiswa.

**Hak Akses:** Admin Keuangan

---

# 5. Beasiswa Mahasiswa

Modul ini digunakan untuk menentukan mahasiswa yang menerima beasiswa. Setelah data disimpan, sistem menghitung ulang `total_tagihan` berdasarkan persentase potongan beasiswa.

---

## #31. GET `/api/beasiswa`

Menampilkan seluruh penerima beasiswa.

**Hak Akses:** Admin Keuangan

---

## #32. GET `/api/beasiswa/{id}`

Menampilkan detail penerima beasiswa berdasarkan ID.

**Hak Akses:** Admin Keuangan

---

## #33. GET `/api/beasiswa/nim/{nim}`

Menampilkan penerima beasiswa berdasarkan NIM.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/beasiswa/nim/C030324095
```

---

## #34. POST `/api/beasiswa`

Menambahkan penerima beasiswa.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "nim": "C030324095",
  "id_beasiswa": 1,
  "keterangan": "Penerima KIP Kuliah"
}
```

**Catatan:**

Jika `potongan_persen = 100`, maka `total_tagihan` menjadi `0` dan `status_pembayaran` menjadi `LUNAS`.

---

## #35. PUT `/api/beasiswa/{id}`

Mengubah data penerima beasiswa.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "nim": "C030324095",
  "id_beasiswa": 2,
  "keterangan": "Update beasiswa prestasi"
}
```

---

## #36. DELETE `/api/beasiswa/{id}`

Menghapus data penerima beasiswa.

**Hak Akses:** Admin Keuangan

---

# 6. Status Mahasiswa

Status mahasiswa digunakan untuk menandai apakah mahasiswa aktif atau nonaktif berdasarkan kondisi pembayaran atau beasiswa.

---

## #37. GET `/api/status-mhs`

Menampilkan seluruh status mahasiswa.

**Hak Akses:** Admin Keuangan

---

## #38. GET `/api/status-mhs/{id}`

Menampilkan detail status mahasiswa berdasarkan ID.

**Hak Akses:** Admin Keuangan

---

## #39. GET `/api/status-mhs/mhs-ukt/{id_mhs_ukt}`

Menampilkan status mahasiswa berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/status-mhs/mhs-ukt/1
```

---

## #40. GET `/api/status-mhs/nim/{nim}`

Menampilkan status mahasiswa berdasarkan NIM.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/status-mhs/nim/C030324095
```

---

## #41. POST `/api/status-mhs`

Menambahkan status mahasiswa secara manual.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "id_mhs_ukt": 1,
  "status": "AKTIF",
  "keterangan": "Mahasiswa aktif karena sudah melakukan pembayaran UKT"
}
```

---

## #42. PUT `/api/status-mhs/{id}`

Mengubah status mahasiswa.

**Hak Akses:** Admin Keuangan

**JSON Body:**

```json
{
  "status": "NONAKTIF",
  "keterangan": "Mahasiswa belum melakukan pembayaran UKT"
}
```

---

## #43. DELETE `/api/status-mhs/{id}`

Menghapus data status mahasiswa.

**Hak Akses:** Admin Keuangan

---

# 7. Dashboard

Dashboard digunakan untuk menampilkan ringkasan data keuangan.

---

## #44. GET `/api/dashboard`

Menampilkan data dashboard keuangan.

**Hak Akses:** Admin Keuangan

**Contoh Response:**

```json
{
  "success": true,
  "message": "Data dashboard berhasil diambil",
  "data": {
    "total_mahasiswa": 4,
    "total_lunas": 2,
    "total_cicilan": 1,
    "total_belum_lunas": 1,
    "total_penerima_beasiswa": 2
  }
}
```

---

# 8. Laporan Keuangan

Laporan keuangan digunakan untuk melihat total pemasukan, total tunggakan, total potongan beasiswa, dan daftar mahasiswa menunggak.

---

## #45. GET `/api/laporan-keuangan`

Menampilkan laporan keuangan seluruh data.

**Hak Akses:** Admin Keuangan

---

## #46. GET `/api/laporan-keuangan/semester/{semester}`

Menampilkan laporan keuangan berdasarkan semester.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/laporan-keuangan/semester/4
```

---

## #47. GET `/api/laporan-keuangan/tahun/{tahun_akademik}`

Menampilkan laporan keuangan berdasarkan tahun akademik.

**Hak Akses:** Admin Keuangan

Catatan: gunakan tanda `-` untuk mengganti `/` pada URL.

Contoh:

```http
GET /api/laporan-keuangan/tahun/2025-2026
```

---

## #48. GET `/api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}`

Menampilkan laporan keuangan berdasarkan semester dan tahun akademik.

**Hak Akses:** Admin Keuangan

Contoh:

```http
GET /api/laporan-keuangan/semester/4/tahun/2025-2026
```

---

# Ringkasan Endpoint

| # | Method | Endpoint | Fungsi |
|---|---|---|---|
| 1 | GET | `/api/kategori-ukt` | Semua kategori UKT |
| 2 | GET | `/api/kategori-ukt/{id}` | Detail kategori UKT |
| 3 | GET | `/api/kategori-ukt/prodi/{id_prodi}` | Kategori UKT per prodi |
| 4 | GET | `/api/kategori-ukt/prodi/{id_prodi}/jenjang/{jenjang}` | Kategori UKT per prodi dan jenjang |
| 5 | POST | `/api/kategori-ukt` | Tambah kategori UKT |
| 6 | PUT | `/api/kategori-ukt/{id}` | Update kategori UKT |
| 7 | DELETE | `/api/kategori-ukt/{id}` | Hapus kategori UKT |
| 8 | GET | `/api/mhs-ukt` | Semua mahasiswa UKT |
| 9 | GET | `/api/mhs-ukt/{id}` | Detail mahasiswa UKT |
| 10 | GET | `/api/mhs-ukt/nim/{nim}` | Mahasiswa UKT berdasarkan NIM |
| 11 | GET | `/api/mhs-ukt/status/{status}` | Mahasiswa UKT berdasarkan status |
| 12 | GET | `/api/mhs-ukt/semester/{semester}` | Mahasiswa UKT berdasarkan semester |
| 13 | GET | `/api/mhs-ukt/search/{keyword}` | Search mahasiswa UKT |
| 14 | GET | `/api/mhs-ukt/{id}/histori-pembayaran` | Histori pembayaran |
| 15 | POST | `/api/mhs-ukt` | Tambah tagihan UKT |
| 16 | PUT | `/api/mhs-ukt/{id}` | Update tagihan UKT |
| 17 | DELETE | `/api/mhs-ukt/{id}` | Hapus tagihan UKT |
| 18 | GET | `/api/pembayaran` | Semua pembayaran |
| 19 | GET | `/api/pembayaran/{id}` | Detail pembayaran |
| 20 | GET | `/api/pembayaran/mhs-ukt/{id_mhs_ukt}` | Pembayaran by MHS UKT |
| 21 | GET | `/api/pembayaran/nim/{nim}` | Pembayaran by NIM |
| 22 | POST | `/api/pembayaran` | Tambah pembayaran |
| 23 | PUT | `/api/pembayaran/{id}` | Update pembayaran |
| 24 | DELETE | `/api/pembayaran/{id}` | Hapus pembayaran |
| 25 | GET | `/api/beasiswa-master` | Semua master beasiswa |
| 26 | GET | `/api/beasiswa-master/{id}` | Detail master beasiswa |
| 27 | GET | `/api/beasiswa-master/nama/{nama}` | Cari master beasiswa |
| 28 | POST | `/api/beasiswa-master` | Tambah master beasiswa |
| 29 | PUT | `/api/beasiswa-master/{id}` | Update master beasiswa |
| 30 | DELETE | `/api/beasiswa-master/{id}` | Hapus master beasiswa |
| 31 | GET | `/api/beasiswa` | Semua penerima beasiswa |
| 32 | GET | `/api/beasiswa/{id}` | Detail penerima beasiswa |
| 33 | GET | `/api/beasiswa/nim/{nim}` | Penerima beasiswa by NIM |
| 34 | POST | `/api/beasiswa` | Tambah penerima beasiswa |
| 35 | PUT | `/api/beasiswa/{id}` | Update penerima beasiswa |
| 36 | DELETE | `/api/beasiswa/{id}` | Hapus penerima beasiswa |
| 37 | GET | `/api/status-mhs` | Semua status mahasiswa |
| 38 | GET | `/api/status-mhs/{id}` | Detail status mahasiswa |
| 39 | GET | `/api/status-mhs/mhs-ukt/{id_mhs_ukt}` | Status by MHS UKT |
| 40 | GET | `/api/status-mhs/nim/{nim}` | Status by NIM |
| 41 | POST | `/api/status-mhs` | Tambah status mahasiswa |
| 42 | PUT | `/api/status-mhs/{id}` | Update status mahasiswa |
| 43 | DELETE | `/api/status-mhs/{id}` | Hapus status mahasiswa |
| 44 | GET | `/api/dashboard` | Dashboard keuangan |
| 45 | GET | `/api/laporan-keuangan` | Laporan keuangan |
| 46 | GET | `/api/laporan-keuangan/semester/{semester}` | Laporan by semester |
| 47 | GET | `/api/laporan-keuangan/tahun/{tahun_akademik}` | Laporan by tahun |
| 48 | GET | `/api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}` | Laporan by semester dan tahun |

---

# Catatan Integrasi Frontend

Untuk form tambah penerima beasiswa atau pembayaran, frontend disarankan mengambil data dari beberapa endpoint berikut:

1. Ambil data mahasiswa dari API kelompok mahasiswa.
2. Ambil kategori UKT dari API keuangan:

```http
GET /api/kategori-ukt/prodi/{id_prodi}
```

3. Ambil data UKT mahasiswa:

```http
GET /api/mhs-ukt/nim/{nim}
```

4. Ambil master beasiswa:

```http
GET /api/beasiswa-master
```

5. Simpan penerima beasiswa:

```http
POST /api/beasiswa
```

6. Simpan pembayaran:

```http
POST /api/pembayaran
```

---

# Kredensial Test

Auth login dikelola oleh kelompok 1. Modul keuangan menggunakan token dari service auth utama.

| Role | Keterangan |
|---|---|
| Admin Keuangan | Mengakses seluruh endpoint keuangan |
| Super Admin | Dapat diberikan akses jika dibutuhkan |

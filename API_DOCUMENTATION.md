# API Documentation — SIMPADU Keuangan

> **Base URL Local:** `http://127.0.0.1:8000/api`  
> **Base URL VPS:** `https://keuangan4e06.vps-poliban.my.id/api`  
> **Auth:** Bearer Token dari service Auth Kelompok 1  
> **Role Utama:** Admin Keuangan  
> **Modul:** Keuangan  
> **Format Response:** JSON  
> **Total Endpoint:** 48

---

## Catatan Umum

API ini digunakan untuk mengelola data keuangan mahasiswa, meliputi kategori UKT, tagihan UKT mahasiswa, pembayaran UKT, beasiswa, status mahasiswa, dashboard, dan laporan keuangan.

Modul keuangan **tidak menyimpan data lengkap mahasiswa** seperti nama mahasiswa, jurusan, dan prodi. Modul keuangan hanya menyimpan `nim` sebagai referensi. Data mahasiswa lengkap diambil dari API Kelompok 3, sedangkan data prodi dan jurusan diambil dari API Kelompok 1.

Header yang digunakan jika auth sudah terintegrasi:

```http
Authorization: Bearer {token}
Accept: application/json
Content-Type: application/json
```

---

## Format Response Umum

### Response Berhasil

```json
{
  "success": true,
  "message": "Data berhasil diambil",
  "data": {}
}
```

### Response Gagal

```json
{
  "success": false,
  "message": "Data tidak ditemukan"
}
```

---

## Pembagian Data Antar Kelompok

| Kelompok | Tanggung Jawab | Data yang Digunakan Modul Keuangan |
|---|---|---|
| Kelompok 1 | Auth, role, jurusan, prodi, tahun akademik | `id_prodi`, nama prodi, nama jurusan, tahun akademik |
| Kelompok 3 | Data mahasiswa | `nim`, nama mahasiswa, prodi, jurusan, semester |
| Kelompok 4 | Modul keuangan | kategori UKT, tagihan, pembayaran, beasiswa, status mahasiswa, dashboard, laporan |

Catatan penting:

```text
1. API keuangan hanya menyimpan dan mengirim NIM.
2. Frontend mencocokkan NIM ke API mahasiswa Kelompok 3.
3. Frontend mencocokkan id_prodi ke API akademik Kelompok 1.
4. Total tagihan, total bayar, sisa tagihan, status pembayaran, dan status mahasiswa dihitung oleh backend keuangan.
```

---

# Daftar Modul

| Modul | Fungsi |
|---|---|
| Kategori UKT | Mengelola nominal UKT per prodi, jenjang, dan kategori |
| MHS UKT | Mengelola tagihan UKT mahasiswa |
| Pembayaran | Mengelola transaksi pembayaran UKT |
| Master Beasiswa | Mengelola jenis beasiswa dan persentase potongan |
| Beasiswa Mahasiswa | Mengelola penerima beasiswa |
| Status Mahasiswa | Mengelola status aktif/nonaktif mahasiswa |
| Dashboard | Menampilkan ringkasan data keuangan |
| Laporan Keuangan | Menampilkan laporan pemasukan, tunggakan, dan beasiswa |

---

# 1. Kategori UKT

Kategori UKT adalah data master yang berisi nominal UKT berdasarkan program studi, jenjang, dan kategori UKT.

## #1. GET `/api/kategori-ukt`

Menampilkan seluruh data kategori UKT.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh response:

```json
{
  "success": true,
  "message": "Data kategori UKT berhasil diambil",
  "data": [
    {
      "id_kategori_ukt": 4,
      "id_prodi": 1,
      "kategori": "UKT 4",
      "jenjang": "D3",
      "nominal_ukt": 3000000
    }
  ]
}
```

---

## #2. GET `/api/kategori-ukt/{id}`

Menampilkan detail kategori UKT berdasarkan ID.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/kategori-ukt/4
```

---

## #3. GET `/api/kategori-ukt/prodi/{id_prodi}`

Menampilkan kategori UKT berdasarkan ID prodi.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/kategori-ukt/prodi/1
```

---

## #4. GET `/api/kategori-ukt/prodi/{id_prodi}/jenjang/{jenjang}`

Menampilkan kategori UKT berdasarkan ID prodi dan jenjang.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/kategori-ukt/prodi/1/jenjang/D3
```

---

## #5. POST `/api/kategori-ukt`

Menambahkan kategori UKT baru.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "id_prodi": 7,
  "kategori": "UKT 5",
  "nominal_ukt": 4900000,
  "jenjang": "D3"
}
```

Contoh response:

```json
{
  "success": true,
  "message": "Kategori UKT berhasil ditambahkan",
  "data": {
    "id_kategori_ukt": 35,
    "id_prodi": 7,
    "kategori": "UKT 5",
    "jenjang": "D3",
    "nominal_ukt": 4900000
  }
}
```

---

## #6. PUT `/api/kategori-ukt/{id}`

Mengubah data kategori UKT.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "id_prodi": 7,
  "kategori": "UKT 5",
  "nominal_ukt": 4900000,
  "jenjang": "D3"
}
```

---

## #7. DELETE `/api/kategori-ukt/{id}`

Menghapus data kategori UKT.

**Hak Akses:** Admin Keuangan

---

# 2. Mahasiswa UKT / Tagihan UKT

Modul ini digunakan untuk menyimpan tagihan UKT mahasiswa. Ketika data dibuat, `total_tagihan` otomatis mengikuti `nominal_ukt` dari kategori UKT yang dipilih.

## #8. GET `/api/mhs-ukt`

Menampilkan seluruh data mahasiswa UKT.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh response:

```json
{
  "success": true,
  "message": "Data mahasiswa UKT berhasil diambil",
  "data": [
    {
      "id_mhs_ukt": 1,
      "nim": "C030324033",
      "semester": 4,
      "tahun_akademik": "20252",
      "kategori_ukt": {
        "id_kategori_ukt": 4,
        "id_prodi": 1,
        "kategori": "UKT 4",
        "jenjang": "D3",
        "nominal_ukt": 3000000
      },
      "beasiswa": {
        "id_beasiswa_mhs": null,
        "id_beasiswa": null,
        "nama_beasiswa": null,
        "potongan_persen": 0,
        "potongan_nominal": 0
      },
      "tagihan": {
        "total_tagihan": 3000000,
        "total_bayar": 200000,
        "sisa_tagihan": 2800000
      },
      "status": {
        "status_pembayaran": "CICILAN",
        "status_mhs": "AKTIF"
      }
    }
  ]
}
```

Keterangan field penting:

| Field | Keterangan |
|---|---|
| `nim` | NIM mahasiswa dari data mahasiswa |
| `kategori_ukt` | Informasi kategori UKT yang dipilih |
| `beasiswa` | Informasi beasiswa mahasiswa jika ada |
| `tagihan.total_tagihan` | Total tagihan setelah potongan beasiswa |
| `tagihan.total_bayar` | Total pembayaran yang sudah masuk |
| `tagihan.sisa_tagihan` | Sisa tagihan mahasiswa |
| `status.status_pembayaran` | Status pembayaran UKT |
| `status.status_mhs` | Status aktif/nonaktif mahasiswa |

---

## #9. GET `/api/mhs-ukt/{id}`

Menampilkan detail mahasiswa UKT berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/mhs-ukt/1
```

---

## #10. GET `/api/mhs-ukt/nim/{nim}`

Menampilkan detail mahasiswa UKT berdasarkan NIM.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/mhs-ukt/nim/C030324095
```

---

## #11. GET `/api/mhs-ukt/status/{status}`

Menampilkan data mahasiswa UKT berdasarkan status pembayaran.

**Hak Akses:** Admin Keuangan, Super Admin

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

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/mhs-ukt/semester/4
```

---

## #13. GET `/api/mhs-ukt/search/{keyword}`

Mencari data mahasiswa UKT berdasarkan NIM.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/mhs-ukt/search/C030324095
```

---

## #14. GET `/api/mhs-ukt/{id}/histori-pembayaran`

Menampilkan histori pembayaran mahasiswa berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/mhs-ukt/1/histori-pembayaran
```

---

## #15. POST `/api/mhs-ukt`

Menambahkan tagihan UKT mahasiswa.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "nim": "C030324095",
  "id_kategori_ukt": 35,
  "semester": 4,
  "tahun_akademik": "20252"
}
```

Catatan:

```text
id_kategori_ukt harus berasal dari endpoint kategori UKT.
NIM berasal dari data mahasiswa Kelompok 3.
```

Aturan otomatis:

```text
status_pembayaran = BELUM_LUNAS
status_mhs = NONAKTIF
total_tagihan = nominal UKT
```

---

## #16. PUT `/api/mhs-ukt/{id}`

Mengubah data tagihan UKT mahasiswa.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "nim": "C030324095",
  "id_kategori_ukt": 35,
  "semester": 4,
  "tahun_akademik": "20252"
}
```

---

## #17. DELETE `/api/mhs-ukt/{id}`

Menghapus data tagihan UKT mahasiswa.

**Hak Akses:** Admin Keuangan

---

# 3. Pembayaran

Modul pembayaran digunakan untuk mencatat pembayaran UKT. Sistem akan menghitung total bayar, sisa tagihan, dan status pembayaran secara otomatis.

## #18. GET `/api/pembayaran`

Menampilkan seluruh data pembayaran.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh response:

```json
{
  "success": true,
  "message": "Data pembayaran berhasil diambil",
  "data": [
    {
      "id_pembayaran": 6,
      "jumlah_bayar": 200000,
      "tgl_pembayaran": "2026-05-12",
      "keterangan": "Cicilan pertama",
      "mahasiswa_ukt": {
        "id_mhs_ukt": 9,
        "nim": "C030324094",
        "semester": 4,
        "tahun_akademik": "20252"
      },
      "kategori_ukt": {
        "id_kategori_ukt": 35,
        "id_prodi": 7,
        "kategori": "JALUR KERJASAMA",
        "jenjang": "D3",
        "nominal_ukt": 5700000
      },
      "beasiswa": {
        "nama_beasiswa": "Beasiswa Prestasi",
        "potongan_persen": 50
      },
      "status": {
        "status_pembayaran": "CICILAN",
        "status_mhs": "AKTIF"
      }
    }
  ]
}
```

---

## #19. GET `/api/pembayaran/{id}`

Menampilkan detail pembayaran berdasarkan ID.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/pembayaran/6
```

---

## #20. GET `/api/pembayaran/mhs-ukt/{id_mhs_ukt}`

Menampilkan riwayat pembayaran berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/pembayaran/mhs-ukt/9
```

---

## #21. GET `/api/pembayaran/nim/{nim}`

Menampilkan riwayat pembayaran berdasarkan NIM.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/pembayaran/nim/C030324094
```

---

## #22. POST `/api/pembayaran`

Menambahkan pembayaran baru.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "id_mhs_ukt": 9,
  "jumlah_bayar": 200000,
  "tgl_pembayaran": "2026-05-12",
  "keterangan": "Cicilan pertama"
}
```

Validasi backend:

```text
jumlah_bayar tidak boleh melebihi sisa tagihan.
Jika pembayaran sebagian, status_pembayaran menjadi CICILAN.
Jika pembayaran sudah sama dengan total tagihan, status_pembayaran menjadi LUNAS.
Jika sudah membayar sebagian atau lunas, status_mhs menjadi AKTIF.
Jika mahasiswa mendapat beasiswa penuh, status_pembayaran menjadi LUNAS dan status_mhs menjadi AKTIF.
```

Contoh response berhasil:

```json
{
  "success": true,
  "message": "Pembayaran berhasil ditambahkan",
  "data": {
    "pembayaran": {
      "id_pembayaran": 6,
      "id_mhs_ukt": 9,
      "nim": "C030324094",
      "jumlah_bayar": 200000,
      "tgl_pembayaran": "2026-05-12",
      "keterangan": "Cicilan pertama"
    },
    "beasiswa": {
      "nama_beasiswa": "Beasiswa Prestasi",
      "potongan_persen": 50,
      "potongan_nominal": 2850000
    },
    "tagihan": {
      "total_tagihan_asli": 5700000,
      "total_tagihan": 2850000,
      "total_bayar": 200000,
      "sisa_tagihan": 2650000
    },
    "status": {
      "status_pembayaran": "CICILAN",
      "status_mhs": "AKTIF"
    }
  }
}
```

Keterangan field penting:

| Field | Keterangan |
|---|---|
| `pembayaran.jumlah_bayar` | Nominal pembayaran yang baru ditambahkan |
| `beasiswa.potongan_persen` | Persentase potongan beasiswa jika mahasiswa memiliki beasiswa |
| `beasiswa.potongan_nominal` | Nominal potongan dari UKT asli |
| `tagihan.total_tagihan_asli` | Nominal UKT sebelum potongan |
| `tagihan.total_tagihan` | Total tagihan setelah potongan |
| `tagihan.total_bayar` | Total pembayaran setelah transaksi baru |
| `tagihan.sisa_tagihan` | Sisa tagihan setelah pembayaran |
| `status.status_pembayaran` | Status pembayaran setelah transaksi |
| `status.status_mhs` | Status mahasiswa setelah transaksi |

Contoh response gagal:

```json
{
  "success": false,
  "message": "Pembayaran melebihi total tagihan"
}
```

---

## #23. PUT `/api/pembayaran/{id}`

Mengubah data pembayaran.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "jumlah_bayar": 1000000,
  "tgl_pembayaran": "2026-06-07",
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

## #25. GET `/api/beasiswa-master`

Menampilkan seluruh master beasiswa.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh response:

```json
{
  "success": true,
  "message": "Data beasiswa berhasil diambil",
  "data": [
    {
      "id_beasiswa": 2,
      "nama_beasiswa": "Beasiswa KIP KULIAH",
      "keterangan": "Beasiswa penuh",
      "potongan_persen": 100
    }
  ]
}
```

---

## #26. GET `/api/beasiswa-master/{id}`

Menampilkan detail master beasiswa berdasarkan ID.

**Hak Akses:** Admin Keuangan, Super Admin

---

## #27. GET `/api/beasiswa-master/nama/{nama}`

Mencari master beasiswa berdasarkan nama.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/beasiswa-master/nama/kip
```

---

## #28. POST `/api/beasiswa-master`

Menambahkan master beasiswa baru.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "nama_beasiswa": "Beasiswa KIP KULIAH",
  "keterangan": "Beasiswa penuh",
  "potongan_persen": 100
}
```

---

## #29. PUT `/api/beasiswa-master/{id}`

Mengubah master beasiswa.

**Hak Akses:** Admin Keuangan

JSON Body:

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

## #31. GET `/api/beasiswa`

Menampilkan seluruh penerima beasiswa.

**Hak Akses:** Admin Keuangan, Super Admin

---

## #32. GET `/api/beasiswa/{id}`

Menampilkan detail penerima beasiswa berdasarkan ID.

**Hak Akses:** Admin Keuangan, Super Admin

---

## #33. GET `/api/beasiswa/nim/{nim}`

Menampilkan penerima beasiswa berdasarkan NIM.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/beasiswa/nim/C030324094
```

---

## #34. POST `/api/beasiswa`

Menambahkan penerima beasiswa.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "nim": "C030324094",
  "id_beasiswa": 2,
  "keterangan": null
}
```

Catatan:

```text
Jika potongan_persen = 100, maka total_tagihan menjadi 0.
Jika potongan_persen = 100, maka status_pembayaran menjadi LUNAS.
Jika potongan_persen = 100, maka status_mhs menjadi AKTIF.
Jika beasiswa sebagian, total_tagihan dikurangi sesuai persentase beasiswa.
```

Contoh response:

```json
{
  "success": true,
  "message": "Data beasiswa berhasil ditambahkan",
  "data": {
    "id_beasiswa_mhs": 4,
    "nim": "C030324094",
    "keterangan": null,
    "beasiswa": {
      "id_beasiswa": 2,
      "nama_beasiswa": "Beasiswa KIP KULIAH",
      "potongan_persen": 100
    }
  },
  "ringkasan": {
    "updated": true,
    "mahasiswa_ukt": {
      "id_mhs_ukt": 9,
      "nim": "C030324094",
      "semester": 4,
      "tahun_akademik": "20252"
    },
    "beasiswa": {
      "id_beasiswa": 2,
      "nama_beasiswa": "Beasiswa KIP KULIAH",
      "potongan_persen": 100,
      "potongan_nominal": 5700000
    },
    "tagihan": {
      "nominal_ukt": 5700000,
      "total_tagihan": 0,
      "total_bayar": 200000,
      "sisa_tagihan": 0
    },
    "status": {
      "status_pembayaran": "LUNAS",
      "status_mhs": "AKTIF",
      "keterangan_status": "Mahasiswa aktif karena mendapat beasiswa penuh"
    }
  }
}
```

Keterangan field penting:

| Field | Keterangan |
|---|---|
| `data` | Data penerima beasiswa yang baru ditambahkan |
| `ringkasan.updated` | Menunjukkan data tagihan mahasiswa berhasil diperbarui |
| `ringkasan.beasiswa.potongan_persen` | Persentase potongan beasiswa |
| `ringkasan.beasiswa.potongan_nominal` | Nominal potongan UKT |
| `ringkasan.tagihan.nominal_ukt` | Nominal UKT asli |
| `ringkasan.tagihan.total_tagihan` | Total tagihan setelah beasiswa |
| `ringkasan.tagihan.sisa_tagihan` | Sisa tagihan setelah beasiswa |
| `ringkasan.status.status_pembayaran` | Status pembayaran setelah beasiswa |
| `ringkasan.status.status_mhs` | Status mahasiswa setelah beasiswa |

---

## #35. PUT `/api/beasiswa/{id}`

Mengubah data penerima beasiswa.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "nim": "C030324094",
  "id_beasiswa": 2,
  "keterangan": "Update beasiswa"
}
```

---

## #36. DELETE `/api/beasiswa/{id}`

Menghapus data penerima beasiswa.

**Hak Akses:** Admin Keuangan

---

# 6. Status Mahasiswa

Status mahasiswa digunakan untuk menandai apakah mahasiswa aktif atau nonaktif berdasarkan kondisi pembayaran atau beasiswa.

## #37. GET `/api/status-mhs`

Menampilkan seluruh status mahasiswa.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh response:

```json
{
  "success": true,
  "message": "Data status mahasiswa berhasil diambil",
  "data": [
    {
      "id_status": 1,
      "mahasiswa_ukt": {
        "id_mhs_ukt": 9,
        "nim": "C030324094",
        "semester": 4,
        "tahun_akademik": "20252"
      },
      "status": {
        "status_mhs": "AKTIF",
        "keterangan": "Mahasiswa aktif karena mendapat beasiswa penuh"
      }
    }
  ]
}
```

---

## #38. GET `/api/status-mhs/{id}`

Menampilkan detail status mahasiswa berdasarkan ID.

**Hak Akses:** Admin Keuangan, Super Admin

---

## #39. GET `/api/status-mhs/mhs-ukt/{id_mhs_ukt}`

Menampilkan status mahasiswa berdasarkan `id_mhs_ukt`.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/status-mhs/mhs-ukt/9
```

---

## #40. GET `/api/status-mhs/nim/{nim}`

Menampilkan status mahasiswa berdasarkan NIM.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/status-mhs/nim/C030324094
```

---

## #41. POST `/api/status-mhs`

Menambahkan atau mengubah status mahasiswa secara manual.

**Hak Akses:** Admin Keuangan

JSON Body:

```json
{
  "id_mhs_ukt": 9,
  "status": "AKTIF",
  "keterangan": "Mahasiswa aktif karena sudah melakukan pembayaran UKT"
}
```

Catatan:

```text
Status mahasiswa sudah otomatis berubah dari proses pembayaran dan beasiswa.
Endpoint ini digunakan jika admin ingin melakukan override manual.
```

---

## #42. PUT `/api/status-mhs/{id}`

Mengubah status mahasiswa.

**Hak Akses:** Admin Keuangan

JSON Body:

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

## #44. GET `/api/dashboard`

Menampilkan data dashboard keuangan.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh response:

```json
{
  "success": true,
  "message": "Data dashboard berhasil diambil",
  "data": {
    "mahasiswa": {
      "total_mahasiswa": 4,
      "total_aktif": 3,
      "total_nonaktif": 1
    },
    "pembayaran": {
      "total_lunas": 2,
      "total_cicilan": 1,
      "total_belum_lunas": 1
    },
    "beasiswa": {
      "total_penerima_beasiswa": 1
    },
    "keuangan": {
      "total_tagihan": 10700000,
      "total_pemasukan": 1500000,
      "total_tunggakan": 9200000
    }
  }
}
```

---

# 8. Laporan Keuangan

Laporan keuangan digunakan untuk melihat total pemasukan, total tunggakan, total potongan beasiswa, dan daftar mahasiswa menunggak.

## #45. GET `/api/laporan-keuangan`

Menampilkan laporan keuangan seluruh data.

**Hak Akses:** Admin Keuangan, Super Admin


Contoh response:

```json
{
  "success": true,
  "message": "Laporan keuangan berhasil diambil",
  "filter": {
    "semester": 4,
    "tahun_akademik": "20252"
  },
  "data": {
    "ringkasan_keuangan": {
      "total_tagihan": 10700000,
      "total_pemasukan": 1500000,
      "total_tunggakan": 9200000,
      "total_potongan_beasiswa": 4900000
    },
    "ringkasan_pembayaran": {
      "total_lunas": 2,
      "total_cicilan": 1,
      "total_belum_lunas": 1
    },
    "ringkasan_status_mahasiswa": {
      "total_aktif": 3,
      "total_nonaktif": 1
    },
    "mahasiswa_menunggak": []
  }
}
```

---

## #46. GET `/api/laporan-keuangan/semester/{semester}`

Menampilkan laporan keuangan berdasarkan semester.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/laporan-keuangan/semester/4
```

---

## #47. GET `/api/laporan-keuangan/tahun/{tahun_akademik}`

Menampilkan laporan keuangan berdasarkan tahun akademik.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/laporan-keuangan/tahun/20252
```

---

## #48. GET `/api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}`

Menampilkan laporan keuangan berdasarkan semester dan tahun akademik.

**Hak Akses:** Admin Keuangan, Super Admin

Contoh:

```http
GET /api/laporan-keuangan/semester/4/tahun/20252
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
| 41 | POST | `/api/status-mhs` | Tambah/update status mahasiswa |
| 42 | PUT | `/api/status-mhs/{id}` | Update status mahasiswa |
| 43 | DELETE | `/api/status-mhs/{id}` | Hapus status mahasiswa |
| 44 | GET | `/api/dashboard` | Dashboard keuangan |
| 45 | GET | `/api/laporan-keuangan` | Laporan keuangan |
| 46 | GET | `/api/laporan-keuangan/semester/{semester}` | Laporan by semester |
| 47 | GET | `/api/laporan-keuangan/tahun/{tahun_akademik}` | Laporan by tahun |
| 48 | GET | `/api/laporan-keuangan/semester/{semester}/tahun/{tahun_akademik}` | Laporan by semester dan tahun |

---

# Catatan Integrasi Frontend

Untuk form tambah tagihan, beasiswa, atau pembayaran, frontend disarankan mengambil data dari beberapa endpoint berikut:

1. Ambil data mahasiswa dari API Kelompok 3.
2. Ambil data prodi dan jurusan dari API Kelompok 1.
3. Ambil kategori UKT dari API keuangan:

```http
GET /api/kategori-ukt/prodi/{id_prodi}
```

4. Ambil data UKT mahasiswa:

```http
GET /api/mhs-ukt/nim/{nim}
```

5. Ambil master beasiswa:

```http
GET /api/beasiswa-master
```

6. Simpan penerima beasiswa:

```http
POST /api/beasiswa
```

7. Simpan pembayaran:

```http
POST /api/pembayaran
```

---

# Kredensial Test

Auth login dikelola oleh Kelompok 1. Modul keuangan menggunakan token dari service auth utama.

| Role | Keterangan |
|---|---|
| Admin Keuangan | Mengakses seluruh endpoint keuangan |
| Super Admin | Dapat diberikan akses jika dibutuhkan |

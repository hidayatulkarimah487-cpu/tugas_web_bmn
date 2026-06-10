<?php

namespace Database\Seeders;

use App\Models\AsetBmn;
use Illuminate\Database\Seeder;

class AsetBmnSeeder extends Seeder
{
    public function run(): void
    {
        $dataAset = [
            [
                'kode_aset' => 'BMN-001',
                'nama_barang' => 'Meja Kerja',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Ruang Administrasi',
                'tahun_perolehan' => 2022,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-002',
                'nama_barang' => 'Kursi Kantor',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Ruang Administrasi',
                'tahun_perolehan' => 2022,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-003',
                'nama_barang' => 'Lemari Arsip',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Gudang Arsip',
                'tahun_perolehan' => 2020,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-004',
                'nama_barang' => 'Rak Dokumen',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Ruang Tata Usaha',
                'tahun_perolehan' => 2021,
                'kondisi' => 'Rusak Ringan',
            ],
            [
                'kode_aset' => 'BMN-005',
                'nama_barang' => 'Laptop Inventaris',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Ruang Dosen',
                'tahun_perolehan' => 2023,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-006',
                'nama_barang' => 'Komputer Desktop',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Lab Komputer',
                'tahun_perolehan' => 2021,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-007',
                'nama_barang' => 'Printer',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Ruang Tata Usaha',
                'tahun_perolehan' => 2020,
                'kondisi' => 'Rusak Ringan',
            ],
            [
                'kode_aset' => 'BMN-008',
                'nama_barang' => 'Scanner Dokumen',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Ruang Administrasi',
                'tahun_perolehan' => 2022,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-009',
                'nama_barang' => 'Proyektor',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Ruang Rapat',
                'tahun_perolehan' => 2019,
                'kondisi' => 'Rusak Ringan',
            ],
            [
                'kode_aset' => 'BMN-010',
                'nama_barang' => 'Televisi LED',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Aula',
                'tahun_perolehan' => 2021,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-011',
                'nama_barang' => 'AC Split',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Ruang Kepala',
                'tahun_perolehan' => 2020,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-012',
                'nama_barang' => 'Kipas Angin',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Ruang Tunggu',
                'tahun_perolehan' => 2018,
                'kondisi' => 'Rusak Berat',
            ],
            [
                'kode_aset' => 'BMN-013',
                'nama_barang' => 'Sound System',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Aula',
                'tahun_perolehan' => 2022,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-014',
                'nama_barang' => 'Whiteboard',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Ruang Kelas 1',
                'tahun_perolehan' => 2021,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-015',
                'nama_barang' => 'Meja Rapat',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Ruang Rapat',
                'tahun_perolehan' => 2019,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-016',
                'nama_barang' => 'Kursi Rapat',
                'kategori_barang' => 'Mebel',
                'lokasi_ruangan' => 'Ruang Rapat',
                'tahun_perolehan' => 2019,
                'kondisi' => 'Rusak Ringan',
            ],
            [
                'kode_aset' => 'BMN-017',
                'nama_barang' => 'Sepeda Motor Operasional',
                'kategori_barang' => 'Kendaraan',
                'lokasi_ruangan' => 'Area Parkir Kantor',
                'tahun_perolehan' => 2018,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-018',
                'nama_barang' => 'Mobil Operasional',
                'kategori_barang' => 'Kendaraan',
                'lokasi_ruangan' => 'Area Parkir Kantor',
                'tahun_perolehan' => 2017,
                'kondisi' => 'Rusak Ringan',
            ],
            [
                'kode_aset' => 'BMN-019',
                'nama_barang' => 'Dispenser',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Pantry',
                'tahun_perolehan' => 2022,
                'kondisi' => 'Baik',
            ],
            [
                'kode_aset' => 'BMN-020',
                'nama_barang' => 'CCTV',
                'kategori_barang' => 'Elektronik',
                'lokasi_ruangan' => 'Koridor Utama',
                'tahun_perolehan' => 2023,
                'kondisi' => 'Baik',
            ],
        ];

        foreach ($dataAset as $aset) {
            AsetBmn::updateOrCreate(
                ['kode_aset' => $aset['kode_aset']],
                $aset
            );
        }
    }
}
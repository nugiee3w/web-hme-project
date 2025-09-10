<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan')->insert([
            [
                'nama_kegiatan' => 'Pelantikan Himpunan Mahasiswa Elektro Periode 2024/2025',
                'deskripsi' => '<p>Pelantikan pengurus Himpunan Mahasiswa Elektro periode 2024/2025 yang dilaksanakan dengan penuh khidmat. Acara ini menandai dimulainya kepengurusan baru dengan visi dan misi yang telah ditetapkan untuk memajukan himpunan dan mahasiswa elektro.</p>',
                'kategori' => 'Tahunan',
                'tanggal_kegiatan' => '2024-08-15',
                'status' => 'Published',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kegiatan' => 'Buka Bersama & Bagi Takjil Ramadhan 2024',
                'deskripsi' => '<p>Kegiatan berbagi takjil dan buka puasa bersama sebagai bentuk kepedulian sosial HME kepada masyarakat sekitar kampus. Kegiatan ini dilaksanakan setiap hari Jumat selama bulan Ramadhan dengan melibatkan seluruh anggota himpunan.</p>',
                'kategori' => 'Tahunan',
                'tanggal_kegiatan' => '2024-03-22',
                'status' => 'Published',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kegiatan' => 'Workshop Curriculum Vitae 2024',
                'deskripsi' => '<p>Workshop pelatihan pembuatan Curriculum Vitae yang menarik dan profesional untuk mahasiswa elektro. Kegiatan ini bertujuan mempersiapkan mahasiswa dalam memasuki dunia kerja dengan CV yang berkualitas.</p>',
                'kategori' => 'Divisi',
                'tanggal_kegiatan' => '2024-09-10',
                'status' => 'Published',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kegiatan' => 'Seminar Teknologi AI dan IoT',
                'deskripsi' => '<p>Seminar nasional tentang perkembangan teknologi Artificial Intelligence dan Internet of Things dalam bidang teknik elektro. Menghadirkan narasumber dari industri dan akademisi terkemuka.</p>',
                'kategori' => 'Tahunan',
                'tanggal_kegiatan' => '2024-11-20',
                'status' => 'Published',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kegiatan' => 'Pelatihan Arduino untuk Pemula',
                'deskripsi' => '<p>Pelatihan dasar penggunaan Arduino untuk mahasiswa baru jurusan elektro. Kegiatan ini meliputi teori dasar elektronika, pemrograman Arduino, dan praktek langsung membuat project sederhana.</p>',
                'kategori' => 'Divisi',
                'tanggal_kegiatan' => '2024-10-05',
                'status' => 'Published',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kegiatan' => 'Bakti Sosial di Panti Asuhan',
                'deskripsi' => '<p>Kegiatan bakti sosial HME dengan mengunjungi panti asuhan, memberikan bantuan berupa sembako, alat tulis, dan mengadakan kegiatan bersama anak-anak panti asuhan.</p>',
                'kategori' => 'Lainnya',
                'tanggal_kegiatan' => '2024-12-15',
                'status' => 'Published',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

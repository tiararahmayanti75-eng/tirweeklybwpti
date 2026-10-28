<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sekolah;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::create([
            'nama_sekolah' => 'SMA Negeri 1 Semarang',
            'jenjang' => 'SMA',
            'akreditasi' => 'A',
            'lokasi' => 'Jl. Pemuda No. 149, Semarang',
            'deskripsi' => 'Salah satu sekolah unggulan dengan fasilitas lengkap dan prestasi akademik yang gemilang.'
        ]);

        Sekolah::create([
            'nama_sekolah' => 'SMK Negeri 7 Semarang (STM Pembangunan)',
            'jenjang' => 'SMK',
            'akreditasi' => 'A',
            'lokasi' => 'Jl. Simpang Lima, Mugassari, Semarang',
            'deskripsi' => 'Pusat keunggulan pendidikan kejuruan teknologi dan rekayasa terbaik di Jawa Tengah.'
        ]);

        Sekolah::create([
            'nama_sekolah' => 'SMA Kristen YSKI Semarang',
            'jenjang' => 'SMA',
            'akreditasi' => 'A',
            'lokasi' => 'Jl. Dr. Cipto No. 109, Semarang',
            'deskripsi' => 'Sekolah swasta dengan komitmen tinggi pada pengembangan karakter dan teknologi siswa.'
        ]);
    }
}
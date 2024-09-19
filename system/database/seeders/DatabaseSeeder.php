<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Admin::factory()->create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'level' => 1,
 
        ]);

        \App\Models\ProfilToko::factory()->create([
            'nama_toko' => 'rm. victoria',
            'alamat_toko' => 'Jl. DI. Panjaitan, No 308, Delta Pawan',
            'email_toko' => 'victoria@gmail.com',
            'notlp_toko' => '081234567890',
 
        ]);

         \App\Models\Kategori::factory()->create([
            'kategori_nama' => 'Makanan',
            'kategori_foto' => 'app/kategori/ayam.png',
        ]);


        \App\Models\Kategori::factory()->create([
            'kategori_nama' => 'Minuman',
            'kategori_foto' => 'app/kategori/jus.jpeg',
        ]);

        \App\Models\Pembayaran::factory()->create([
            'pembayaran_nama' => 'Cash/COD',
            'pembayaran_nomor' => '-',
            'pembayaran_an' => '-',
            'pembayaran_foto' => '-',
            'pembayaran_status' => '1',
        ]);

        \App\Models\Pembayaran::factory()->create([
            'pembayaran_nama' => 'Dana',
            'pembayaran_nomor' => '081234567890',
            'pembayaran_an' => 'RM Victoria',
            'pembayaran_foto' => '-',
            'pembayaran_status' => '1',
        ]);

     
    }
}

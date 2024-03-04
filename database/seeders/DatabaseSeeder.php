<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('sandi'),
            'is_admin' => true,
        ]);




        \App\Models\User::factory()->create([
            'name' => 'Muhammad azfa',
            'email' => 'azfasa15@gmail.com',
            'password' => Hash::make('sandi'),
            'is_admin' => false,
        ]);
        $products = [
            ['WD Green SSD 240GB Sata 3 - WDC Green 240 GB 2.5"', 'solid state drive (SSD) dengan kapasitas 240 GB, antarmuka SATA III, dan kecepatan baca 545 MB/s. SSD ini memiliki dimensi 80 x 22,0 x 1,5 mm  garansi resmi dari distributor lokal selama 3 tahun', 450000, 'SSD_1.jpg'],
            ['Samsung SSD 980 250GB M.2 PCIe NVMe 1.4 Gen3 M2 Internal SSD - SSD Only, 250GB', 'Form Factor : Single-Sided M.2 2280', 756980, 'SSD_2.png'],
            ['SANDISK USB Flashdisk Flashdrive 128GB Ultra Flair CZ73 - CZ73-128GB', 'Desain Stylish, Cepatnya Sadis (Hingga 15X Lebih Cepat dari USB 2.0)
            Flashdisk USB 3.0 SanDisk Ultra Flair™ CZ73 bisa mentransfer data berukuran besar hingga 15x lebih cepat dibanding Flashdisk USB 2.0. Kecepatan transfer datanya bisa menembus 150 Mbps sangat berbeda jauh dengan USB 2.0 yang rata-rata memiliki kecepatan transfer data berkisar 4 Mbps. Tak hanya cepat, Flashdisk ini juga bisa digunakan bersama aplikasi proteksi eksklusif dari SanDisk untuk melindungi data di dalamnya. Flashdisk bagus Sandisk Ultra ini tergolong terjangkau dan cocok untuk kantong dikalangan anak muda.', 197900, 'FD_1.png'],
            ['SANDISK USB Flashdisk Flashdrive 32GB Cruzer Blade CZ50', 'Bawa dan simpan setiap file favorit Anda menggunakan USB Flash Disk keluaran SanDisk ini, SanDisk Cruzer Blade. Dengan bentuk yang kecil namun cepat untuk men-transfer konten digital dari komputer ke komputer lainnya. SanDisk Cruzer Blade memiliki fitur SanDisk SecureAccess yang melindungi file didalam USB flash disk dari akses ilegal serta nikmati fitur backup online yang aman dari YuuWaa untuk mengakses file secara online dimana saja. Garansi Resmi Sandisk 5 Tahun', 67900, 'FD_2.png'],
            ['WD Caviar Purple 2TB - HD Hardisk Internal 3.5" for CCTV Surveillance', 'Garansi Resmi By WD Indonesia 3 Tahun', 1105000, 'HDD_1.jpg'],
            ['PC COOLER R400 ARGB BLACK', 'TDP 180W, Hydro Dynamics, NO Backlight', 20800, 'FAN_1.jpg'],

        ];
        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product[0],
                'description' => $product[1],
                'price' => $product[2],
                'image' => 'product/'.$product[3],
                'stock' => fake()->numberBetween(1, 1000),
            ]);
        }
        \App\Models\Product::factory(25)->create();

    }
}

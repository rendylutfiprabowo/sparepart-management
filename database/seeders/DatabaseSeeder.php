<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sparepart;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        stockSparepart::create([
            'id_stock'    => 'STK-01',
            'id_sparepart'    => 'CR-001',
            'id_store'    => 'STR-01',
            'qty_stock'    => 100,

        ]);
        stockSparepart::create([
            'id_stock'    => 'STK-02',
            'id_sparepart'    => 'CR-002',
            'id_store'    => 'STR-01',
            'qty_stock'    => 20,
        ]);
        stockSparepart::create([
            'id_stock'    => 'STK-03',
            'id_sparepart'    => 'CR-003',
            'id_store'    => 'STR-01',
            'qty_stock'    => 10,
        ]);
        stockSparepart::create([
            'id_stock'    => 'STK-04',
            'id_sparepart'    => 'CR-001',
            'id_store'    => 'STR-02',
            'qty_stock'    => 100,
        ]);
        stockSparepart::create([
            'id_stock'    => 'STK-05',
            'id_sparepart'    => 'CR-002',
            'id_store'    => 'STR-02',
            'qty_stock'    => 300,
        ]);
        stockSparepart::create([
            'id_stock'    => 'STK-06',
            'id_sparepart'    => 'CR-004',
            'id_store'    => 'STR-02',
            'qty_stock'    => 300,
        ]);
        sparepart::create([
            'codematerial_sparepart'    => 'CR-001',
            'nama_sparepart'    => 'Bushing',
            'spesifikasi_sparepart'    => '250 A',
            'satuan'    => 'pcs'
        ]);
        sparepart::create([
            'codematerial_sparepart'    => 'CR-002',
            'nama_sparepart'    => 'Proteksi ISD',
            'spesifikasi_sparepart'    => ' 30 V',
            'satuan'    => 'pcs'
        ]);
        sparepart::create([
            'codematerial_sparepart'    => 'CR-003',
            'nama_sparepart'    => 'Oil',
            'spesifikasi_sparepart'    => '100 V',
            'satuan'    => 'l'
        ]);
        sparepart::create([
            'codematerial_sparepart'    => 'CR-004',
            'nama_sparepart'    => 'Seal Bushing',
            'spesifikasi_sparepart'    => ' 30 V',
            'satuan'    => 'pcs'
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-01',
            'nama_store' => 'Surabaya',
            'alamat_store' => 'Jl. Surabaya 2',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-02',
            'nama_store' => 'Tangerang',
            'alamat_store' => 'Jl. Serayu 1',
        ]);

        User::create([
            'id_user' => 'USR-01',
            'username' => 'Calvin',
            'email' => 'calvin@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '1'
        ]);
    }
}

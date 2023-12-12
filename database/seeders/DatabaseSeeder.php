<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\booked;
use App\Models\role;
use App\Models\technician;
use App\Models\tools;
use Illuminate\Database\Seeder;
use App\Models\customer;
use App\Models\project;
use App\Models\storeSparepart;
use App\Models\User;
use App\Models\sales;
use App\Models\sample;
use App\Models\trafo;
use App\Models\form;
use App\Models\formReport;
use App\Models\order;
use App\Models\revisi;
use App\Models\scope;
use App\Models\warehouse;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        storeSparepart::create([
            'id_store'    => 'STR-01',
            'nama_store' => 'Surabaya',
            'alamat_store' => 'Jl. Surabaya 2',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-02',
            'nama_store' => 'Plaju',
            'alamat_store' => 'Jl. Serayu 1',
        ]);
        storeSparepart::create([
            'id_store'    => 'CTR',
            'nama_store' => 'Pusat',
            'alamat_store' => 'Jl. Gembor Raya',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-03',
            'nama_store' => 'Balongan',
            'alamat_store' => 'Jl. Balongan',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-04',
            'nama_store' => 'Cilacap',
            'alamat_store' => 'Jl. Cilacap',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-05',
            'nama_store' => 'Balikpapan',
            'alamat_store' => 'Jl. Balikpapan',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-06',
            'nama_store' => 'Dumai',
            'alamat_store' => 'Jl. Dumai',
        ]);
        storeSparepart::create([
            'id_store'    => 'STR-07',
            'nama_store' => 'Papua',
            'alamat_store' => 'Jl. Papua',
        ]);

        User::create([
            'id_user' => 'USR-01',
            'username' => 'Calvin',
            'email' => 'calvin@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '1'
        ]);
        User::create([
            'id_user' => 'USR-02',
            'username' => 'Maryam',
            'email' => 'maryamn@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '1'
        ]);
        User::create([
            'id_user' => 'USR-05',
            'username' => 'maulana',
            'email' => 'maul@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '2'
        ]);
        User::create([
            'id_user' => 'USR-08',
            'username' => 'rendy',
            'email' => 'rendy@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '2'
        ]);
        User::create([
            'id_user' => 'USR-03',
            'username' => 'rapli',
            'email' => 'rapli@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '3'
        ]);
        User::create([
            'id_user' => 'USR-04',
            'username' => 'lang',
            'email' => 'lang@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '4'
        ]);
        User::create([
            'id_user' => 'USR-06',
            'username' => 'rosyid',
            'email' => 'rosyid@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '5'
        ]);
        User::create([
            'id_user' => 'USR-07',
            'username' => 'reza',
            'email' => 'reza@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '6'
        ]);
        User::create([
            'id_user' => 'USR-55',
            'username' => 'sukaikan',
            'email' => 'sukaikan@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '7'
        ]);
        User::create([
            'id_user' => 'USR-20',
            'username' => 'rawon',
            'email' => 'rawon@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '1'
        ]);
        warehouse::create([
            'id_warehouse' => 'WAR-001',
            'nama_warehouse' => 'Calvin',
            'phone_warehouse' => '081218854',
            'id_user' => 'USR-01',
            'id_store' => 'STR-01',
        ]);
        warehouse::create([
            'id_warehouse' => 'WAR-002',
            'nama_warehouse' => 'Maryam',
            'phone_warehouse' => '00444558',
            'id_user' => 'USR-02',
            'id_store' => 'CTR',
        ]);
        warehouse::create([
            'id_warehouse' => 'WAR-003',
            'nama_warehouse' => 'Rawon',
            'phone_warehouse' => '081218882',
            'id_user' => 'USR-20',
        ]);


        customer::create([
            'id_customer' => '60007596',
            'nama_customer' => 'PT Pertamina Indonesia',
            'phone_customer' => '0856027541982',
            'email_customer' => 'akucintazee@gmail.com',
            'jenisusaha_customer' => 'sanggar tari',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007510',
            'nama_customer' => 'PT PLN Persero',
            'phone_customer' => '085602754434',
            'email_customer' => 'akucintashani@gmail.com',
            'jenisusaha_customer' => 'RM padang',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007522',
            'nama_customer' => 'PT Cinta Sejati',
            'phone_customer' => '085602754112',
            'email_customer' => 'akucintaacel@gmail.com',
            'jenisusaha_customer' => 'toko kue',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007593',
            'nama_customer' => 'SCI Lampung',
            'phone_customer' => '08560275222',
            'email_customer' => 'akucintamatcha@gmail.com',
            'jenisusaha_customer' => 'cosplayer',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007591',
            'nama_customer' => 'PT BUMITAMA',
            'phone_customer' => '0856027541922',
            'email_customer' => 'akucintafreya@gmail.com',
            'jenisusaha_customer' => 'pembuat komik',
            'id_user' => NULL,
        ]);


        $faker = Faker::create();
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007596',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007596',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007596',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007596',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007593',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007593',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007593',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007593',

        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007593',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007522',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007522',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007522',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007522',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007522',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007522',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007510',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007510',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007510',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007591',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007591',
        ]);
        project::create([
            'id_project' => $faker->numberBetween(100, 999),
            'nama_project' => $faker->name,
            'namapic_project' => $faker->name,
            'nopic_project' => '081234567890',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '60007591',
        ]);

        role::create([
            'nama_role' => 'Warehouse',
        ]);
        role::create([
            'nama_role' => 'CRM',
        ]);
        role::create([
            'nama_role' => 'Laboil',
        ]);
        role::create([
            'nama_role' => 'Technician',
        ]);
        role::create([
            'nama_role' => 'Modlab',
        ]);
        role::create([
            'nama_role' => 'Adminlab',
        ]);
        role::create([
            'nama_role' => 'Superadmin',
        ]);

        form::create([
            'id_form' => '22',
            'field_form' => json_encode([
                'Hidrogen (H2)' => 0,
                'Etana (C2H6)' => 0,
                'Etilena (C2H4)' => 0,
                'Asetilena (C2H2)' => 0,
                'Karbon Dioksida (CO2)' => 0,
                'Metana (CH4)' => 0,
                'Karbon Monoksida (CO)' => 0,
                'CO2/CO ratio' => 0,
                'Analisa' => 0,
                'Kesimpulan' => 0,
                'Rekomendasi' => 0
            ]),
            'id_scope' => '220',
        ]);
        //furan
        form::create([
            'id_form' => '23',
            'field_form' => json_encode([
                '5hmf' => 0,
                '2fol' => 0,
                '2fal' => 0,
                '2acf' => 0,
                '5mef' => 0,
                'Total 2 FAL'=> 0,
                'Total Furan'=> 0,
                'Estimate DP'=> 0,
                'Kategori Hasil Furan' => 0,
                'Remaining Life Time' => 0,
                'Rekomendasi Furan' => 0
            ]),
            'id_scope' => '842',
        ]);
        //oa
        form::create([
            'id_form' => '24',
            'field_form' => json_encode([
                'Color / Appreance' => 0,
                'Breakdown Voltage (Dieclectric Strength)' => 0,
                'Interfacial Tension' => 0,
                'Total Acid Number (TAN)' => 0,
                'Water Content' => 0,
                'Oil Quality Index (OQIN)' => 0,
                'Sendiment & Sludge' => 0,
                'Density' => 0,
                'PCB' => 0,
                'Corrosive Sulfur' => 0,
                'Flash Point' => 0,
                'Kategori Hasil OA' => 0,
                'Rekomendasi OA' => 0
            ]),
            'id_scope' => '399',
        ]);


        scope::create([
            'id_scope' => '220',
            'detailed' => false,
            'nama_scope' => 'DGA',
        ]);

        scope::create([
            'id_scope' => '842',
            'detailed' => false,
            'nama_scope' => 'Furan',
        ]);

        scope::create([
            'id_scope' => '399',
            'detailed' => true,
            'nama_scope' => 'OA',
        ]);
        technician::create([
            'id_technician' => 'TECH-01',
            'nama_technician' => 'Erlangga',
            'phone_technician' => '08122546',
            'nip_technician' => '000022215554',
            'id_user' => 'USR-04',
        ]);
        tools::create([
            'id_tools' => 'TOOLS-01',
            'id_store' => 'STR-01',
            'nama_tools' => 'Helm Pengaman',
            'qty_tools' => '100',
        ]);
        tools::create([
            'id_tools' => 'TOOLS-02',
            'id_store' => 'STR-01',
            'nama_tools' => 'Kacamata Pengaman',
            'qty_tools' => '100',
        ]);
        tools::create([
            'id_tools' => 'TOOLS-03',
            'id_store' => 'STR-01',
            'nama_tools' => 'Masker',
            'qty_tools' => '100',
        ]);
        tools::create([
            'id_tools' => 'TOOLS-04',
            'id_store' => 'STR-01',
            'nama_tools' => 'Pelindung Wajah',
            'qty_tools' => '100',
        ]);
        tools::create([
            'id_tools' => 'TOOLS-05',
            'id_store' => 'STR-01',
            'nama_tools' => 'Sarung Tangan',
            'qty_tools' => '100',
        ]);
        tools::create([
            'id_tools' => 'TOOLS-06',
            'id_store' => 'STR-01',
            'nama_tools' => 'Sepatu Pengaman',
            'qty_tools' => '100',
        ]);
        sales::create([
            'id_sales' => $faker->numberBetween(100, 999),
            'nama_sales' => 'maulana',
            'phone_sales' => '098768986',
            'nip_sales' => '1123',
            'id_user' => 'USR-05',
        ]);
        sales::create([
            'id_sales' => $faker->numberBetween(100, 999),
            'nama_sales' => 'rendy',
            'phone_sales' => '09874455',
            'nip_sales' => '1020',
            'id_user' => 'USR-08',
        ]);
        trafo::create([
            'id_trafo' => $faker->numberBetween(100, 999),
            'serial_number' => '090',
            'kva' => '388',
            'merk' => 'power',
            'pabrikan' => 'trafindo',
            'year' => '2012',
            'voltage' => '1234',
            'vg' => '5543',
            'tag_number' => '11',
            'temperatur_oil' => '556',
            'volume_oil' => '60',
            'Warna_oil' => 'merah',
            'kapasitas_minyak' => '2000 L',
            'catatan' => 'aman',
            'umur_trafo'=> '23 tahun',
            'id_customer' => '23',
        ]);
        trafo::create([
            'id_trafo' => $faker->numberBetween(100, 999),
            'serial_number' => '090',
            'kva' => '388',
            'merk' => 'power',
            'pabrikan' => 'trafindo',
            'year' => '2012',
            'voltage' => '1234',
            'vg' => '5543',
            'tag_number' => '11',
            'temperatur_oil' => '556',
            'volume_oil' => '60',
            'Warna_oil' => 'merah',
            'kapasitas_minyak' => '2000 L',
            'catatan' => 'aman',
            'umur_trafo'=> '25 tahun',
            'id_customer' => '23',
        ]);

        sample::create([
            'id_sample' => $faker->unique()->numberBetween(100, 999),
            'jumlah_sample' => '5',
            'status_sample' => 'Pending',
            'tanggal_sampling' => '2023-11-07',
            'tanggal_kedatangan' => '2023-11-08',
            'tanggal_pengujian' => '2023-11-10',
            'tanggal_cetaklaporan' => '2023-11-21', // Perbaikan format tanggal
            'id_scope' => '2893782',
            'id_history' => '8833948',
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\role;
use Illuminate\Database\Seeder;
use App\Models\sparepart;
use App\Models\customer;
use App\Models\project;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use App\Models\User;
use App\Models\sales;
use App\Models\sample;
use App\Models\form;
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
        User::create([
            'id_user' => 'USR-02',
            'username' => 'Maryam',
            'email' => 'maryamn@mail.com',
            'password' => bcrypt('123456789'),
            'id_role' => '1'
        ]);
        User::create([
            'id_user' => 'USR-02',
            'username' => 'maulana',
            'email' => 'maul@mail.com',
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
            'id_user' => '1',
        ]);


        customer::create([
            'id_customer' => '60007596',
            'nama_customer' => 'azizi shafa asadel',
            'phone_customer' => '0856027541982',
            'email_customer' => 'akucintazee@gmail.com',
            'jenisusaha_customer' => 'sanggar tari',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007510',
            'nama_customer' => 'shani indira natio',
            'phone_customer' => '085602754434',
            'email_customer' => 'akucintashani@gmail.com',
            'jenisusaha_customer' => 'RM padang',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007522',
            'nama_customer' => 'adzana shaliha',
            'phone_customer' => '085602754112',
            'email_customer' => 'akucintaacel@gmail.com',
            'jenisusaha_customer' => 'toko kue',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007593',
            'nama_customer' => 'marsha lenathea lapian',
            'phone_customer' => '08560275222',
            'email_customer' => 'akucintamatcha@gmail.com',
            'jenisusaha_customer' => 'cosplayer',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60007591',
            'nama_customer' => 'freyanashifa jayawardhana',
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

        form::create([
            'id_form' => '1',
            'field_form' => json_encode([
                'Hidrogen (H2)' => 0,
                'Etana (C2H6)' => 0,
                'Etilena (C2H4)' => 0,
                'Asetilena (C2H2)' => 0,
                'Karbon Dioksida (CO2)' => 0,
                'Metana (CH4)' => 0,
                'Karbon Monoksida (CO)' => 0,
                'CO2/CO ratio' => 0
            ]),
            'id_scope' => '220',
        ]);

        form::create([
            'id_form' => '2',
            'field_form' => json_encode([
                '5MHF' => 0,
                '2FOL' => 0,
                '2FAL' => 0,
                '2ACF' => 0,
                '5MEF' => 0,
                'Total 2FAL' => 0,
                'Total Furan' => 0,
                'Estimate DP' => 0
            ]),
            'id_scope' => '842',
        ]);

        form::create([
            'id_form' => '3',
            'field_form' => json_encode([
                'Color / Appearance' => 0,
                'Breakdown Voltage (Dieclectric Strength)' => 0,
                'Interfacial Tension' => 0,
                'Total Acid Number (TAN)' => 0,
                'Water Content' => 0,
                'Oil Quality Index (OQIN)' => 0,
                'Sediment & Sludge' => 0,
                'Density' => 0,
                'PCB' => 0,
                'Corrosive Sulfur' => 0,
                'Flash Point' => 0,
            ]),
            'id_scope' => '399',
        ]);


        scope::create([
            'id_scope' => '220',
            'nama_scope' => 'DGA',
        ]);

        scope::create([
            'id_scope' => '842',
            'nama_scope' => 'Furan',
        ]);

        scope::create([
            'id_scope' => '399',
            'nama_scope' => 'OA',
        ]);
    }
}

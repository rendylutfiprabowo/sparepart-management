<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customer;
use App\Models\role;

class customerseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}

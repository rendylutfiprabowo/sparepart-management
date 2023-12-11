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
            'nama_customer' => 'PT Maju Jaya Bersama',
            'phone_customer' => '0856027555XXX',
            'email_customer' => 'maju@gmail.com',
            'jenisusaha_customer' => 'Retail',
            'id_user' => NULL,
        ]);
        customer::create([
            'id_customer' => '60542254',
            'nama_customer' => 'PT Semesta Inti Sari',
            'phone_customer' => '0856025555XXX',
            'email_customer' => 'semestainti@gmail.com',
            'jenisusaha_customer' => 'Food & Baverage',
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

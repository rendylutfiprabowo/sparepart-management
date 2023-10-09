<?php

namespace Database\Seeders;

use App\Models\project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class projectseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        project::create([
            'id' => '1',
            'id_project' => '123',
            'nama_project' => 'trafo',
            'namapic_project' => 'dwi',
            'nopic_project' => '22',
            'email_project' => 'trafo@gmail.com',
            'alamat_project' => 'bandung',
            'id_customer' => '122',
        ]);
    }
}

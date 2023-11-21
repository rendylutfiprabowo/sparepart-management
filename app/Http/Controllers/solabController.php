<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\sales;
use App\Models\sample;
use App\Models\solab;
use App\Models\project;
use App\Models\formReport;
use App\Models\form;
use App\Models\history;
use App\Models\trafo;
use Faker\Factory as Faker;

class solabController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "no_so_solab" => "required",
            "no_spk_solab" => "required",
            "id_customer" => "required",
            "nama_project" => "required",
            "id_sales" => "required",
            "alamat_project" => "required",
            "qty_trafo" => "required",
        ]);
        $faker = Faker::create();

        $project = new project();
        $project->id_project = $faker->numberBetween(100, 999);
        $generatedNumber = $faker->numberBetween(100, 999);

        $existingProject = Project::where('id_project', $generatedNumber)->first();
        while ($existingProject) {
            $existingProject = Project::where('id_project', $generatedNumber)->first();
        }
        $project->id_project = $generatedNumber;

        $project->id_customer = $validated['id_customer'];
        $project->nama_project = $validated['nama_project'];
        $project->alamat_project = $validated['alamat_project'];
        $project->save();

        $solab = new solab();
        $solab->id_project = $project->id_project;
        $solab->id_sales = $validated['id_sales'];
        $solab->no_so_solab = $validated['no_so_solab'];
        $solab->no_spk_solab = $validated['no_spk_solab'];
        $solab->alamat_solab = $validated['alamat_project'];
        $solab->save();

        for ($i = 0; $i < $validated['qty_trafo']; $i++) {
            $history = new history();
            $history->id_project = $project->id_project;
            $history->save();
        }
        return redirect('/sales/oil/salesorder');
    }
}

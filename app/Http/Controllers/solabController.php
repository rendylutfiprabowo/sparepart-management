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

            // "dga_check" => "sometimes",
            // "dga_qty" => "required",
            // "furan_check" => "sometimes",
            // "furan_qty" => "required",
            // "oa_check" => "sometimes",
            // "oa_qty" => "required",
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
        // $solab->tahun_solab = $validated['tahun_solab'];
        $solab->alamat_solab = $validated['alamat_project'];
        $solab->save();

        for ($i = 0; $i < $validated['qty_trafo']; $i++) {
            $history = new history();
            $history->id_project = $project->id_project;
            $history->save();
        }
        //dga
        // if (isset($validated['dga_check'])) {
        //     $dga = new sample();
        //     $dga->id_sample = $faker->numberBetween(100, 999);;
        //     $dga->jumlah_sample = $validated['dga_qty'];
        //     $dga->status_sample = false;
        //     $dga->id_project = $project->id_project;
        //     $dga->id_scope = '220';
        //     $dga->save();

        //     $form_dga = new formReport();
        //     $form_dga->id_formreport = $dga->id_sample . '-220';
        //     $form_dga->field_formreport = form::where('id_scope', '220')->get()->first()->field_form;
        //     $form_dga->value_formreport = $form_dga->field_formreport;
        //     $form_dga->id_sample = $dga->id_sample;
        //     $form_dga->id_lab = '1';
        //     $form_dga->save();
        // }


        // //furan
        // if (isset($validated['furan_check'])) {
        //     $furan = new sample();
        //     $furan->id_sample = $faker->numberBetween(100, 999);;
        //     $furan->jumlah_sample = $validated['furan_qty'];
        //     $furan->status_sample = false;
        //     $furan->id_project = $project->id_project;
        //     $furan->id_scope = '842';
        //     $furan->save();

        //     $form_furan = new formReport();
        //     $form_furan->id_formreport = $furan->id_sample . '-842';
        //     $form_furan->field_formreport = form::where('id_scope', '842')->get()->first()->field_form;
        //     $form_furan->value_formreport = $form_furan->field_formreport;
        //     $form_furan->id_sample = $furan->id_sample;
        //     $form_furan->id_lab = '1';
        //     $form_furan->save();
        // }


        // //oa
        // if (isset($validated['oa_check'])) {
        //     $oa = new sample();
        //     $oa->id_sample = $faker->numberBetween(100, 999);;
        //     $oa->jumlah_sample = $validated['oa_qty'];
        //     $oa->status_sample = false;
        //     $oa->id_project = $project->id_project;
        //     $oa->id_scope = '399';
        //     $oa->save();

        //     $form_oa = new formReport();
        //     $form_oa->id_formreport = $oa->id_sample . '-399';

        //     $data = (array)json_decode(form::where('id_scope', '399')->get()->first()->field_form);
        //     // @dd($data);
        //     if (isset($validated['oa_check']['bdv_check'])) {
        //         $data['Breakdown Voltage (Dieclectric Strength)'] = '1';
        //     };
        //     if (isset($validated['oa_check']['ift_check'])) {
        //         $data['Interfacial Tension'] = '1';
        //     };
        //     if (isset($validated['oa_check']['wo_check'])) {
        //         $data['Water Content'] = '1';
        //     };
        //     if (isset($validated['oa_check']['tan_check'])) {
        //         $data['Total Acid Number (TAN)'] = '1';
        //     };
        //     if (isset($validated['oa_check']['sns_check'])) {
        //         $data['Sediment & Sludge'] = '1';
        //     };
        //     if (isset($validated['oa_check']['cs_check'])) {
        //         $data['Corrosive Sulfur'] = '1';
        //     };
        //     if (isset($validated['oa_check']['fp_check'])) {
        //         $data['Flash Point'] = '1';
        //     };
        //     if (isset($validated['oa_check']['pcb_check'])) {
        //         $data['PCB'] = '1';
        //     };
        //     if (isset($validated['oa_check']['color_check'])) {
        //         $data['Color / Appreance'] = '1';
        //     };
        //     if (isset($validated['oa_check']['density_check'])) {
        //         $data['Density'] = '1';
        //     };

        //     $form_oa->field_formreport = json_encode($data);
        //     $form_oa->value_formreport = $form_oa->field_formreport;
        //     $form_oa->id_sample = $oa->id_sample;
        //     $form_oa->id_lab = '1';
        //     $form_oa->save();
        // }


        return redirect('/sales/oil/salesorder');
    }
}

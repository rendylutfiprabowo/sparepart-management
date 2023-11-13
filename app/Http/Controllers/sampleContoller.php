<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;
use App\Models\project;
use App\Models\sample;
use App\Models\scope;
use App\Models\formReport;
use App\Models\form;

use Faker\Factory as Faker;


class sampleContoller extends Controller
{
    public function store($id_project,$id_history)
    {
        $validated = request()->validate([
            'check'=>'required',
        ]);
        $history = history::findOrFail($id_history);
        $project = project::where('id_project',$id_project)->firstOrFail();
        //dga

        $faker = Faker::create();
        if (isset($validated['check']['dga'])) {
            $dga = new sample();
            $dga->id_sample = $faker->numberBetween(100, 999);;
            $dga->status_sample = false;
            $dga->id_history = $id_history;
            $dga->id_scope = '220';
            $dga->save();

            $form_dga = new formReport();
            $form_dga->id_formreport = $dga->id_sample . '-220';
            $form_dga->field_formreport = form::where('id_scope', '220')->get()->first()->field_form;
            $form_dga->value_formreport = $form_dga->field_formreport;
            $form_dga->id_sample = $dga->id_sample;
            $form_dga->id_lab = '1';
            $form_dga->save();
        }


        //furan
        if (isset($validated['check']['furan'])) {
            $furan = new sample();
            $furan->id_sample = $faker->numberBetween(100, 999);;
            $furan->status_sample = false;
            $furan->id_history = $id_history;
            $furan->id_scope = '842';
            $furan->save();

            $form_furan = new formReport();
            $form_furan->id_formreport = $furan->id_sample . '-842';
            $form_furan->field_formreport = form::where('id_scope', '842')->get()->first()->field_form;
            $form_furan->value_formreport = $form_furan->field_formreport;
            $form_furan->id_sample = $furan->id_sample;
            $form_furan->id_lab = '1';
            $form_furan->save();
        }


        //oa
        if (isset($validated['check']['oa'])) {
            $oa = new sample();
            $oa->id_sample = $faker->numberBetween(100, 999);;
            $oa->jumlah_sample = NULL;
            $oa->status_sample = false;
            $oa->id_history = $id_history;
            $oa->id_scope = '399';
            $oa->save();

            $form_oa = new formReport();
            $form_oa->id_formreport = $oa->id_sample . '-399';

            $data = (array)json_decode(form::where('id_scope', '399')->get()->first()->field_form);
            // @dd($data);
            if (!isset($validated['check']['oa']['bdv'])) {
                $data['Breakdown Voltage (Dieclectric Strength)'] = '-1';
            };
            if (!isset($validated['check']['oa']['ift'])) {
                $data['Interfacial Tension'] = '-1';
            };
            if (!isset($validated['check']['oa']['water_content'])) {
                $data['Water Content'] = '-1';
            };
            if (!isset($validated['check']['oa']['tan'])) {
                $data['Total Acid Number (TAN)'] = '-1';
            };
            if (!isset($validated['check']['oa']['sediment_and_sludge'])) {
                $data['Sediment & Sludge'] = '-1';
            };
            if (!isset($validated['check']['oa']['corrosive_sulfur'])) {
                $data['Corrosive Sulfur'] = '-1';
            };
            if (!isset($validated['check']['oa']['flash_point'])) {
                $data['Flash Point'] = '-1';
            };
            if (!isset($validated['check']['oa']['pcb'])) {
                $data['PCB'] = '-1';
            };
            if (!isset($validated['check']['oa']['color'])) {
                $data['Color / Appreance'] = '-1';
            };
            if (!isset($validated['check']['oa']['density'])) {
                $data['Density'] = '-1';
            };

            $form_oa->field_formreport = json_encode($data);
            $form_oa->value_formreport = $form_oa->field_formreport;
            $form_oa->id_sample = $oa->id_sample;
            $form_oa->id_lab = '1';
            $form_oa->save();
            // dd($oa,$form_oa);
        }
        return redirect('sales/oil/salesorder/'.$id_project)->with('success','Item test berhasil ditambahkan');
    }
}

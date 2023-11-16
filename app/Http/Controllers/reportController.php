<?php

namespace App\Http\Controllers;

use App\Models\formReport;
use App\Models\sample;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class reportController extends Controller
{
    public function storeDGA(Request $request)
    {
        $faker = Faker::create();
        $request->validate([
            "hidrogen" => "required",
            "etana" => "required",
            "etilena" => "required",
            "asetilena" => "required",
            "karbonDioksida" => "required",
            "metana" => "required",
            "karbonMonoksida" => "required",
            "co2coRatio" => "required",
        ]);

        formReport::create(
            [
                'id_formreport' => $faker->numberBetween(100, 999),
                'id_sample' => $faker->numberBetween(100, 0),
                'id_lab' => 1,
                'field_formreport' => json_encode([
                    'hidrogen' => $request->hidrogen,
                    'etana' => $request->etana,
                    'etilena' => $request->etilena,
                    'asetilena' => $request->asetilena,
                    'karbonDioksida' => $request->karbonDioksida,
                    'metana' => $request->metana,
                    'karbonMonoksida' => $request->karbonMonoksida,
                    'co2coRatio' => $request->co2coRatio
                ]),

            ]
        );

        return view('oilab.lab.form_dga1_lab');
    }

    public function storeFuran($id_solab,$id_sample,Request $request)
    {
        $sample = sample::where('id_sample', $id_sample)->firstOrFail();
        $form = $sample->formReport;
        $faker = Faker::create();
        $request->validate([
            "mhf" => "required",
            "fol" => "required",
            "fal" => "required",
            "acf" => "required",
            "mef" => "required",
            "total_2fal" => "required",
            "total_furan" => "required",
            "estimate_dp" => "required"
        ]);
        $input = json_encode([
                    '5mhf' => $request->mhf,
                    '2fol' => $request->fol,
                    '2fal' => $request->fal,
                    '2acf' => $request->acf,
                    '5mef' => $request->mef,
                    'total_2fal' => $request->total_2fal,
                    'total_furan' => $request->total_furan,
                    'estimate_dp' => $request->estimate_dp
        ]);
        $form->field_formreport = json_encode([
                    '5mhf' => $request->mhf,
                    '2fol' => $request->fol,
                    '2fal' => $request->fal,
                    '2acf' => $request->acf,
                    '5mef' => $request->mef,
                    'total_2fal' => $request->total_2fal,
                    'total_furan' => $request->total_furan,
                    'estimate_dp' => $request->estimate_dp
        ]);
        $form->save();
        return redirect('orderlist/'.$id_solab);
    }

    public function storeOA(Request $request)
    {
        $faker = Faker::create();
        $request->validate([
            "color" => "required",
            "bdv" => "required",
            "ift" => "required",
            "tan" => "required",
            "wc" => "required",
            "oqin" => "required",
            "sediment_and_sludge" => "required",
            "density" => "required",
            "pcb" => "required",
            "corrosive_sulfur" => "required",
            "flash_point" => "required",
            "kategoriHasil_oa" => "required",
            "rekomendasi_oa" => "required",
        ]);

        formReport::create(
            [
                'id_formreport' => $faker->numberBetween(100, 999),
                'id_sample' => $faker->numberBetween(100, 0),
                'id_lab' => 1,
                'field_formreport' => json_encode([
                    'color' => $request->color,
                    'bdv' => $request->bdv,
                    'ift' => $request->ift,
                    'tan' => $request->tan,
                    'wc' => $request->wc,
                    'oqin' => $request->oqin,
                    'sediment_and_sludge' => $request->sediment_and_sludge,
                    'density' => $request->density,
                    'pcb' => $request->pcb,
                    'corrosive_sulfur' => $request->corrosive_sulfur,
                    'flash_point' => $request->flash_point,
                    'kategoriHasil_oa' => $request->kategoriHasil_oa,
                    'rekomendasi_oa' => $request->rekomendasi_oa,
                ]),

            ]
        );
        return view('oilab.lab.order_list');
    }
}

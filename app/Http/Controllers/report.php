<?php

namespace App\Http\Controllers;

use App\Models\formReport;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class report extends Controller
{
    public function storeDGA(Request $request)
    {
        $faker = Faker::create();
        $request->validate([
            "hidrogen"=> "required",
            "etana"=> "required",
            "etilena"=> "required",
            "asetilena"=> "required",
            "karbonDioksida"=> "required",
            "metana"=> "required",
            "karbonMonoksida"=> "required",
            "co2coRatio"=> "required",
        ]);

        formReport::create([
            [
            'id_formreport' => $faker->numberBetween(100, 999),
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
        ]);

        return redirect()->back();

    }
    
}


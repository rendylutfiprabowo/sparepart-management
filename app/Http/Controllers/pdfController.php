<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\project;
use App\Models\sample;
use App\Models\scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
    public function pdf($id)
    {
        $filename = 'Report Sample' . time() . rand('9999', '999999') . Str::random('10') . '.pdf';
        $pdfPath = public_path($filename);

        $history = history::where('id', $id)->first();
        $samples = [];
        $value = [];

        $sample['dga'] = $history->samples->where('id_scope',220)->first();
        $sample['furan'] = $history->samples->where('id_scope',842)->first();
        $sample['oa'] = $history->samples->where('id_scope',399)->first(); 

        $value['dga'] = $sample['dga']? json_decode($sample['dga']->formReport->field_formreport,true):NULL;
        $value['furan'] = $sample['furan']? json_decode($sample['furan']->formReport->field_formreport,true):NULL;
        $value['oa'] = $sample['oa']? json_decode($sample['oa']->formReport->field_formreport,true):NULL;
        
        // dd($sample,$value);

        return view('oilab.lab.indexpdf', compact('sample', 'value'));
    }
}

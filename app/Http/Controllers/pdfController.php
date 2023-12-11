<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\sample;
use App\Models\trafo;
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

        $sample = [];
        $sample[] = Sample::where('id_sample', $id)->first();
        $idTrafo = $sample[0]->history->id_trafo;
        $samples = Sample::whereHas('history', function ($query) use ($idTrafo) {
            $query->where('id_trafo', $idTrafo);
        })->where('id_scope', $sample[0]->id_scope)
            ->get();
        $value = json_decode($sample[0]->formReport->field_formreport, true);

        // Pastikan kunci '5hmf' ada dalam array $value
        if (!isset($value['5hmf'])) {
            // Jika kunci '5hmf' tidak ada, berikan nilai default atau atur sesuai kebutuhan
            $value['5hmf'] = 'Default Value';
        }

        $samples = collect($samples)->sortBy(function ($sample) {
            return $sample->history->finish;
        });
        $sample[] = $samples->slice(1, 1)->first();

        return view('oilab.lab.indexpdf', compact('sample', 'value'));
    }
}

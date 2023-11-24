<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
    public function pdf(Request $request)
    {
        $filename = 'Report Sample' . time() . rand('9999', '999999') . Str::random('10') . '.pdf';
        $pdfPath = public_path($filename);

        // Halaman pertama
        $pdf = PDF::loadView('oilab.lab.indexpdf');
        $pdf->save($pdfPath);

        // Halaman kedua
        $htmlPage2 = view('oilab.lab.indexpdf')->render();
        $pdf = PDF::loadHTML($htmlPage2);
        $pdf->save($pdfPath);

        // Halaman ketiga
        $htmlPage3 = view('oilab.lab.indexpdf')->render();
        $pdf = PDF::loadHTML($htmlPage3);
        $pdf->save($pdfPath);

        // Halaman keempat
        $htmlPage4 = view('oilab.lab.indexpdf')->render();
        $pdf = PDF::loadHTML($htmlPage4);
        $pdf->save($pdfPath);

        // Simpan di Storage jika diperlukan
        // Storage::disk('local')->put('pdfs/' . $filename, file_get_contents($pdfPath));

        // Kembalikan respons PDF
        return response()->download($pdfPath, $filename)->deleteFileAfterSend(true);
    }
}

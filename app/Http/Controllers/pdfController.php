<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class pdfController extends Controller
{
    public function generatePdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Hello World</h1>');
        return $pdf->stream();
    }
}

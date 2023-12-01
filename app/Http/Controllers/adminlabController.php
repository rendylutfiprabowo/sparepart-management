<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\reportSample;
use App\Models\sales;
use App\Models\sample;
use App\Models\solab;
use App\Models\trafo;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class adminlabController extends Controller
{
    public function index()
    {
        $totalDGA = Sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 220); // ID untuk DGA
        })->count();
        $totalFuran = Sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 842); // ID untuk Furan
        })->count();
        $totalOA = Sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 399); // ID untuk OA
        })->count();
        $totalAllSamples = $totalDGA + $totalFuran + $totalOA;

        return view('oilab.lab.index_adminlab', compact('totalDGA', 'totalFuran', 'totalOA', 'totalAllSamples'));
    }

    public function viewReport1()
    {
        $salesorderoil = Solab::whereNotNull('id_project')->get();
        $sample = Sample::all();
        return view('oilab.lab.report_adminlab', compact('salesorderoil', 'sample'));
    }
}

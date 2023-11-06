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

class labController extends Controller
{
    public function viewOrder()
    {
        $salesorderoil = Solab::whereNotNull('id_project')->get();
        $sample = Sample::all();
        return view('oilab.lab.order_list', compact('salesorderoil', 'sample'));
    }

    public function viewItem($no_so_solab)
    {
        $salesorderoil = Solab::where('no_so_solab', $no_so_solab)->first(); 
        $sample = Sample::all();
        return view('oilab.lab.order_list1', compact('salesorderoil', 'sample'));
    }

    public function addTrafo($id_solab)
    {
        $salesorderoil = Solab::where('no_so_solab', $id_solab)->first(); 
        return view('oilab.lab.form_add_data', compact('salesorderoil'));
    }

    public function storeTrafo(Request $request)
    {
        $faker = Faker::create();

        $validated = $request->validate([
            'serial_number' => 'required',
            'id_project' => 'required',
            'kva' => 'required',
            'merk' => 'required',
            'year' => 'required',
            'voltage' => 'required',
            'vg' => 'required',
            'tag_number' => 'required',
            'volume_oil' => 'required',
        ]);

        if ($validated) {
            $trafos = new Trafo();
            $trafos->id_trafo = $faker->numberBetween(100, 999);
            $trafos->serial_number = $validated['serial_number'];
            $trafos->kva = $validated['kva'];
            $trafos->merk = $validated['merk'];
            $trafos->year = $validated['year'];
            $trafos->voltage = $validated['voltage'];
            $trafos->vg = $validated['vg'];
            $trafos->tag_number = $validated['tag_number'];
            $trafos->volume_oil = $validated['volume_oil'];
            $trafos->id_project = $validated['id_project'];
            $trafos->save();

            $salesorderoil = Solab::whereNotNull('id_project')->get();
            $sample = Sample::all();

            return view('oilab.lab.order_list', compact('salesorderoil', 'sample'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\history;
use App\Models\reportSample;
use App\Models\sales;
use App\Models\sample;
use App\Models\solab;
use App\Models\trafo;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Auth\Events\Validated;

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

    public function addTrafo($id_solab,$id_history)
    {
        $salesorderoil = Solab::where('no_so_solab', $id_solab)->first(); 
        return view('oilab.lab.form_add_data', compact('salesorderoil','id_history'));
    }

    public function storeTrafo(Request $request, $no_so_solab,$id_history)
    {
        $faker = Faker::create();
        // dd($request->all());
        $validated = $request->validate([
            'serial_number' => 'required',
            'id_project' => 'required',
            'kva' => 'required',
            'merk' => 'required',
            'year' => 'required',
            // 'tegangan_hv' => 'required',
            // 'tegangan_lv' => 'required',
            'voltage' => 'required',
            'vg' => 'required',
            'tag_number' => 'required',
            'temperatur_oil' => 'required',
            'volume_oil' => 'required',
            'warna_oil' => 'required',
            'tanggal_sampling' => 'required',
            'tanggal_kedatangan' => 'required',
            'tanggal_pengujian' => 'required',
            'tanggal_pembuatanlaporan' => 'required',
            'tanggal_pengirimanlaporan' => 'required',
        ]);

        if ($validated) {
            $trafos = new Trafo();
            $trafos->id_trafo = $faker->numberBetween(100, 999);
            $trafos->serial_number = $validated['serial_number'];
            $trafos->kva = $validated['kva'];
            $trafos->merk = $validated['merk'];
            $trafos->year = $validated['year'];
            // $trafos->tegangan_hv = $validated['tegangan_hv'];
            // $trafos->tegangan_lv = $validated['tegangan_lv'];
            $trafos->voltage = $validated['voltage'];
            $trafos->vg = $validated['vg'];
            $trafos->tag_number = $validated['tag_number'];
            $trafos->temperatur_oil = $validated['temperatur_oil'];
            $trafos->volume_oil = $validated['volume_oil'];
            $trafos->warna_oil = $validated['warna_oil'];
            $trafos->id_customer = 0;
            $trafos->save();

            $history =  history::where('id_project', $request->id_project )->where('id',$id_history)->firstOrFail();
            $history->id_trafo = $trafos->id_trafo;
            $history->save();
            $salesorderoil = Solab::whereNotNull('id_project')->get();
            $sample = Sample::where('id_history', $history->id)->first();
            $sample->tanggal_sampling = $validated['tanggal_sampling'];
            $sample->tanggal_kedatangan = $validated['tanggal_kedatangan'];
            $sample->tanggal_pengujian = $validated['tanggal_pengujian'];
            $sample->tanggal_pembuatanlaporan = $validated['tanggal_pembuatanlaporan'];
            $sample->tanggal_pengirimanlaporan = $validated['tanggal_pengirimanlaporan'];
            $sample->save();

            return view('oilab.lab.order_list', compact('salesorderoil', 'sample'));
        }
        return response()->status(500);
    }
}

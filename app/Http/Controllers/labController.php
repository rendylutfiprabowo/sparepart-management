<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\history;
use App\Models\project;
use App\Models\reportSample;
use App\Models\sales;
use App\Models\scope;
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

        return view('oilab.lab.index_lab', compact('totalDGA', 'totalFuran', 'totalOA', 'totalAllSamples'));
    }

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

    public function addTrafo($id_solab, $id_history)
    {
        $salesorderoil = Solab::where('no_so_solab', $id_solab)->first();
        return view('oilab.lab.form_add_data', compact('salesorderoil', 'id_history'));
    }
    public function formReport($id_solab, $id_sample)
    {
        $sample = sample::where('id_sample', $id_sample)->firstOrFail();
        $form = json_decode($sample->formReport->field_formreport);

        return view('oilab.lab.form_sample_lab', [
            'sample' => $sample,
            'form' => $form,
        ]);
    }

    public function storeTrafo(Request $request, $no_so_solab, $id_history)
    {
        
        $faker = Faker::create();
        $validated = $request->validate([
            'serial_number' => 'required',
            'id_project' => 'required',
            'kva' => 'required',
            'merk' => 'required',
            'year' => 'required',
            'area' => 'required',
            'voltage' => 'required',
            'vg' => 'required',
            'tag_number' => 'required',
            'temperatur_oil' => 'required',
            'volume_oil' => 'required',
            'warna_oil' => 'required',
            'catatan' => 'required',
            'tanggal_sampling' => 'required',
            'tanggal_kedatangan' => 'required',
            'tanggal_pengujian' => 'required',
            'tanggal_cetaklaporan' => 'required'
        ]);
        if ($validated) {
            $trafo = trafo::where('serial_number',$validated['serial_number'])->first();
            $project = project::where('id_project',$validated['id_project'])->firstOrFail();
            if(!$trafo){
                $trafos = new Trafo();
                $trafos->id_trafo = $faker->numberBetween(100, 999);
                $trafos->serial_number = $validated['serial_number'];
                $trafos->kva = $validated['kva'];
                $trafos->merk = $validated['merk'];
                $trafos->year = $validated['year'];
                $trafos->area = $validated['area'];
                $trafos->voltage = $validated['voltage'];
                $trafos->vg = $validated['vg'];
                $trafos->tag_number = $validated['tag_number'];
                $trafos->temperatur_oil = $validated['temperatur_oil'];
                $trafos->volume_oil = $validated['volume_oil'];
                $trafos->warna_oil = $validated['warna_oil'];
                $trafos->id_customer = $project->id_customer;
                $trafos->save();
                $trafo = $trafos;
            }
            $history =  history::where('id_project', $request->id_project)->where('id', $id_history)->firstOrFail();
            $history->id_trafo = $trafo->id_trafo;
            $history->save();
            $samples = Sample::where('id_history', $history->id)->get();
            foreach ($samples as $key => $sample) {
                $sample->tanggal_sampling = $validated['tanggal_sampling'];
                $sample->tanggal_kedatangan = $validated['tanggal_kedatangan'];
                $sample->tanggal_pengujian = $validated['tanggal_pengujian'];
                $sample->tanggal_cetaklaporan = $validated['tanggal_cetaklaporan'];
                $sample->save();
            }

            return redirect('orderlist/'.$no_so_solab);
        }
    }
}

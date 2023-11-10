<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\reportSample;
use App\Models\sales;
use App\Models\sample;
use App\Models\solab;
use App\Models\history;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class itemtestController extends Controller
{
    public function indexlab()
    {
        return view('oilab.lab.index_lab');
    }
    

    
    public function notesitem()
    {
        $salesorderoil = solab::all()->whereNotNull('id_project');
        $sample = sample::all();
        return view('oilab.lab.item_test', compact('salesorderoil', 'sample'));
    }

    public function storenotes(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            "notes_reportsample" => "required",
        ]);
        $faker = Faker::create();
        $history  = history::findOrFail($id);

        if ($validated) {
            // Simpan catatan
            $history->note = $validated['notes_reportsample'];
            $history->save();

            if ($history->samples) {
                foreach ($history->samples as $sample) {
                    $sample->status_sample = true;
                    $sample->save();
                }
            }
            return redirect('/item_test');
        }
    }
}

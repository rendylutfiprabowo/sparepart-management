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
        $history = history::findOrFail($id);
        if (!empty($history->note)) {
            return redirect('/item_test');
        }

        // Validasi input
        $validated = $request->validate([
            "notes_reportsample" => "required",
        ]);

        if ($validated) {
            $history->note = $validated['notes_reportsample'];
            $history->save();
            return redirect('/item_test');
        }
    }
}

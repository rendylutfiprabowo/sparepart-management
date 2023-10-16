<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookedController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'jenis_layanan'=>'required',
            'id_customer'=>'required',
            'id_sales'=>'required',
            'id_store'=>'required',
            'date'=>'required',
            'stocks'=>'required',
            'qty'=>'required',
        ]);
        dd($validated);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\sparepart;
use Illuminate\Http\Request;
use App\Models\stockSparepart;

class stockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewStockManager()
    {
        $stockSparepart = stockSparepart::with('sparepart', 'store_sparepart')->get();
        return view(
            'sparepart.manager.stockManager',
            [
                'spareparts' => $stockSparepart
            ]
        );
    }
    public function viewStockWarehouse()
    {
        $stockSparepart = stockSparepart::with('sparepart', 'store_sparepart')->get();
        return view(
            'sparepart.warehouse.stockWarehouse',
            [
                'spareparts' => $stockSparepart
            ]
        );
    }

    public function addStock($id_stock, Request $request)
    {
        $validatedData = $request->validate([
            'qty_stock' => 'required',
        ]);

        $spareparts = stockSparepart::find($id_stock);
        $spareparts->qty_stock += $validatedData['qty_stock'];

        $spareparts->save();

        return redirect('/warehouse/stock')->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codematerial_sparepart' => 'required',
            'nama_sparepart' => 'required',
            'spesifikasi_sparepart' => 'required',
            'satuan' => 'required',

        ]);

        $sparepart = sparepart::create([
            'codematerial_sparepart' => $validatedData['codematerial_sparepart'],
            'nama_sparepart' => $validatedData['nama_sparepart'],
            'spesifikasi_sparepart' => $validatedData['spesifikasi_sparepart'],
            'satuan' => $validatedData['satuan'],

        ]);

        $stock = stockSparepart::create([
            'id_stock' => 'STK-' . rand(1, 999),
            'id_sparepart' => $validatedData['codematerial_sparepart'],
            'id_store' => 'STR-01',
            'spesifikasi_sparepart' => $validatedData['spesifikasi_sparepart'],
            'qty_stock' => 0
        ]);


        return redirect('/warehouse/stock');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

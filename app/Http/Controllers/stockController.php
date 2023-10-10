<?php

namespace App\Http\Controllers;

use App\Models\sparepart;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use App\Models\storeSparepart;

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
        $stores = storeSparepart::all();
        return view(
            'sparepart.warehouse.stockWarehouse',
            [
                'spareparts' => $stockSparepart,
                'stores' => $stores
            ]
        );
    }
    public function viewStockWarehouseToko($id_store)
    {

        $stockSpareparts = StockSparepart::with('sparepart', 'store_sparepart')->where('id_store',$id_store)->get();
        $stores = storeSparepart::all();
        // Mengirimkan nilai $id_store ke tampilan
        return view('sparepart.warehouse.stockWarehouseCabang', [
            'spareparts' => $stockSpareparts,
            'stores' => $stores,
            'id_store' => $id_store,
        ]);
    }


    public function addStock($id_stock, Request $request)
    {
        $validatedData = $request->validate([
            'qty_stock' => 'required',
        ]);

        $spareparts = stockSparepart::find($id_stock);
        $spareparts->qty_stock += $validatedData['qty_stock'];

        $spareparts->save();

        session()->flash('success', 'Stock berhasil ditambahkan');

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
        session()->flash('success', 'Stock berhasil ditambahkan');

        return redirect('/warehouse/stock');
    }

    public function safetyStock($id_stock, Request $request)
    {
        $validatedData = $request->validate([
            'safety_stock' => 'required',
        ]);

        $spareparts = stockSparepart::find($id_stock);
        $spareparts->safety_stock = $validatedData['safety_stock'];

        $spareparts->save();
        session()->flash('success', 'Stock berhasil ditambahkan');

        return redirect('/warehouse/stock')->with('success', 'Safety Stok berhasil diubah.');
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

<?php

namespace App\Http\Controllers;

use App\Models\stockSparepart;
use Illuminate\Http\Request;

class warehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewStockBranch($id_store)
    {
        $stockBranch = StockSparepart::with('sparepart', 'store_sparepart')
            ->whereHas('store_sparepart', function ($query) use ($id_store) {
                $query->where('store_id', $id_store);
            })
            ->get();

        return view(
            'sparepart.warehouse.stockWarehouse',
            [
                'spareparts' => $stockBranch
            ]
        );
    }
    public function index()
    {
        return view('sparepart.warehouse.dashboardWarehouse');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

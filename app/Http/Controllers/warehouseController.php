<?php

namespace App\Http\Controllers;

use App\Models\stockSparepart;
use App\Models\storeSparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class warehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewStockBranchId()
    {
        Auth::User()->warehouse->id_store;

        $stockSparepart = Auth::User()->warehouse->store->stock;
        $stores = storeSparepart::all();
        return view(
            'sparepart.branch.stockBranchWarehouse',
            [
                'spareparts' => $stockSparepart,
                'stores' => $stores
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

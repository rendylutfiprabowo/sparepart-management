<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use App\Models\technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class warehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function viewSpkBranch()
    {
        $spks = Auth::User()->warehouse->store->order;
        return view(
            'sparepart.branch.technicianBranchWarehouse',
            [
                'spk' => $spks,
            ]
        );
    }
    public function viewStockBranchId()
    {
        $id_store = Auth::User()->warehouse->id_store;

        $stockSparepart = Auth::User()->warehouse->store->stock;
        $stores = storeSparepart::all();
        return view(
            'sparepart.branch.stockBranchWarehouse',
            [
                'spareparts' => $stockSparepart,
                'stores' => $stores,
                'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,
            ]
        );
    }
    public function viewSpk()
    {
        $spks = Auth::User()->warehouse->store->order;
        return view(
            'sparepart.warehouse.technicianWarehouse',
            [
                'spk' => $spks,
            ]
        );
    }

    public function viewOrder($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();
        // @dd($order->first()->booked->sparepart);
        return view('sparepart.warehouse.addTechnicianWarehouse', [
            'order' => $order,
            'technician' => technician::all(),
            // 'jumlahItems' => order::all()->where('id_order', $id_order)->first()->booked->first()->qty_booked
        ]);
    }
    public function viewOrderBranch($id_order)
    {
        $uuid = Str::uuid();
        $uuidWithSlashes = str_replace('-', '/', $uuid);
        $np = 'Nota/' . $uuidWithSlashes . '/' . date('Ymd');
        $sj = 'Surat Jalan/' . $uuidWithSlashes . '/' . date('Ymd');
        $sj = strtoupper($sj);
        $np = strtoupper($np);
        $order = order::all()->where('id_order', $id_order)->first();
        // @dd($order->first()->booked->sparepart);
        return view('sparepart.branch.addTechnicianBranchWarehouse', [
            'order' => $order,
            'technician' => technician::all(),
            'nota' => $np,
            'surat_jalan' => $sj
            // 'jumlahItems' => order::all()->where('id_order', $id_order)->first()->booked->first()->qty_booked
        ]);
    }
    public function addWorkerBranch($id_order, Request $request)
    {
        $validatedData = $request->validate([
            'id_technician' => 'required',
            'nota_penyerahan' => 'required',
            'surat_jalan' => 'required',
        ]);
        $orders = order::all()->where('id_order', $id_order)->first();
        $orders->id_technician = $validatedData['id_technician'];
        $orders->nota_penyerahan = $validatedData['nota_penyerahan'];
        $orders->surat_jalan = $validatedData['surat_jalan'];
        $orders->save();
        session()->flash('success', 'Teknisi berhasil ditambahkan');

        return redirect('/warehouse/branch/listspk')
            ->with('order', $orders)
            ->with('id_order', $id_order);
    }
    public function addWorker($id_order, Request $request)
    {
        $validatedData = $request->validate([
            'id_technician' => 'required',
            'nota_penyerahan' => 'required',
            'surat_jalan' => 'required',
        ]);
        $orders = order::all()->where('id_order', $id_order)->first();
        $orders->id_technician = $validatedData['id_technician'];
        $orders->nota_penyerahan = $validatedData['nota_penyerahan'];
        $orders->surat_jalan = $validatedData['surat_jalan'];
        $orders->save();
        session()->flash('success', 'Teknisi berhasil ditambahkan');

        return redirect('/warehouse/listspk')
            ->with('order', $orders)
            ->with('id_order', $id_order);
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

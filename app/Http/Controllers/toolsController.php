<?php

namespace App\Http\Controllers;

use App\Models\storeSparepart;
use App\Models\tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class toolsController extends Controller
{
    public function viewToolsWarehouse()
    {
        $toolsWarehouse = tools::with('store')->get();
        $stores = storeSparepart::all();
        return view(
            'sparepart.warehouse.toolsWarehouse',
            [
                'tools' => $toolsWarehouse,
                'stores' => $stores
            ]
        );
    }

    public function viewToolsWarehouseToko($id_store)
    {
        $tools = tools::with('store')->where('id_store', $id_store)->get();
        $stores = storeSparepart::all();
        return view('sparepart.warehouse.toolsWarehouseCabang', [
            'tools' => $tools,
            'stores' => $stores,
            'id_store' => $id_store,
            'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,
        ]);
    }
    public function viewToolsBranchWarehouse()
    {
        $id_store = Auth::User()->warehouse->id_store;
        $tools = Auth::User()->warehouse->store->tools;
        $stores = storeSparepart::all();
        return view('sparepart.branch.toolsBranchWarehouse', [
            'tools' => $tools,
            'stores' => $stores,
            'id_store' => $id_store,
            'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\storeSparepart;
use App\Models\technician_tools;
use App\Models\tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tools' => 'required',
            'id_store' => 'required'
        ]);

        $id_tools = 'TOOLS-' . rand(0, 99);

        $tools = tools::create([
            'nama_tools' => $validatedData['nama_tools'],
            'id_store' => $validatedData['id_store'],
            'id_tools' => $id_tools,
            'qty_tools' => 0
        ]);

        $tools->save();

        session()->flash('success', 'Tools berhasil ditambahkan');

        return redirect('/warehouse/branch/tools.');
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

    public function viewToolsTechnician()
    {
        $toolsWarehouse = tools::all();
        $stores = storeSparepart::all();
        return view(
            'sparepart.technician.toolsTechnician',
            [
                'tools' => $toolsWarehouse,
                'stores' => $stores
            ]
        );
    }

    public function viewToolsToko($id_store)
    {
        $tools = tools::with('store')->where('id_store', $id_store)->get();
        $stores = storeSparepart::all();
        return view('sparepart.technician.toolsCabang', [
            'tools' => $tools,
            'stores' => $stores,
            'id_store' => $id_store,
            'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,
        ]);
    }
    public function selectStore()
    {
        $stores = storeSparepart::all();
        return view('sparepart.technician.selectStoreBranch', [
            'stores' => $stores,
        ]);
    }

    public function storeTools(Request $request)
    {
        $validatedData = $request->validate([
            'id_technician' => 'required',
            'tools.*' => 'required', // Ganti dengan "tools.*" untuk memvalidasi array
            'qty.*' => 'required|integer|min:1', // Ganti dengan "qty.*" untuk memvalidasi array
            'date' => 'required',
        ]);
        $uuid = Str::uuid();

        if ($validatedData) {

            foreach ($validatedData['tools'] as $key => $tool) {
                $tools = new technician_tools();
                $tools->status = 'waiting';
                $tools->id_technician_tools = $uuid;
                $tools->id_technician = $validatedData['id_technician'];
                $tools->start_date = $validatedData['date'];
                $tools->id_tools = $tool; // ID dari data tools yang baru saja disimpan
                $tools->qty_technician_tools = $validatedData['qty'][$key];
                $tools->save();
            }

            // Redirect atau tampilkan pesan berhasil
            return redirect('/technician/tools');
        }
    }
}

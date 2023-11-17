<?php

namespace App\Http\Controllers;

use App\Models\category;
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
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace

        $stocks = stockSparepart::with('sparepart', 'store_sparepart');

        if (!empty($query)) {
            $stocks->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->whereHas('sparepart', function ($subQuery) use ($query) {
                        $subQuery->where('codematerial_sparepart', 'like', '%' . $query . '%')
                            ->orWhere('spesifikasi_sparepart', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('sparepart.category', function ($subQuery) use ($query) {
                        $subQuery->where('nama_category', 'like', '%' . $query . '%');
                    });
            });
        }
        $stocks = $stocks->paginate(10);
        $stores = storeSparepart::all();
        $Notif = stockSparepart::whereColumn('safety_stock', '>=', 'qty_stock')->with('sparepart.category')
            ->get();

        return view(
            'sparepart.warehouse.stockWarehouse',
            [
                'spareparts' => $stocks,
                'stores' => $stores,
                'notifs' => $Notif
            ]
        );
    }
    public function viewStockWarehouseToko($id_store)
    {
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace

        $stocks = stockSparepart::with('sparepart', 'store_sparepart')->where('id_store', $id_store);

        if (!empty($query)) {
            $stocks->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->whereHas('sparepart', function ($subQuery) use ($query) {
                        $subQuery->where('codematerial_sparepart', 'like', '%' . $query . '%')
                            ->orWhere('spesifikasi_sparepart', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('sparepart.category', function ($subQuery) use ($query) {
                        $subQuery->where('nama_category', 'like', '%' . $query . '%');
                    });
            });
        }
        $stocks = $stocks->paginate(10);
        $stores = storeSparepart::all();
        $Notif = stockSparepart::where('id_store', $id_store)->whereColumn('safety_stock', '>=', 'qty_stock')->with('sparepart.category')
            ->get();
        // Mengirimkan nilai $id_store ke tampilan
        return view('sparepart.warehouse.stockWarehouseCabang', [
            'notifs' => $Notif,
            'stocks' => $stocks,
            'stores' => $stores,
            'id_store' => $id_store,
            'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,
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
    public function addStockBranch($id_stock, Request $request)
    {
        $validatedData = $request->validate([
            'qty_stock' => 'required',
        ]);

        $spareparts = stockSparepart::find($id_stock);
        $spareparts->qty_stock += $validatedData['qty_stock'];

        $spareparts->save();

        session()->flash('success', 'Stock berhasil ditambahkan');

        return redirect('/warehouse/branch/stock')->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codematerial_sparepart' => 'required',
            'nama_category' => 'required',
            'spesifikasi_sparepart' => 'required',
            'satuan' => 'required',

        ]);

        $lowercaseCategoryName = strtolower($validatedData['nama_category']); // Mengubah nama menjadi lowercase

        // Cari kategori berdasarkan nama (setelah diubah menjadi lowercase)
        $category = Category::firstOrNew(['nama_category' => $lowercaseCategoryName]);

        // Jika kategori belum ada, maka simpan
        if (!$category->exists) {
            $category->id_category = 'CAT-' . rand(1, 999);
            $category->nama_category = $validatedData['nama_category'];
            $category->save();
        }

        $sparepart = sparepart::create([
            'codematerial_sparepart' => $validatedData['codematerial_sparepart'],
            'spesifikasi_sparepart' => $validatedData['spesifikasi_sparepart'],
            'satuan' => $validatedData['satuan'],
            'id_category' => $category->id_category,
        ]);

        $stock = stockSparepart::create([
            'id_stock' => 'STK-' . rand(10000, 999999),
            'id_sparepart' => $validatedData['codematerial_sparepart'],
            'id_store' => 'CTR',
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
    public function safetyStockBranch($id_stock, Request $request)
    {
        $validatedData = $request->validate([
            'safety_stock' => 'required',
        ]);

        $spareparts = stockSparepart::find($id_stock);
        $spareparts->safety_stock = $validatedData['safety_stock'];

        $spareparts->save();
        session()->flash('success', 'Stock berhasil ditambahkan');

        return redirect('/warehouse/branch/stock')->with('success', 'Safety Stok berhasil diubah.');
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

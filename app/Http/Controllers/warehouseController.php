<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\distribution;
use App\Models\order;
use App\Models\sparepart;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use App\Models\technician;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $stockSparepart = Auth::User()->warehouse->store->stock()->paginate(10);
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
        return view('sparepart.warehouse.addTechnicianWarehouse', [
            'order' => $order,
            'technician' => technician::all(),
        ]);
    }
    public function returItem()
    {
        $order = order::has('revisi')->get();
        return view('sparepart.branch.returBranchWarehouse', [
            'order' => $order,
        ]);
    }

    public function detailReturItem($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();

        $revision_booked = $order->revisi->booked;
        $order_booked = $order->booked;

        $id_stock_values = $order_booked->pluck('id_stock')->toArray();

        $revision = $revision_booked->whereIn('id_stock', $id_stock_values);

        $type = NULL;
        if ($order->do_order) $type = 'DO';
        elseif ($order->memo_order) $type = 'MEMO';

        return view('sparepart.branch.detailReturBranchWarehouse', [
            'order' => $order,
            'revision' => $revision,
            'type' => $type
        ]);
    }
    public function viewOrderBranch($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();
        if ($order->do_order == NULL) {
            $uuid = Str::uuid();
            $uuidWithSlashes = str_replace('-', '/', $uuid);
            $np = 'Nota/' . $uuidWithSlashes . '/' . date('Ymd');
            $np = strtoupper($np);
            $sj = $order->surat_jalan;
        } else {
            if ($order->nota_penyerahan == NULL || $order->surat_jalan == NULL) {
                $uuid = Str::uuid();
                $uuidWithSlashes = str_replace('-', '/', $uuid);
                $np = 'Nota/' . $uuidWithSlashes . '/' . date('Ymd');
                $sj = 'Surat Jalan/' . $uuidWithSlashes . '/' . date('Ymd');
                $sj = strtoupper($sj);
                $np = strtoupper($np);
            } else {
                $np = $order->nota_penyerahan;
                $sj = $order->surat_jalan;
            }
        }


        return view('sparepart.branch.addTechnicianBranchWarehouse', [
            'order' => $order,
            'technician' => technician::all(),
            'nota' => $np,
            'surat_jalan' => $sj
        ]);
    }
    public function addWorkerBranch($id_order, Request $request)
    {
        $orders = order::all()->where('id_order', $id_order)->first();
        $validatedData = $request->validate([
            'id_technician' => 'sometimes',
            'nota_penyerahan' => 'sometimes',
            'surat_jalan' => 'sometimes',
        ]);
        if ($orders->jenis_layanan == 1) {
            if ($orders->do_order != null) {
                $orders->id_technician = $validatedData['id_technician'];
                $orders->nota_penyerahan = $validatedData['nota_penyerahan'];
                $orders->status = 'on-technician';
                $orders->save();
                session()->flash('success', 'Teknisi berhasil ditambahkan');
            } else {
                $orders->id_technician = $validatedData['id_technician'];
                $orders->surat_jalan = $validatedData['surat_jalan'];
                $orders->status = 'on-technician';
                $orders->save();
                session()->flash('success', 'Teknisi berhasil ditambahkan');
            }
        } elseif ($orders->jenis_layanan == 2) {
            if ($orders->do_order != null) {
                $orders->nota_penyerahan = $validatedData['nota_penyerahan'];
                $orders->status = 'closed';
                $orders->technician_name = 'closed';
                $orders->save();
            } elseif ($orders->do_order == null) {
                $orders->surat_jalan = $validatedData['surat_jalan'];
                $orders->status = 'memo-closed';
                $orders->save();
            }
        }
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

    public function viewDistribution()
    {
        $id_store = Auth::User()->warehouse->id_store;
        $store = storeSparepart::all()->where('id_store', $id_store)->first();
        $distribution = distribution::all();
        return view(
            'sparepart.branch.distribution',
            [
                'distribution' => $distribution,
                'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,
                'store' => $store
            ]
        );
    }
    public function reqDistribution($id_store)
    {
        $store = storeSparepart::all()->where('id_store', $id_store)->first();
        $stocks = stockSparepart::where('id_store', $id_store)->with('sparepart.category')->get();
        $categories = [];
        $stocks->each(function ($stock) use (&$categories) {
            $category = $stock->sparepart->category;
            if ($category) {
                $categories[] = $category;
            }
        });
        $categories = new Collection($categories);
        $categories = $categories->unique('id');

        $customers = customer::all();
        $now = Carbon::now();
        return view('sparepart.branch.formDistribution', [
            'customers' => $customers,
            'categories' => $categories,
            'store' => $store,
            'stocks' => $stocks,
            'now' => $now,
        ]);
    }
    public function index()
    {

        return view('sparepart.warehouse.dashboardWarehouse');
    }

    public function storeDistribution(Request $request)
    {
        $validated = $request->validate([
            'order_date' => 'required',
            'stocks' => 'required',
            'qty' => 'required',
        ]);
        $uuid = Str::uuid();
        $randomNumber = rand(10000, 999999);

        // Ambil data toko yang terkait dengan pengguna yang login
        foreach ($validated['stocks'] as $key => $stockId) {
            $sparepart = stockSparepart::with('sparepart')->where('id_stock', $stockId)->firstOrFail();
            $id_sparepart = $sparepart->id_sparepart;
            $store = Auth::user()->warehouse->store->stock->where('id_sparepart', $id_sparepart)->first();
            // @dd($store->id_stock);
            // @dd($store);

            if ($store == null) {
                // ID stock tidak ditemukan dalam toko pengguna yang login
                // Buat data stok dan suku cadang baru
                $newStock = new stocksparepart();
                $newStock->id_stock = 'STK-' . $randomNumber;
                $newStock->id_sparepart = $id_sparepart;
                $newStock->qty_stock = $validated['qty'][$key];
                $newStock->id_store = Auth::user()->warehouse->store->id_store;
                $newStock->safety_stock = 10;
                $newStock->qty_stock = 0;
                $newStock->save();

                // Buat suku cadang baru dengan data toko yang sesuai
                $newSparepart = new sparepart();
                $newSparepart->id_category = $sparepart->sparepart->id_category;
                $newSparepart->codematerial_sparepart = $sparepart->sparepart->codematerial_sparepart;
                $newSparepart->spesifikasi_sparepart = $sparepart->sparepart->spesifikasi_sparepart;
                $newSparepart->satuan = $sparepart->sparepart->satuan;
                $newSparepart->save();

                // Lanjutkan dengan pembuatan pesanan distribusi dengan stok dan suku cadang yang baru dibuat
                $distribution = new distribution();
                $distribution->id_distribution = $uuid;
                $distribution->id_stock = $newStock->id_stock;
                $distribution->qty_distribution = $validated['qty'][$key];
                $distribution->order_date = $validated['order_date'];
                $distribution->status = 'waiting for approval';
                $distribution->save();
            } else {
                $distribution = new distribution();
                $distribution->id_distribution = $uuid;
                $distribution->id_stock = $store->id_stock;
                $distribution->qty_distribution = $validated['qty'][$key];
                $distribution->order_date = $validated['order_date'];
                $distribution->status = 'waiting for approval';
                $distribution->save();
            }
        }
        return redirect('/warehouse/branch/request-item');
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

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

    // public function storeDistribution(Request $request)
    // {
    //     $validated = $request->validate([
    //         'order_date' => 'required',
    //         'stocks' => 'required',
    //         'qty' => 'required',
    //     ]);

    //     // Ambil data toko yang terkait dengan pengguna yang login
    //     $tokoUser = storeSparepart::where('id_store', Auth::user()->warehouse->store->id_store)->first();
    //     $uuid = Str::uuid();

    //     foreach ($validated['stocks'] as $key => $stockId) {
    //         // Temukan id_sparepart berdasarkan stockId
    //         $sparepart = stockSparepart::with('sparepart')->find($stockId);
    //         if (!$sparepart) {
    //             return redirect()->back()->with('error', 'Stok tidak tersedia dalam toko Anda.');
    //         }

    //         // Cari semua id_stock yang terhubung dengan id_sparepart ini
    //         $idStocks = stockSparepart::where('id_sparepart', $sparepart->id_sparepart)
    //             ->pluck('id_stock')
    //             ->toArray();
    //         // Periksa setiap id_stock

    //         foreach ($idStocks as $idStock) {
    //             // Temukan stockSparepart yang cocok dengan id_stock dan toko dari pengguna yang login
    //             $stockUser = stockSparepart::where('id_stock', $idStock)
    //                 ->where('id_store', $tokoUser->id_store)
    //                 ->first();

    //             if ($stockUser) {
    //                 // Jika $stockUser ditemukan, berarti Anda telah menemukan id_stock yang sesuai.
    //                 // Anda dapat menggunakannya dalam pembuatan pesanan distribusi.
    //                 $id_stock = $stockUser->id_stock;

    //                 // Lanjutkan dengan pembuatan pesanan distribusi
    //                 $distribution = new distribution();
    //                 $distribution->id_distribution = $uuid;
    //                 $distribution->id_stock = $id_stock;
    //                 $distribution->qty_distribution = $validated['qty'][$key];
    //                 $distribution->order_date = $validated['order_date'];
    //                 $distribution->status = 'waiting for approval';
    //                 $distribution->save();
    //             }
    //         }
    //         return redirect('/warehouse/branch/request-item');
    //     }


    // foreach ($validated['stocks'] as $key => $stockId) {
    //     // Temukan data stock yang sesuai berdasarkan id_sparepart
    //     $stockUser = stockSparepart::whereHas('sparepart', function ($query) use ($tokoUser, $stockId) {
    //         // Filter berdasarkan toko yang dimiliki oleh user yang sedang login
    //         $query->where('id_store', $tokoUser->id_store);
    //         // Juga Anda perlu mencocokkan id_sparepart yang sesuai dengan id_sparepart dari form input
    //         $query->where('id_sparepart', $stockId);
    //     })->first();

    // if ($stockUser) {
    // Stok ditemukan dalam toko pengguna yang login
    // $distribution = new distribution();
    // $distribution->id_distribution = $uuid;
    // $distribution->id_stock = $stockUser->id_stock;
    // $distribution->qty_distribution = $validated['qty'][$key];
    // $distribution->order_date = $validated['order_date'];
    // $distribution->status = 'waiting for approval';
    // $distribution->save();
    // } else {
    // ID stock tidak ditemukan dalam toko pengguna yang login
    // Buat data stok dan suku cadang baru
    // $newStock = new stocksparepart();
    // $newStock->id_sparepart = $stockId;
    // $newStock->qty_stock = $validated['qty'][$key];
    // $newStock->id_store = $tokoUser->id_store;
    // $newStock->safety_stock = 10;
    // $newStock->save();

    // Buat suku cadang baru dengan data toko yang sesuai
    // $newSparepart = new sparepart();
    // $newSparepart->id_category = $newStock->sparepart->category->id_category;
    // $newSparepart->codematerial_sparepart = $newStock->sparepart->codematerial_sparepart;
    // $newSparepart->spesifikasi_sparepart = $newStock->sparepart->spesifikasi_sparepart;
    // $newSparepart->satuan = $newStock->sparepart->satuan;
    // $newSparepart->id_store = $tokoUser->id_store;
    // $newSparepart->save();

    // Lanjutkan dengan pembuatan pesanan distribusi dengan stok dan suku cadang yang baru dibuat
    // $distribution = new distribution();
    // $distribution->id_distribution = $uuid;
    // $distribution->id_stock = $newStock->id;
    // $distribution->qty_distribution = $validated['qty'][$key];
    // $distribution->order_date = $validated['order_date'];
    // $distribution->status = 'waiting for approval';
    // $distribution->save();
    // return redirect()->back()->with('error', 'Stok tidak tersedia dalam toko Anda.');
    // }

    // return redirect('/warehouse/branch/request-item');
    // }
    public function storeDistribution(Request $request)
    {
        $validated = $request->validate([
            'order_date' => 'required',
            'stocks' => 'required',
            'qty' => 'required',
        ]);

        // Ambil data toko yang terkait dengan pengguna yang login
        $tokoUser = storeSparepart::where('id_store', Auth::user()->warehouse->store->id_store)->first();
        $uuid = Str::uuid();

        foreach ($validated['stocks'] as $key => $stockId) {
            $sparepart = stockSparepart::with('sparepart')->where('id_stock', $stockId)->firstOrFail();
            $id_sparepart = $sparepart->id_sparepart;
            $store = Auth::user()->warehouse->store->stock->where('id_sparepart', $id_sparepart)->first();
            @dd($store);

            // Temukan stock sparepart yang memiliki id_sparepart yang sama dengan $sparepart dan terkait dengan toko dari pengguna yang login
            // $store = stockSparepart::whereHas('store_sparepart', function ($query) use ($tokoUser) {
            //     $query->where('id_store', $tokoUser->id_store);
            // })->where('id_sparepart', $id_sparepart)->first();

            // Di sini Anda memiliki $store yang merupakan stock sparepart yang sesuai dengan $sparepart
            // dan terkait dengan toko dari pengguna yang login.
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

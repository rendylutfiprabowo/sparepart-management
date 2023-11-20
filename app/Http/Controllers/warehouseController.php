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

    public function dashboardWarehouse()
    {
        $idStore = Auth::user()->warehouse->id_store;
        $totalItem = stockSparepart::where('id_store', $idStore)->count();
        $totalOrder = order::where('id_store', $idStore)->count();
        $orderClosed = order::where('id_store', $idStore)->where('status', 'closed')->count();
        $orderProgress = Order::where('id_store', $idStore)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->count();
        // @dd($orderClosed);
        $booking = order::where('id_store', $idStore)->where('status', null)->count();
        return view('sparepart.warehouse.warehouseDashboard', [
            'totalItem' => $totalItem,
            'totalOrder' => $totalOrder,
            'orderClosed' => $orderClosed,
            'orderProgress' => $orderProgress,
            'booking' => $booking
        ]);
        // ));
    }

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
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace

        $stocks = Auth::User()->warehouse->store->stock()->with('sparepart', 'store_sparepart');

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
        $stockSparepart = Auth::User()->warehouse->store->stock;
        $stores = storeSparepart::all();

        $Notif = stockSparepart::where('id_store', $id_store)->whereColumn('safety_stock', '>=', 'qty_stock')->with('sparepart.category')
            ->get();

        return view(
            'sparepart.branch.stockBranchWarehouse',
            [
                'spareparts' => $stockSparepart,
                'stocks' => $stocks,
                'stores' => $stores,
                'notifs' => $Notif,
                'namaStore' => storeSparepart::where('id_store', $id_store)->get()->first()->nama_store,

            ]
        );
    }
    public function viewSpk()
    {
        $order = order::all();
        return view(
            'sparepart.warehouse.technicianWarehouse',
            [
                'order' => $order,
            ]
        );
    }

    public function returItem()
    {
        $id_user = auth()->user()->warehouse->id_store;
        $order = Order::where('id_store', $id_user)
            ->whereHas('revisi')
            ->get();
        return view('sparepart.branch.returBranchWarehouse', [
            'order' => $order,
        ]);
    }
    public function returItemCenter()
    {
        $order = order::has('revisi')->get();
        return view('sparepart.warehouse.returCenterWarehouse', [
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
    public function detailReturItemCenter($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();

        $revision_booked = $order->revisi->booked;
        $order_booked = $order->booked;

        $id_stock_values = $order_booked->pluck('id_stock')->toArray();

        $revision = $revision_booked->whereIn('id_stock', $id_stock_values);

        $type = NULL;
        if ($order->do_order) $type = 'DO';
        elseif ($order->memo_order) $type = 'MEMO';

        return view('sparepart.warehouse.detailReturWarehouse', [
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
    public function viewOrder($id_order)
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


        return view('sparepart.warehouse.addTechnicianWarehouse', [
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
                $orders->save();
            } elseif ($orders->do_order == null) {
                $orders->surat_jalan = $validatedData['surat_jalan'];
                $orders->status = 'memo-closed';
                $orders->save();
            }
        }
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

    public function index()
    {

        return view('sparepart.warehouse.dashboardWarehouse');
    }

    public function viewReqDistribution()
    {
        $distribution = distribution::all();
        return view('sparepart.warehouse.distribution', [
            'distribution' => $distribution,
        ]);
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

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

    public function dashboardManager()
    {
        $idStore = Auth::user()->warehouse->id_store;
        $orderProgressNotif = Order::whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->count();
        $orderClosedNotif = order::where('status', 'closed')->count();

        // Ambil data per bulan untuk total item
        $totalItem = stockSparepart::all()->count();

        // Ambil data per bulan untuk total order
        $totalOrder = order::all()->count();

        // Ambil data per bulan untuk order closed
        $orderClosed = order::where('status', 'closed')
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        // Ambil data per bulan untuk order progress
        $orderProgress = Order::whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        // Ambil data per bulan untuk booking
        $booking = order::where('status', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        return view('sparepart.manager.dashboardManager', [
            'totalItem' => $totalItem,
            'totalOrder' => $totalOrder,
            'orderClosed' => $orderClosed,
            'orderProgress' => $orderProgress,
            'booking' => $booking,
            'orderProgressNotif' => $orderProgressNotif,
            'orderClosedNotif' => $orderClosedNotif,
        ]);
    }
    public function dashboardWarehouseBranch()
    {
        $idStore = Auth::user()->warehouse->id_store;
        $orderProgressNotif = Order::where('id_store', $idStore)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->count();
        $orderClosedNotif = order::where('id_store', $idStore)->where('status', 'closed')->count();

        // Ambil data per bulan untuk total item
        $totalItem = stockSparepart::where('id_store', $idStore)->count();

        // Ambil data per bulan untuk total order
        $totalOrder = order::where('id_store', $idStore)->count();

        // Ambil data per bulan untuk order closed
        $orderClosed = order::where('id_store', $idStore)
            ->where('status', 'closed')
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        // Ambil data per bulan untuk order progress
        $orderProgress = Order::where('id_store', $idStore)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        // Ambil data per bulan untuk booking
        $booking = order::where('id_store', $idStore)
            ->where('status', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        return view('sparepart.branch.warehouseBranchDashboard', [
            'totalItem' => $totalItem,
            'totalOrder' => $totalOrder,
            'orderClosed' => $orderClosed,
            'orderProgress' => $orderProgress,
            'booking' => $booking,
            'orderProgressNotif' => $orderProgressNotif,
            'orderClosedNotif' => $orderClosedNotif,
        ]);
    }
    public function dashboardWarehouse()
    {
        $idStore = Auth::user()->warehouse->id_store;
        $orderProgressNotif = Order::where('id_store', $idStore)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->count();
        $orderClosedNotif = order::where('id_store', $idStore)->where('status', 'closed')->count();

        // Ambil data per bulan untuk total item
        $totalItem = stockSparepart::where('id_store', $idStore)->count();

        // Ambil data per bulan untuk total order
        $totalOrder = order::where('id_store', $idStore)->count();

        // Ambil data per bulan untuk order closed
        $orderClosed = order::where('id_store', $idStore)
            ->where('status', 'closed')
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        // Ambil data per bulan untuk order progress
        $orderProgress = Order::where('id_store', $idStore)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        // Ambil data per bulan untuk booking
        $booking = order::where('id_store', $idStore)
            ->where('status', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();

        return view('sparepart.warehouse.warehouseDashboard', [
            'totalItem' => $totalItem,
            'totalOrder' => $totalOrder,
            'orderClosed' => $orderClosed,
            'orderProgress' => $orderProgress,
            'booking' => $booking,
            'orderProgressNotif' => $orderProgressNotif,
            'orderClosedNotif' => $orderClosedNotif,
        ]);
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

        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace
        // Lakukan query berdasarkan status
        $order = Order::query();
        $status = Order::all()->groupBy('status');
        // @dd($status);
        if (!empty($query)) {
            $order->where('status', $query);
            // @dd($status);
        }
        // @dd($order);
        $order = $order->paginate(10);
        return view(
            'sparepart.warehouse.technicianWarehouse',
            [
                'order' => $order,
                'status' => $status,
            ]
        );
    }

    public function viewSpkBranch()
    {
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace
        $id_store = Auth::user()->warehouse->id_store;
        // $spks = Auth::User()->warehouse->store->order->query();
        $spks = order::query()->where('id_store', $id_store);
        $status = Auth::User()->warehouse->store->order->groupBy('status');
        if (!empty($query)) {
            $spks->where('status', $query);
            // @dd($status);
        }
        $spks = $spks->paginate(10);

        return view(
            'sparepart.branch.technicianBranchWarehouse',
            [
                'spk' => $spks,
                'status' => $status
            ]
        );
    }

    public function returItem()
    {
        $id_user = auth()->user()->warehouse->id_store;
        $order = Order::query()
            ->where('id_store', $id_user)
            ->whereHas('revisi')
            ->paginate(10);

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
        $distributionIds = distribution::all()->pluck('id_stock');
        $id_stocks = stockSparepart::whereIn('id_stock', $distributionIds)->get();
        $distribution = distribution::whereIn('id_stock', $id_stocks->pluck('id_stock'))->paginate(10);
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

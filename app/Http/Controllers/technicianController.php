<?php

namespace App\Http\Controllers;

use App\Models\booked;
use App\Models\order;
use App\Models\revisi;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use App\Models\technician;
use App\Models\tools;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class technicianController extends Controller
{
    public function viewDashboard()
    {
        $idTechnician = Auth::user()->technician->id_technician;
        $orderProgressNotif = Order::where('id_technician', $idTechnician)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->count();
        $orderClosedNotif = order::where('id_technician', $idTechnician)->where('status', 'closed')->count();

        // Ambil data per bulan untuk total order
        $totalOrder = order::where('id_technician', $idTechnician)->count();

        $orderProgress = Order::where('id_technician', $idTechnician)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->count();

        $order = Order::where('id_technician', $idTechnician)
            ->whereNotNull('status')
            ->where('status', '!=', 'closed')
            ->where('status', '!=', null)
            ->selectRaw('DATE_FORMAT(date_order, "%Y-%m") as month')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('month')
            ->get();


        return view('sparepart.technician.dashboardTechnician', [
            'totalOrder' => $totalOrder,
            'order' => $order,
            'orderProgress' => $orderProgress,
            'orderProgressNotif' => $orderProgressNotif,
            'orderClosedNotif' => $orderClosedNotif,
        ]);
    }
    public function viewSpk()
    {
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace
        $id_technician = Auth::user()->technician->id_technician;
        // $spks = Auth::User()->warehouse->store->order->query();
        $spks = order::query()->where('id_technician', $id_technician);
        $status = Auth::User()->technician->order->groupBy('status');
        if (!empty($query)) {
            $spks->where('status', $query);
            // @dd($status);
        }
        $spks = $spks->paginate(10);
        return view(
            'sparepart.technician.listSpkTechnician',
            [
                'spk' => $spks,
                'status' => $status
            ]
        );
    }

    public function viewOrder($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();
        $stocks = stockSparepart::where('id_store', $order->id_store)->with('sparepart.category')->get();
        if ($order->revisi != null) {
            $revision_booked = $order->revisi->booked;
            $order_booked = $order->booked;
            $order_booked = $order->booked;
            $id_stock_values = $order_booked->pluck('id_stock')->toArray();
            $revision = $revision_booked->whereIn('id_stock', $id_stock_values);
            $new = $revision_booked->whereNotIn('id_stock', $id_stock_values);
        }
        $categories = [];
        $stocks->each(function ($stock) use (&$categories) {
            $category = $stock->sparepart->category;
            if ($category) {
                $categories[] = $category;
            }
        });
        $categories = new Collection($categories);
        $categories = $categories->unique('id');
        return view('sparepart.technician.returTechnician', [
            'order' => $order,
            'stocks' => $stocks,
            'category' => $categories,
            'revision' => isset($revision) ? $revision : null,
            'new' => isset($new) ? $new : null,

            // 'return' => $return,
        ]);
    }

    public function createRequestTools($id_store)
    {
        $store = storeSparepart::all()->where('id_store', $id_store)->first();
        $tools = tools::all()->where('id_store', $id_store);
        $user   = auth()->user();
        return view('sparepart.technician.formRequestTools', [
            'store' => $store,
            'tools' => $tools,
            'user' => $user,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\booked;
use App\Models\order;
use App\Models\revisi;
use App\Models\stockSparepart;
use App\Models\technician;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class technicianController extends Controller
{
    public function viewDashboard()
    {
        return view(
            'sparepart.technician.dashboardTechnician'
        );
    }
    public function viewSpk()
    {
        $spks = Auth::User()->technician->first()->order;
        return view(
            'sparepart.technician.listSpkTechnician',
            [
                'spk' => $spks,
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
}

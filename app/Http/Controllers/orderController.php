<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\booked;
use App\Models\stockSparepart;
use Faker\Factory as Faker;
use Carbon\Carbon;

class orderController extends Controller
{
    public function updateSales($id_order, Request $request)
    {
        $validated =  $request->validate([
            'do-memo' => 'required',
            'no-do-memo' => 'required',
            'no-spk' => 'required',
        ]);
        $order = order::where('id_order', $id_order)->firstOrFail();
        if ($validated['do-memo'] == 1) {
            $order->spk_order = $validated['no-spk'];
            $order->do_order = $validated['no-do-memo'];
            if ($order->memo_order && $order->revisi) {
                $order->revisi->do_order = $validated['no-do-memo'];
            }
        } elseif ($validated['do-memo'] == 2) {
            $order->spk_order = $validated['no-spk'];
            $order->memo_order = $validated['no-do-memo'];
        };
        $order->status = 'on-warehouse';
        $order->save();

        return redirect()->back()->with('success', 'DO/MEMO DO berhasil di simpan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_layanan' => 'required',
            'id_customer' => 'required',
            'id_sales' => 'required',
            'id_store' => 'required',
            'date' => 'required',
            'stocks' => 'required',
            'qty' => 'required',
        ]);

        foreach ($validated['qty'] as  $qty) {
            if ($qty <= 0) {
                return redirect()->back()->with('error', 'Qty Barang tidak boleh nol');
            }
        }

        $faker = Faker::create();

        $order = new order;
        $order->id_order = $faker->numberBetween(000, 999);
        $order->id_customer = $validated['id_customer'];
        $order->id_sales = $validated['id_sales'];
        $order->id_store = $validated['id_store'];
        $order->date_order = $validated['date'];
        $order->jenis_layanan = $validated['jenis_layanan'];
        $order->status = NULL;
        $order->save();

        $bookings = [];
        $stocks = [];
        foreach ($validated['stocks'] as $key => $stock) {
            $booking = new booked();
            $booking->id_order = $order->id_order;
            $booking->id_stock = $stock;
            $booking->id_booked = $stock . '-' . $order->id_order . '-' . $validated['date'];
            $booking->qty_booked = $validated['qty'][$key];
    
            $stock = stockSparepart::where('id_stock',$stock)->firstOrFail();
            if($stock->qty_stock >= $validated['qty'][$key]){
                $stock->qty_stock -= $validated['qty'][$key];
                $bookings[] = $booking;
                $stocks[] = $stock;
            }
            else return redirect()->back()->with('error', 'Stock tidak menucukupi jumlah order');
        }
        foreach ($bookings as $key => $booking) {
            $booking->save();
            $stocks[$key]->save();
        }

        return redirect('sales/sparepart/order');
    }

    public function checkStatus()
    {
        $orders = order::all()->where('status', NULL);
        $now = Carbon::now()->addDays(3);
        foreach ($orders as $order) {
            if (($now->diffInDays($order->date_order) > 3) &&
                ($now > $order->date_order)
            ) {
                $order->status = 'canceled';
                $order->save();
            };
        }
    }
}

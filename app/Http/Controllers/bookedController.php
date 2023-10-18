<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booked;
use App\Models\order;
use Faker\Factory as Faker;

class bookedController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'jenis_layanan'=>'required',
            'id_customer'=>'required',
            'id_sales'=>'required',
            'id_store'=>'required',
            'date'=>'required',
            'stocks'=>'required',
            'qty'=>'required',
        ]);

        foreach ($validated['qty'] as  $qty) {
            if ($qty <= 0){
                return redirect()->back()->with('error','Qty Barang tidak boleh nol');
            }
        }

        // 'id_order',
        // 'id_customer',
        // 'id_store',
        // 'id_sales',
        // 'id_technician',
        // 'memo_order',
        // 'do_order',
        // 'spk_order',
        // 'date_order',
        // 'jenis_layanan',
        // 'status',

        $faker = Faker::create();
    
        $order = new order;
        $order->id_order = $faker->numberBetween(000,999);
        $order->id_customer = $validated['id_customer'];
        $order->id_sales = $validated['id_sales'];
        $order->id_store = $validated['id_store'];
        $order->date_order = $validated['date'];
        $order->jenis_layanan = $validated['jenis_layanan'];
        $order->status = 'on-progress';
        $order->save();


        foreach ($validated['stocks'] as $key => $stock) {
            $booking = new booked();
            $booking->id_order = $order->id_order;
            $booking->id_stock = $stock;
            $booking->id_booked = $stock.'-'.$order->id_order.'-'.$validated['date'];
            $booking->qty_booked = $validated['qty'][$key];
            $booking->save();
        }

        return redirect('sales/sparepart/order');
    }
}

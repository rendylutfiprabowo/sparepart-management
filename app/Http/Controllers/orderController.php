<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\booked;
use Faker\Factory as Faker;

class orderController extends Controller
{
    public function update($id_order,Request $request){
        $validated =  $request->validate([
            'do-memo'=>'required',
            'no-do-memo'=>'required',
            'no-spk'=>'sometimes',
        ]);
        // 'memo_order',
        // 'do_order',
        // 'spk_order',
        $order = order::where('id_order',$id_order)->firstOrFail();
        if($validated['do-memo']==1){
            $order->spk_order = $validated['no-spk'];
            $order->do_order = $validated['no-do-memo'];
        }
        else{
            $order->memo_order = $validated['no-do-memo'];
        };
        $order->save();

        return redirect()->back()->with('success','DO/MEMO DO berhasil di simpan');
    }

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booked;
use App\Models\order;
use Faker\Factory as Faker;

class bookedController extends Controller
{
    public function store($id_order, Request $request){
        $validated = $request->validate([
            'stock'=>'required',
            'qty'=>'required|numeric|min:1'
        ]);
        $order = order::where('id_order',$id_order)->firstOrFail();

        $booking = new booked();
        $booking->id_order = $id_order;
        $booking->id_stock = $validated['stock'];
        $booking->id_booked = $validated['stock'].'-'.$id_order.'-'.$order->date_order;
        $booking->qty_booked = $validated['qty'];
        $booking->save();

        return redirect()->back()->with('success','item berhasil ditambahkan');
    }
    public function remove($id_booked){
        $booked = booked::where('id_booked',$id_booked)->firstOrFail();
        $booked->delete();

        return redirect()->back()->with('success','item berhasil dihapus');
    }
}

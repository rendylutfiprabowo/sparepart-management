<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booked;

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
       foreach ($validated['stocks'] as $key => $stock) {
            $booking = new booked();
            $booking->id_stock = $stock;
            $booking->id_booked = $stock.'-'.$validated['id_customer'].'-'.$validated['date'];
            $booking->jenis_layanan = $validated['jenis_layanan'];
            $booking->id_customer = $validated['id_customer'];
            $booking->qty_booked = $validated['qty'][$key];
            $booking->status_booked = "on_progress";
            $booking->date = $validated['date'];
            $booking->save();
       }
       return redirect('sales/sparepart/order');
    }
}

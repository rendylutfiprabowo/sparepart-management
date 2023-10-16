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
            // 'id_booked',
            // 'id_stock',
            // 'jenis_layanan',
            // 'id_customer',
            // 'qty_booked',
            // 'status_booked',
            $booking = new booked();
            $booking->id_stock = $stock;
            $booking->jenis_layanan = $validated['jenis_layanan'];
            $booking->id_customer = $validated['id_customer'];
            $booking->qty = $validated['qty_booked'];
            $booking->qty = $validated['qty_booked'];
       }
        

    }
}

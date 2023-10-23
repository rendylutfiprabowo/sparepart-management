<?php

namespace App\Http\Controllers;

use App\Models\booked;
use App\Models\order;
use App\Models\revisi;
use App\Models\stockSparepart;
use App\Models\technician;
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
        $stocks = stockSparepart::all();
        return view('sparepart.technician.returTechnician', [
            'order' => $order,
            'stocks' => $stocks
        ]);
    }
    public function returnOrder($id_order, Request $request)
    {
        $validatedData = $request->validate([
            'qty_booked' => 'sometimes',
            'stock' => 'sometimes',
            'qty' => 'sometimes',
            'id_stock' => 'required',
            'id_technician' => 'required',
        ]);
        $orders = order::all()->where('id_order', $id_order)->first();
        $uuid = Str::uuid();
        $uuidWithSlashes = str_replace('-', '/', $uuid);
        $rev = 'REV/' . $uuidWithSlashes . '/' . date('Ymd');
        $rev = strtoupper($rev);
        $book = 'BOOKED/';
        $uuids = strtoupper($uuidWithSlashes);
        $book = strtoupper($book);
        $condition1 = false;
        $condition2 = false;
        if (isset($validatedData['stock'])) $condition2 = true;

        foreach ($validatedData['qty_booked'] as $qty) {
            if ($qty != 0) $condition1 = true;
        }

        if ($condition1 or $condition2) {
            $revisi = new revisi();
            $revisi->id_technician = $validatedData['id_technician'];
            $revisi->id_order = $id_order;
            $revisi->id_revisi = $rev;
            $revisi->status = 'On-Progres';

            $revisi->save();

            if ($condition1) {
                foreach ($validatedData['qty_booked'] as $no => $qty) {
                    if ($qty != 0) {
                        $booked = new booked();
                        $booked->qty_booked = $qty;
                        $booked->id_stock = $validatedData['id_stock'][$no];
                        $booked->id_booked = $book . Str::uuid() . '/' . date('Ymd');
                        $booked->id_revisi = $rev;

                        $booked->save();
                    }
                }
            }
            if ($condition2) {
                foreach ($validatedData['qty'] as $no => $qty) {
                    if ($qty != 0) {
                        $booked = new booked();
                        $booked->qty_booked = $qty;
                        $booked->id_stock = $validatedData['stock'][$no];
                        $booked->id_booked = $book . Str::uuid() . '/' . date('Ymd');
                        $booked->id_revisi = $rev;

                        $booked->save();
                    }
                }
            }
        }

        return redirect('/technician/listspk');
    }
}

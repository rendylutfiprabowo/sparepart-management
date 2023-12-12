<?php

namespace App\Http\Controllers;

use App\Models\booked;
use App\Models\revisi;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\stockSparepart;
use Illuminate\Support\Str;

class revisionController extends Controller
{
    public function update($id_order, Request $request)
    {
        $validated = $request->validate([
            'no-do-memo' => 'required',
        ]);
        $revisi = order::where('id_order', $id_order)->firstOrFail()->revisi;
        if ($revisi->order->do_order) {
            $revisi->do_order = $validated['no-do-memo'];
            $revisi->status = TRUE;
            $revisi->order->status = 'closed';
            $revisi->order->save();
        } elseif ($revisi->order->memo_order) {
            $revisi->memo_order = $validated['no-do-memo'];
            $revisi->status = FALSE;
            $revisi->order->status = 'closed-memo-do-revisi';
            $revisi->order->save();
        }
        $revisi->save();

        return redirect('sales/sparepart/revision/' . $id_order)->with('success', 'no DO/MEMO DO berhasil ditambahkan');
    }

    public function returnOrder($id_order, Request $request)
    {
        $validatedData = $request->validate([
            'qty_booked' => 'sometimes',
            'stocks' => 'sometimes',
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
        if (isset($validatedData['stocks'])) $condition2 = true;

        foreach ($validatedData['qty_booked'] as $qty) {
            if ($qty != 0) $condition1 = true;
        }

        if ($condition1 or $condition2) {
            $revisi = new revisi();
            $revisi->id_technician = $validatedData['id_technician'];
            $revisi->id_order = $id_order;
            $revisi->id_revisi = $rev;
            $revisi->status = false;


            $revisi->save();
            $revisi->order->status = 'revisi';
            $revisi->order->save();
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
                        $booked->id_stock = $validatedData['stocks'][$no];
                        $booked->id_booked = $book . Str::uuid() . '/' . date('Ymd');
                        $booked->id_revisi = $rev;
                        $booked->save();
                    }
                }
            }
        } else {
            if ($orders->do_order != NULL) {

                $orders->status = 'closed';
                $orders->save();
            } elseif ($orders->memo_order != NULL) {
                $orders->status = 'memo-closed';
                $orders->save();
            }
        }

        return redirect('/technician/listspk');
    }

    public function storeItemBranch($id_order)
    {
        $order = Order::where('id_order', $id_order)->first();

        // Mendapatkan data revisi dan pesanan
        $revision_booked = $order->revisi->booked;
        $order_booked = $order->booked;

        // Mendapatkan nilai ID stok dari pesanan
        $id_stock_values = $order_booked->pluck('id_stock')->toArray();

        // Mendapatkan data revisi berdasarkan ID stok dari pesanan
        $revision = $revision_booked->whereIn('id_stock', $id_stock_values);

        // Menambahkan stok untuk setiap ID stok
        foreach ($revision as $revisionItem) {
            $id_stock = $revisionItem->id_stock;
            $returStock = $revisionItem->qty_booked;
            // Menggunakan model Stock untuk menambahkan stok
            $stock = stockSparepart::where('id_stock', $id_stock)->firstOrFail();
            if ($stock) {
                $stock->qty_stock += $returStock;
                $stock->save();
            }
        }
        return redirect('/warehouse/branch/detailReturItem/' . $id_order)->with('success', 'Berhasil mengembalikan Item');
    }
}

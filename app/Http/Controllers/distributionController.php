<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\customer;
use App\Models\sparepart;
use App\Models\distribution;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class distributionController extends Controller
{
    public function reqDistribution($id_store)
    {
        $store = stockSparepart::all()->where('id_store', $id_store)->first();
        $stocks = stockSparepart::where('id_store', $id_store)->with('sparepart.category')->get();
        $categories = [];
        $stocks->each(function ($stock) use (&$categories) {
            $category = $stock->sparepart->category;
            if ($category) {
                $categories[] = $category;
            }
        });
        $categories = new Collection($categories);
        $categories = $categories->unique('id');

        $customers = customer::all();
        $now = Carbon::now();
        return view('sparepart.branch.formDistribution', [
            'customers' => $customers,
            'categories' => $categories,
            'store' => $store,
            'stocks' => $stocks,
            'now' => $now,
        ]);
    }

    public function storeDistribution(Request $request)
    {
        $validated = $request->validate([
            'order_date' => 'required',
            'stocks' => 'required',
            'qty' => 'required',
        ]);
        $uuid = Str::uuid();
        $randomNumber = rand(10000, 999999);

        // Ambil data toko yang terkait dengan pengguna yang login
        foreach ($validated['stocks'] as $key => $stockId) {
            $sparepart = stockSparepart::with('sparepart')->where('id_stock', $stockId)->firstOrFail();
            $id_sparepart = $sparepart->id_sparepart;
            $store = Auth::user()->warehouse->store->stock->where('id_sparepart', $id_sparepart)->first();
            // @dd($store->id_stock);
            // @dd($store);

            if ($store == null) {
                // ID stock tidak ditemukan dalam toko pengguna yang login
                // Buat data stok dan suku cadang baru
                $newStock = new stocksparepart();
                $newStock->id_stock = 'STK-' . $randomNumber;
                $newStock->id_sparepart = $id_sparepart;
                $newStock->qty_stock = $validated['qty'][$key];
                $newStock->id_store = Auth::user()->warehouse->store->id_store;
                $newStock->safety_stock = 10;
                $newStock->qty_stock = 0;
                $newStock->save();

                // Buat suku cadang baru dengan data toko yang sesuai
                $newSparepart = new sparepart();
                $newSparepart->id_category = $sparepart->sparepart->id_category;
                $newSparepart->codematerial_sparepart = $sparepart->sparepart->codematerial_sparepart;
                $newSparepart->spesifikasi_sparepart = $sparepart->sparepart->spesifikasi_sparepart;
                $newSparepart->satuan = $sparepart->sparepart->satuan;
                $newSparepart->save();

                // Lanjutkan dengan pembuatan pesanan distribusi dengan stok dan suku cadang yang baru dibuat
                $distribution = new distribution();
                $distribution->id_distribution = $uuid;
                $distribution->id_stock = $newStock->id_stock;
                $distribution->qty_distribution = $validated['qty'][$key];
                $distribution->order_date = $validated['order_date'];
                $distribution->status = 'waiting for approval';
                $distribution->save();
            } else {
                $distribution = new distribution();
                $distribution->id_distribution = $uuid;
                $distribution->id_stock = $store->id_stock;
                $distribution->qty_distribution = $validated['qty'][$key];
                $distribution->order_date = $validated['order_date'];
                $distribution->status = 'waiting for approval';
                $distribution->save();
            }
        }
        return redirect('/warehouse/branch/request-item');
    }

    public function approvalCenter(Request $request, $id_distribution)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        $approv = distribution::where('id_distribution', $id_distribution)->firstOrFail();
        $approv->status = $validatedData['status'];
        $approv->save();

        session()->flash('success', 'Approval Berhasil');
        return redirect('/warehouse/distribution');
    }
    public function approvalBranch(Request $request, $id_distribution)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        $approv = distribution::where('id_distribution', $id_distribution)->firstOrFail();
        $approv->status = $validatedData['status'];
        $approv->save();

        session()->flash('success', 'Approval Berhasil');
        return redirect('/warehouse/branch/request-item');
    }
}

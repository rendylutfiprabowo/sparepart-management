<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\project;
use App\Models\reportSample;
use App\Models\sales;
use App\Models\sample;
use App\Models\order;
use App\Models\solab;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class salesController extends Controller
{
    // ================ OIL LAB ============================
    public function indexOil()
    {
        return view('crm.sales.oilab.indexOil');
    }

    public function historyOil()
    {
        return view('crm.sales.oilab.historyOil');
    }

    public function salesOrderOil()
    {

        $salesorderoil = solab::all()->whereNotNull('id_project');
        return view('crm.sales.oilab.salesOrderOil', compact('salesorderoil'));
    }

    public function createSalesOrderOil()
    {
        $customers = customer::all();
        $sales = sales::find('1');
        // dd($sales);
        return view('crm.sales.oilab.formSalesOrderOil', compact('customers', 'sales'));
    }

    public function storeformsales()
    {
    }

    public function reportOil()
    {
        $salesorderoil = solab::all()->whereNotNull('id_project');
        $sample = sample::all();
        return view('crm.sales.oilab.reportOil', compact('salesorderoil', 'sample'));
    }

    public function sampleOil()
    {
        $salesorderoil = solab::all()->whereNotNull('id_project');
        $sample = sample::all();
        $reportSample = reportSample::all();
        // dd($reportSample);
        return view('crm.sales.oilab.sampleOil', compact('salesorderoil', 'sample', 'reportSample'));
    }

    public function detailHistoryOil()
    {
        return view('crm.sales.oilab.detailHistoryOil');
    }

    // ================ SPAREPARTS ============================

    public function indexSparepart()
    {
        return view('crm.sales.sparepart.indexSparepart');
    }

    public function stockSparepart()
    {
        $stocks = stockSparepart::with('sparepart', 'store_sparepart')->get();

        return view('crm.sales.sparepart.stockSparepart', [
            'stocks' => $stocks,
        ]);
    }
    public function orderSparepart()
    {
        $orders = order::all();
        foreach ($orders as $order) {
            if (isset($order->date)) {
                $order->date_order = Carbon::create($order->date_order);
            }
        }
        $now = Carbon::now();
        $now = $now->addDays(3);
        return view('crm.sales.sparepart.orderSparepart', [
            'orders' => $orders,
            'now' => $now
        ]);
    }
    public function selectStore()
    {
        $stores = storeSparepart::all();
        return view('crm.sales.sparepart.selectStore', [
            'stores' => $stores,
        ]);
    }
    public function createOrderSparepart($id_store)
    {
        $store = storeSparepart::all()->where('id_store', $id_store)->first();
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
        return view('crm.sales.sparepart.formOrderSparepart', [
            'customers' => $customers,
            'category' => $categories,
            'store' => $store,
            'stocks' => $stocks,
            'now' => $now,
        ]);
    }


    public function detailOrderSparepart($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();
        $id_store = $order->id_store;
        $stocks = $order->store->stock;
        $spareparts = stockSparepart::where('id_store', $id_store)->with('sparepart.category')->get();
        $categories = [];
        $spareparts->each(function ($stock) use (&$categories) {
            $category = $stock->sparepart->category;
            if ($category) {
                $categories[] = $category;
            }
        });
        $categories= new Collection($categories);
        $categories = $categories->unique('id');
        $type = ($order->do_order) ? 'DO' : (($order->memo_order) ? 'MEMO' : NULL);
        return view('crm.sales.sparepart.detailOrderSparepart', [
            'order' => $order,
            'stocks' => $stocks,
            'type' => $type,
            'category'=>$categories
        ]);
    }

    public function revisionSparepart()
    {
        $orders = order::has('revisi')->get();
        return view('crm.sales.sparepart.revisionSparepart',[
            'orders' => $orders,
        ]);
    }
    public function detailRevisionSparepart($id_order)
    {
        $order = order::all()->where('id_order',$id_order)->first();

        $revision_booked = $order->revisi->booked;
        $order_booked = $order->booked;

        $id_stock_values = $order_booked->pluck('id_stock')->toArray();

        $revision = $revision_booked->whereIn('id_stock', $id_stock_values);
        $new = $revision_booked->whereNotIn('id_stock', $id_stock_values);

        $type = NULL;
        if ($order->revisi->memo_order) $type = 'MEMO';
        if ($order->revisi->do_order) $type = 'DO';

        return view('crm.sales.sparepart.detailRevisionSparepart',[
            'order'=>$order,
            'revision'=>$revision,
            'new'=>$new,
            'type'=>$type
        ]);
    }

    // ================ DASHBOARD SALES CRM =======================

    public function dashboardSalesCrm()
    {
        // GET ALL DATA PROJECTS
        $dataProjects = project::all();
        return view('crm.sales.dashboard.salesIndexCrm', compact('dataProjects'));
    }

    // ====================== CUSTOMER =============================

    public function dashboardCustomerCrm()
    {
        // GET ALL DATA CUSTOMERS
        $dataCust = customer::all();
        return view('crm.sales.customer.salesIndexCustomer', compact('dataCust'));
    }

    // Detail Customer
    public function detailCustomer($id_customer)
    {
        $dataCust = customer::where('id_customer', $id_customer)->first();
        if ($dataCust) {
            return view('crm.sales.customer.customerDetails', compact('dataCust'));
        } else {
            return redirect()->route('crm.sales.customer.customerDetails')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    // Tambahkan Customer
    public function addCust(Request $request)
    {
        $customers = $request->validate([
            'id_customer' => 'required',
            'nama_customer' => 'required',
            'phone_customer' => 'required',
            'email_customer' => 'required',
            'jenisusaha_customer' => 'required',
        ]);

        $customers = new customer();
        $customers->id_customer = $request->input('id_customer');
        $customers->nama_customer = $request->input('nama_customer');
        $customers->phone_customer = $request->input('phone_customer');
        $customers->email_customer = $request->input('email_customer');
        $customers->jenisusaha_customer = $request->input('jenisusaha_customer');

        $customers->save();

        return redirect('sales/customer/salesIndexCustomer')->with('status', 'Data Customer Berhasil Ditambahkan !');
    }

    // EMAILS

    public function emails()
    {
        return view('crm.sales.emails.indexEmails');
    }
}

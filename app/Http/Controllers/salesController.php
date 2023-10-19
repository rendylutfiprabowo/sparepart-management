<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\project;
use App\Models\reportSample;
use App\Models\sales;
use App\Models\sample;
use App\Models\order;
use App\Models\solab;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use App\Models\storeSparepart;
use Illuminate\Support\Facades\DB;

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
            if(isset($order->date)){
                $order->date_order = Carbon::create($order->date_order);
            }
        }
        $now = Carbon::now();
        $now = $now->addDays(3);
        return view('crm.sales.sparepart.orderSparepart',[
            'orders'=> $orders,
            'now'=>$now
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
        $stocks = stockSparepart::all()->where('id_store', $id_store);
        $customers = customer::all();
        $now = Carbon::now();
        return view('crm.sales.sparepart.formOrderSparepart',[
            'customers'=>$customers,
            'store'=>$store,
            'stocks'=>$stocks,
            'now'=>$now,
        ]);
    }

    
    public function detailOrderSparepart($id_order)
    {
        $order = order::all()->where('id_order',$id_order)->first();
        $stocks = $order->store->stock;
        $type = ($order->spk_order)?'DO':(($order->memo_order)?'MEMO':NULL);
        return view('crm.sales.sparepart.detailOrderSparepart',[
            'order'=>$order,
            'stocks'=>$stocks,
            'type'=>$type
        ]);
    }
    public function revisionSparepart()
    {
        return view('crm.sales.sparepart.revisionSparepart');
    }
    public function detailRevisionSparepart()
    {
        return view('crm.sales.sparepart.detailRevisionSparepart');
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

    public function showCust($id)
    {
        $dataCust = customer::find($id);
        return view('crm.sales.customer.salesIndexCustomer', ['dataCust' => $dataCust]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\sales;
use App\Models\sample;
use App\Models\solab;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use Illuminate\Support\Facades\DB;

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
        return view('crm.sales.oilab.sampleOil', compact('salesorderoil', 'sample'));
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
        return view('crm.sales.sparepart.orderSparepart');
    }
    public function createOrderSparepart()
    {
        return view('crm.sales.sparepart.formsOrderSparepart');
    }
    public function detailOrderSparepart()
    {
        return view('crm.sales.sparepart.detailOrderSparepart');
    }
    public function revisionSparepart()
    {
        return view('crm.sales.sparepart.revisionSparepart');
    }
    public function detailRevisionSparepart()
    {
        return view('crm.sales.sparepart.detailRevisionSparepart');
    }

    // ================ DASHBOARD SALES CRM ============================

    public function dashboardSalesCrm()
    {
        return view('crm.sales.dashboard.salesIndexCrm');
    }
}

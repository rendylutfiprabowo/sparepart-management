<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\sales;
use App\Models\solab;
use Illuminate\Http\Request;
use App\Models\stockSparepart;
use Illuminate\Support\Facades\DB;

class salesController extends Controller
{
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
        // dd($salesorderoil);

        $salesorderoil = solab::all()->whereNotNull('id_project');
        // dd($salesorderoil);
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
        return view('crm.sales.oilab.reportOil');
    }

    public function sampleOil()
    {
        return view('crm.sales.oilab.sampleOil');
    }

    public function detailHistoryOil()
    {
        return view('crm.sales.oilab.detailHistoryOil');
    }

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class salesController extends Controller
{
    public function indexOil(){
        return view('crm.sales.indexOil');
    }
    public function historyOil(){
        return view('crm.sales.historyOil');
    }
    public function salesOrderOil(){
        return view('crm.sales.salesOrderOil');
    }
    public function createSalesOrderOil(){
        return view('crm.sales.formSalesOrderOil');
    }
    public function reportOil(){
        return view('crm.sales.reportOil');
    }
    public function sampleOil(){
        return view('crm.sales.sampleOil');
    }
    public function detailHistoryOil(){
        return view('crm.sales.detailHistoryOil');
    }
}

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
use App\Models\history;
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
        $dataOilCustomers = solab::all();
        $totalDGA = sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 220); // DGA
        })->count();
        $totalFuran = sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 842); // FURAN
        })->count();
        $totalOA = sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 399); //OA
        })->count();

        return view('crm.sales.oilab.indexOil', compact('dataOilCustomers', 'totalDGA', 'totalFuran', 'totalOA'));
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
    public function detailSalesOrderOil($id_project)
    {


        $project = project::where('id_project', $id_project)->firstOrFail();
        $salesorderoil = $project->solab;
        return view('crm.sales.oilab.detailSalesOrderOil', compact('salesorderoil', 'project'));
    }
    public function addScopeSalesOrderOil($id_project, $id_history)
    {
        $project = project::where('id_project', $id_project)->firstOrFail();
        $history = history::where('id', $id_history)->firstOrFail();
        return view('crm.sales.oilab.addScopeSalesOrderOil', compact('history', 'project'));
    }

    public function createSalesOrderOil()
    {
        $customers = customer::all();
        $sales = auth()->user()->sales;
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
        $histories = history::all();
        $sample = sample::all();
        // $reportSample = reportSample::all();
        // dd($reportSample);
        return view('crm.sales.oilab.sampleOil', compact('salesorderoil', 'sample', 'histories'));
    }

    public function detailHistoryOil()
    {
        return view('crm.sales.oilab.detailHistoryOil');
    }

    // ================ SPAREPARTS ============================

    public function indexSparepart()
    {
        $dataOrder = order::all();
        $dataStock = stockSparepart::count();
        return view('crm.sales.sparepart.indexSparepart', compact('dataStock', 'dataOrder'));
    }

    public function stockSparepart()
    {
        $stores = storeSparepart::all();
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace

        $stocks = stockSparepart::with('sparepart', 'store_sparepart');

        if (!empty($query)) {
            $stocks->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->whereHas('sparepart', function ($subQuery) use ($query) {
                        $subQuery->where('codematerial_sparepart', 'like', '%' . $query . '%')
                            ->orWhere('spesifikasi_sparepart', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('sparepart.category', function ($subQuery) use ($query) {
                        $subQuery->where('nama_category', 'like', '%' . $query . '%');
                    });
            });
        }
        $stocks = $stocks->paginate(10);

        return view('crm.sales.sparepart.stockSparepart', [
            'stocks' => $stocks,
            'stores' => $stores,
        ]);
    }

    public function stockSparepartStore($id_store)
    {
        $stores = storeSparepart::all();
        $query = request()->input('search');
        $query = trim($query); // Remove leading/trailing whitespace

        $stocks = stockSparepart::with('sparepart', 'store_sparepart')->where('id_store', $id_store);

        if (!empty($query)) {
            $stocks->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->whereHas('sparepart', function ($subQuery) use ($query) {
                        $subQuery->where('codematerial_sparepart', 'like', '%' . $query . '%')
                            ->orWhere('spesifikasi_sparepart', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('sparepart.category', function ($subQuery) use ($query) {
                        $subQuery->where('nama_category', 'like', '%' . $query . '%');
                    });
            });
        }
        $stocks = $stocks->paginate(10);

        return view('crm.sales.sparepart.stockSparepart', [
            'stocks' => $stocks,
            'stores' => $stores,
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
            'categories' => $categories,
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
        $categories = new Collection($categories);
        $categories = $categories->unique('id');
        $type = ($order->do_order) ? 'DO' : (($order->memo_order) ? 'MEMO' : NULL);
        return view('crm.sales.sparepart.detailOrderSparepart', [
            'order' => $order,
            'stocks' => $stocks,
            'type' => $type,
            'category' => $categories
        ]);
    }

    public function revisionSparepart()
    {
        $orders = order::has('revisi')->get();
        return view('crm.sales.sparepart.revisionSparepart', [
            'orders' => $orders,
        ]);
    }
    public function detailRevisionSparepart($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();

        $revision_booked = $order->revisi->booked;
        $order_booked = $order->booked;

        $id_stock_values = $order_booked->pluck('id_stock')->toArray();

        $revision = $revision_booked->whereIn('id_stock', $id_stock_values);
        $new = $revision_booked->whereNotIn('id_stock', $id_stock_values);

        $type = NULL;
        if ($order->revisi->do_order) $type = 'DO';
        elseif ($order->revisi->memo_order) $type = 'MEMO';

        return view('crm.sales.sparepart.detailRevisionSparepart', [
            'order' => $order,
            'revision' => $revision,
            'new' => $new,
            'type' => $type
        ]);
    }

    // ================ DASHBOARD SALES CRM =======================

    public function dashboardSalesCrm()
    {
        $customersTotal = customer::count();
        $projectsTotal = project::count();
        $salesData = sales::all();
        $orderSpareparts = order::all();
        $totalOrderSP = order::count();

        // Calculations for charts
        $divideNumber = 1000;
        $percentageCustomers = ($customersTotal / $divideNumber) * 100;
        $percentageProjects = ($projectsTotal / $divideNumber) * 100;
        $percentageSales = $percentageCustomers + $percentageProjects;

        return view('crm.sales.dashboard.salesIndexCrm', compact(
            'customersTotal',
            'projectsTotal',
            'totalOrderSP',
            'salesData',
            'percentageSales',
            'percentageCustomers',
            'percentageProjects',
        ));
    }

    // ====================== CUSTOMER =============================

    public function dashboardCustomerCrm()
    {
        // GET ALL DATA CUSTOMERS
        $dataCust = customer::paginate(10);
        return view('crm.sales.customer.salesIndexCustomer', compact('dataCust'));
    }

    // GET BY ID CUSTOMERS
    public function detailCustomer($id_customer)
    {
        $dataCust = customer::where('id_customer', $id_customer)->first();
        if ($dataCust) {
            return view('crm.sales.customer.customerDetails', compact('dataCust'));
        } else {
            return redirect()->route('crm.sales.customer.customerDetails')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    // ADD CUSTOMERS
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



        return redirect('sales/customer')->with('status', 'Data Customer Berhasil Ditambahkan !');
    }

    // ====================== CHANNEL =============================
    public function channelsIndex()
    {
        return view('crm.sales.channels.indexChannels');
    }

    // SearchStokSpareParts
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = stockSparepart::where('name', 'like', "%$search%")->get();
        return view('products.index', compact('products'));
    }

    // SearchCustomers
    public function searchCustomer(Request $request)
    {
        $keyword = $request->input('keyword');

        // Lakukan pencarian berdasarkan keyword di sini, contoh:
        $dataCust = customer::where('nama_customer', 'like', "%$keyword%")
            ->paginate(10);

        return view('crm.sales.customer.salesIndexCustomer', compact('dataCust', 'keyword'));
    }


    // ====================== REPORTS =============================
    public function reportsCrm()
    {
        return view('crm.sales.reports.indexReports');
    }
}

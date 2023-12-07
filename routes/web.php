<?php

use App\Http\Controllers\pdfController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\toolsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\bookedController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\itemtestController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\warehouseController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\solabController;
use App\Http\Controllers\labController;
use App\Http\Controllers\modlabController;
use App\Http\Controllers\adminlabController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\technicianController;
use App\Http\Controllers\revisionController;
use App\Http\Controllers\superadminController;
use App\Http\Controllers\sampleContoller;
use App\Http\Controllers\distributionController;
use App\Models\tools;
use App\Models\booked;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// role sales

Auth::routes();
Route::get('/', [loginController::class, 'home']);
Route::get('/test', [loginController::class, 'test']);
Route::get('/home', [loginController::class, 'home']);
Route::post('/login', [loginController::class, 'verifyLogin']);
Route::post('/logout', [loginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/get/stock/{id_category}/{id_store}', [categoryController::class, 'getStock']);
});

//Role Superadmin
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [superadminController::class, 'dashboard'])->name('dashboardSuperadmin');
    Route::get('/superadmin/createaccount', [superadminController::class, 'createaccount'])->name('createaccountSuperadmin');
});

//Role Sales
Route::middleware(['auth', 'sales'])->group(function () {
    // Dashboard Sales CRM
    Route::get('/sales/dashboard', [salesController::class, 'dashboardSalesCrm']);
    // Dashboard Sales Customer CRM
    Route::get('/sales/customer', [salesController::class, 'dashboardCustomerCrm']);
    Route::post('/sales/customer', [salesController::class, 'addCust'])->name('addCust');
    Route::get('/sales/customer/{id}', [salesController::class, 'detailCustomer'])->name('detailCustomer');
    Route::get('/sales/customer/{id_customer}/trafo/{id_trafo}', [salesController::class, 'detailTrafo'])->name('detailCustomer');
    Route::get('/sales/customer', [salesController::class, 'searchCustomer'])->name('searchCustomer');

    //Oilab sales
    Route::get('/sales/oil/index', [salesController::class, 'indexOil']);
    Route::get('/sales/oil/salesorder', [salesController::class, 'salesOrderOil']);
    Route::get('/sales/oil/salesorder/add', [salesController::class, 'createSalesOrderOil']);
    Route::post('/sales/oil/salesorder/add', [solabController::class, 'store']);
    Route::get('/sales/oil/salesorder/{id_project}', [salesController::class, 'detailSalesOrderOil']);
    Route::get('/sales/oil/salesorder/{id_project}/{id_history}', [salesController::class, 'addScopeSalesOrderOil']);
    Route::post('/sales/oil/salesorder/{id_project}/{id_history}', [sampleContoller::class, 'store']);
    Route::get('/sales/oil/report', [salesController::class, 'reportOil']);
    Route::get('/sales/oil/sample', [salesController::class, 'sampleOil']);
    Route::get('/sales/oil/history', [salesController::class, 'historyOil']);
    Route::get('/sales/oil/history/{id_trafo}', [salesController::class, 'detailHistoryOil']);
    //Spareparts sales
    Route::get('/sales/sparepart/index', [salesController::class, 'indexSparepart']);
    Route::get('/sales/sparepart/stock', [salesController::class, 'stockSparepart']);
    Route::get('/sales/sparepart/stock/{id_store}', [salesController::class, 'stockSparepartStore']);
    Route::get('/sales/sparepart/order', [salesController::class, 'orderSparepart']);
    Route::get('/sales/sparepart/order/add/{id_store}', [salesController::class, 'createOrderSparepart']);
    Route::get('/sales/sparepart/order/add', [salesController::class, 'selectStore']);
    Route::get('/sales/sparepart/order/{id_order}', [salesController::class, 'detailOrderSparepart']);
    Route::get('/sales/sparepart/order/remove-item/{id_booked}', [bookedController::class, 'remove']);
    Route::post('/sales/sparepart/order/{id_order}/add-item', [bookedController::class, 'store']);
    Route::get('/sales/sparepart/revision', [salesController::class, 'revisionSparepart']);
    Route::get('/sales/sparepart/revision/{id}', [salesController::class, 'detailRevisionSparepart']);
    Route::post('/sales/sparepart/revision/{id}', [revisionController::class, 'update']);
    Route::post('/sales/sparepart/order/add', [orderController::class, 'store']);
    Route::post('/sales/sparepart/order/{id_order}/add-do', [orderController::class, 'updateSales']);
    // Channels Sales
    Route::get('/sales/channels/indexChannels', [salesController::class, 'channelsIndex']);
    // Reports Sales
    Route::get('/sales/reports/indexReports', [salesController::class, 'reportsCrm']);
});
//Role Technician Sparepart
Route::middleware(['auth', 'technician'])->group(function () {
    Route::get('/technician/index', [technicianController::class, 'viewDashboard']);
    Route::get('/technician/listspk', [technicianController::class, 'viewSpk']);
    Route::get('/technician/listspk/{id_order}', [technicianController::class, 'viewOrder']);
    Route::post('/technician/listspk/{id_order}/return', [revisionController::class, 'returnOrder']);
    Route::get('/technician/tools', [toolsController::class, 'viewToolsTechnician']);
    Route::get('/technician/tools/{id_store}', [toolsController::class, 'viewToolsToko']);
    Route::get('/technician/tools/request/add', [toolsController::class, 'selectStore']);
    Route::post('/technician/tools/request/add2', [toolsController::class, 'storeTools']);
    Route::get('/technician/tools/request/add/{id_store}', [technicianController::class, 'createRequestTools']);
    Route::post('/technician/tools/return/{id_tools}', [toolsController::class, 'returnRequest']);
});
//Role Branch Warehouse Sparepart
Route::middleware(['auth', 'warehouse'])->group(function () {
    Route::get('/warehouse/branch/dashboard', [warehouseController::class, 'dashboardWarehouseBranch']);
    Route::get('/warehouse/branch/request-item', [warehouseController::class, 'viewDistribution']);
    Route::get('/warehouse/branch/request-item/{id_store}', [distributionController::class, 'reqDistribution']);
    Route::get('/warehouse/branch/stock', [warehouseController::class, 'viewStockBranchId']);
    Route::get('/warehouse/branch/listspk', [warehouseController::class, 'viewSpkBranch']);
    Route::get('/warehouse/branch/tools', [toolsController::class, 'viewToolsBranchWarehouse']);
    Route::get('/warehouse/view-order/branch/{id_order}', [warehouseController::class, 'viewOrderBranch']);
    Route::post('/warehouse/add-worker/branch/{id_order}', [warehouseController::class, 'addWorkerBranch']);
    Route::get('/warehouse/branch/returItem', [warehouseController::class, 'returItem']);
    Route::get('/warehouse/branch/detailReturItem/{id_order}', [warehouseController::class, 'detailReturItem']);
    Route::post('/warehouse/branch/storeReturn/{id_order}', [revisionController::class, 'storeItemBranch']);
    Route::post('/warehouse/branch/stock/store', [toolsController::class, 'store']);
    Route::post('/warehouse/tools/validasi/{id_tools}', [toolsController::class, 'validasiRequest']);
    Route::post('/warehouse/tools/request-closed/{id_tools}', [toolsController::class, 'closedRequest']);
    Route::post('/warehouse/tools/request-item/distribution', [distributionController::class, 'storeDistribution']);
    Route::post('/warehouse/stock/branch/{id_stock}', [stockController::class, 'addStockBranch']);
    Route::post('/warehouse/branch/stock/safety-stock/{id_stock}', [stockController::class, 'safetyStockBranch']);
    Route::post('/warehouse/branch/distribution/{id_distribution}', [distributionController::class, 'approvalBranch']);
});

//Role Manager Center
Route::middleware(['auth', 'warehouse-center'])->group(function () {
    Route::post('/warehouse/tools/store', [toolsController::class, 'storeCenter']);
    Route::get('/warehouse/dashboard', [warehouseController::class, 'dashboardWarehouse']);
    Route::get('/warehouse/detailReturItem/{id_order}', [warehouseController::class, 'detailReturItemCenter']);
    Route::get('/stock_manager_spareparts', [stockController::class, 'viewStockManager']);
    Route::get('/warehouse/stock', [stockController::class, 'viewStockWarehouse']);
    Route::get('/warehouse/returItem', [warehouseController::class, 'returItemCenter']);
    Route::get('/warehouse/listspk', [warehouseController::class, 'viewSpk']);
    Route::get('/warehouse/view-order/{id_order}', [warehouseController::class, 'viewOrder']);
    Route::post('/warehouse/add-worker/{id_order}', [warehouseController::class, 'addWorker']);
    Route::post('/warehouse/stock/store', [stockController::class, 'store']);
    Route::post('/warehouse/stock/{id_stock}', [stockController::class, 'addStock']);
    Route::post('/warehouse/stock/safety-stock/{id_stock}', [stockController::class, 'safetyStock']);
    Route::get('/warehouse/stock/{id_store}', [stockController::class, 'viewStockWarehouseToko']);
    Route::get('/warehouse/tools', [toolsController::class, 'viewToolsWarehouse']);
    Route::get('/warehouse/distribution', [warehouseController::class, 'viewReqDistribution']);
    Route::get('/warehouse/tools/{id_store}', [toolsController::class, 'viewToolsWarehouseToko']);
    Route::post('/warehouse/distribution/{id_distribution}', [distributionController::class, 'approvalCenter']);
});

Route::middleware(['auth', 'laboil'])->group(function () {
    // role lab
    Route::get('/index_lab', function () {
        return view('oilab.lab.index_lab');
    });
    Route::get('/index_lab', [labController::class, 'index']);

    Route::get('/item_test', function () {
        return view('oilab.lab.item_test');
    });
    Route::get('/item_test', [itemtestController::class, 'notesitem']);
    Route::post('/item_test/add/{id}', [itemtestController::class, 'storenotes']);

    Route::get('/orderlist', function () {
        return view('oilab.lab.order_list');
    });
    Route::get('/order_list1', function () {
        return view('oilab.lab.order_list1');
    });
    Route::get('/orderlist', [labController::class, 'viewOrder']);
    Route::get('/orderlist/{no_so_solab}', [labController::class, 'viewitem']);
    Route::get('/orderlist/{id_solab}/{id_history}/add', [labController::class, 'addtrafo']);
    Route::post('/orderlist/{id_solab}/{id_history}/add', [labController::class, 'storetrafo']);
    Route::get('/orderlist/{id_solab}/{id_sample}', [labController::class, 'formReport']);
    Route::post('/orderlist/{id_solab}/{id_sample}', [reportController::class, 'storeSample']);

    Route::get('/history_lab', function () {
        return view('oilab.lab.history_lab');
    });
    Route::get('/history_lab', [labController::class, 'historyLab']);
    Route::get('/history_lab/{id_trafo}', [labController::class, 'detailhistoryLab']);

    Route::get('/detailhistory_lab', function () {
        return view('oilab.lab.detailhistory_lab');
    });
    Route::get('/form_dga1_lab/{id}', function () {
        return view('oilab.lab.form_dga1_lab');
    });
    Route::get('generate-pdf', [pdfController::class, 'pdf']);
});


Route::middleware(['auth', 'modLab'])->group(function () {
    //role modlab
    Route::get('/index_modlab', function () {
        return view('oilab.lab.index_modlab');
    });

    Route::get('/index_modlab', [modlabController::class, 'index']);

    Route::get('/report_modlab', function () {
        return view('oilab.lab.report_modlab');
    });

    Route::get('/report_modlab', [modlabController::class, 'viewReport2']);

    Route::get('/reviewreport_modlab', function () {
        return view('oilab.lab.reviewreport_modlab');
    });

    Route::get('/history_modlab', function () {
        return view('oilab.lab.history_modlab');
    });
    Route::get('/history_modlab', [modlabController::class, 'historymodlab']);
    Route::get('/history_modlab/{id_trafo}', [modlabController::class, 'detailhistorymodlab']);

    Route::get('/detailhistory_modlab', function () {
        return view('oilab.lab.detailhistory_modlab');
    });

    // Route::get('generate-pdf', [pdfController::class, 'pdf']);
});

Route::middleware(['auth', 'adminLab'])->group(function () {
    //role adminlab
    Route::get('/index_adminlab', function () {
        return view('oilab.lab.index_adminlab');
    });

    Route::get('/index_adminlab', [adminlabController::class, 'index']);

    Route::get('/report_adminlab', function () {
        return view('oilab.lab.report_adminlab');
    });

    Route::get('/report_adminlab', [adminlabController::class, 'viewReport1']);

    Route::get('/history_adminlab', function () {
        return view('oilab.lab.history_adminlab');
    });
    Route::get('/history_adminlab', [adminlabController::class, 'historyadminlab']);
    Route::get('/history_adminlab/{id_trafo}', [adminlabController::class, 'detailhistoryAdminLab']);

    Route::get('/detailhistory_adminlab', function () {
        return view('oilab.lab.detailhistory_adminlab');
    });

    Route::get('/reviewreport_adminlab', function () {
        return view('oilab.lab.reviewreport_adminlab');
    });

    // Route::get('generate-pdf', [pdfController::class, 'pdf']);
});
Route::post('/logout', [loginController::class, 'logout']);
//Logout
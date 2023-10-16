<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\itemtestController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\warehouseController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\solabController;
use App\Http\Controllers\technicianController;
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
Route::get('/home', [loginController::class, 'home']);
Route::post('/login', [loginController::class, 'verifyLogin']);
Route::post('/logout', [loginController::class, 'logout']);

//Role Sales
Route::middleware(['auth', 'sales'])->group(function () {
    // Dashboard Sales CRM
    Route::get('/sales/dashboard/salesIndexCrm', [salesController::class, 'dashboardSalesCrm']);
    // Dashboard Customer CRM
    Route::get('/sales/customer/salesIndexCustomer', [salesController::class, 'dashboardCustomerCrm']);
    //Oilab sales
    Route::get('/sales/oil/index', [salesController::class, 'indexOil']);
    Route::get('/sales/oil/salesorder', [salesController::class, 'salesOrderOil']);
    Route::get('/sales/oil/salesorder/add', [salesController::class, 'createSalesOrderOil']);
    Route::post('/sales/oil/salesorder/add', [solabController::class, 'store']);
    Route::get('/sales/oil/report', [salesController::class, 'reportOil']);
    Route::get('/sales/oil/sample', [salesController::class, 'sampleOil']);
    Route::get('/sales/oil/history', [salesController::class, 'historyOil']);
    Route::get('/sales/oil/history/detail', [salesController::class, 'detailHistoryOil']);
    //Spareparts sales
    Route::get('/sales/sparepart/index', [salesController::class, 'indexSparepart']);
    Route::get('/sales/sparepart/stock', [salesController::class, 'stockSparepart']);
    Route::get('/sales/sparepart/order', [salesController::class, 'orderSparepart']);
    Route::get('/sales/sparepart/order/add/{id_store}', [salesController::class, 'createOrderSparepart']);
    Route::get('/sales/sparepart/order/add', [salesController::class, 'selectStore']);
    Route::get('/sales/sparepart/order/{id}', [salesController::class, 'detailOrderSparepart']);
    Route::get('/sales/sparepart/revision', [salesController::class, 'revisionSparepart']);
    Route::get('/sales/sparepart/revision/{id}', [salesController::class, 'detailRevisionSparepart']);
    Route::post('/sales/sparepart/order/add', [stockController::class, 'store']);
});

//Role Warehouse Sparepart
Route::middleware(['auth', 'warehouse'])->group(function () {
    // Route::get('/warehouse/branch/stock/{id_store}', [warehouseController::class, 'viewStockBranch']);
    Route::get('/warehouse/branch/stock', [warehouseController::class, 'viewStockBranchId']);
});

//Role Manager Sparepart
Route::middleware(['auth', 'warehouse-center'])->group(function () {
    Route::get('/stock_manager_spareparts', [stockController::class, 'viewStockManager']);
    Route::get('/warehouse/dashboard', [warehouseController::class, 'index']);
    Route::get('/warehouse/stock', [stockController::class, 'viewStockWarehouse']);
    Route::get('/warehouse/listspk', [warehouseController::class, 'viewSpk']);
    Route::get('/warehouse/view-order/{id_order}', [warehouseController::class, 'viewOrder']);
    Route::post('/warehouse/add-worker/{id_order}', [warehouseController::class, 'addWorker']);
    Route::get('/warehouse/stock/{$id}', [stockController::class, 'detailStock']);
    Route::post('/warehouse/stock/store', [stockController::class, 'store']);
    Route::post('/warehouse/stock/{id_stock}', [stockController::class, 'addStock']);
    Route::post('/warehouse/stock/safety-stock/{id_stock}', [stockController::class, 'safetyStock']);
    Route::get('/warehouse/stock/{id_store}', [stockController::class, 'viewStockWarehouseToko']);
});

Route::middleware(['auth', 'laboil'])->group(function () {
    // role lab
    Route::get('/index_lab', function () {
        return view('oilab.lab.index_lab');
    });
    Route::get('/item_test', function () {
        return view('oilab.lab.item_test');
    });
    Route::get('/item_test', [itemtestController::class, 'notesitem']);
    Route::post('/item_test/add/{no_so_solab}', [itemtestController::class, 'storenotes']);
    // Route::get('/updateStatus/{no_so_solab}', 'ItemTestController@updateStatus')->name('updateStatus');


    Route::get('/order_list', function () {
        return view('oilab.lab.order_list');
    });
    Route::get('/history_lab', function () {
        return view('oilab.lab.history_lab');
    });
    Route::get('/form_add_data', function () {
        return view('oilab.lab.form_add_data');
    });
    Route::get('/detailhistory_lab', function () {
        return view('oilab.lab.detailhistory_lab');
    });
    Route::get('/form_dga_lab', function () {
        return view('oilab.lab.form_dga_lab');
    });
    Route::get('/form_furan_lab', function () {
        return view('oilab.lab.form_furan_lab');
    });
    Route::get('/form_oa_lab', function () {
        return view('oilab.lab.form_oa_lab');
    });
    Route::get('/form_dga1_lab', function () {
        return view('oilab.lab.form_dga1_lab');
    });
    Route::get('/index_adminlab', function () {
        return view('oilab.lab.index_adminlab');
    });
    Route::get('/report_adminlab', function () {
        return view('oilab.lab.report_adminlab');
    });
    Route::get('/history_adminlab', function () {
        return view('oilab.lab.history_adminlab');
    });
    Route::get('/detailhistory_adminlab', function () {
        return view('oilab.lab.detailhistory_adminlab');
    });
    Route::get('/reviewreport_adminlab', function () {
        return view('oilab.lab.reviewreport_adminlab');
    });
    Route::get('/index_modlab', function () {
        return view('oilab.lab.index_modlab');
    });
    Route::get('/report_modlab', function () {
        return view('oilab.lab.report_modlab');
    });
    Route::get('/reviewreport_modlab', function () {
        return view('oilab.lab.reviewreport_modlab');
    });
    Route::get('/history_modlab', function () {
        return view('oilab.lab.history_modlab');
    });
    Route::get('/detailhistory_modlab', function () {
        return view('oilab.lab.detailhistory_modlab');
    });
});

Route::post('/logout', [loginController::class, 'logout']);
//Logout

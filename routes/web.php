<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\stockController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\warehouseController;

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
Route::get('test', [Controller::class, 'test']);

Route::get('/sales/oil/index', [salesController::class, 'indexOil']);
Route::get('/sales/oil/salesorder', [salesController::class, 'salesOrderOil']);
Route::get('/sales/oil/salesorder/add', [salesController::class, 'salesOrderOil']);
Route::get('/sales/oil/report', [salesController::class, 'reportOil']);
Route::get('/sales/oil/sample', [salesController::class, 'sampleOil']);
Route::get('/sales/oil/history', [salesController::class, 'historyOil']);
Route::get('/sales/oil/history/detail', [salesController::class, 'salesOrderOil']);


// role lab
Route::get('/', function () {
    return view('oilab.lab.index_lab');
});
Route::get('/item_test', function () {
    return view('oilab.lab.item_test');
});
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

//Role Manager Sparepart
Route::get('/manager_spareparts', function () {
    return view('sparepart.manager.dashboardManager');
});
Route::get('/stock_manager_spareparts', [stockController::class, 'viewStockManager']);


//Role Warehouse Sparepart
Route::get('/warehouse/stock', [stockController::class, 'viewStockWarehouse']);
Route::post('/warehouse/stock/store', [stockController::class, 'store']);
Route::get('/warehouse/dashboard', [warehouseController::class, 'index']);

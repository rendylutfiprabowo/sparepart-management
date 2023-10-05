<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\stockController;

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

Route::get('/', function () {
    return view('oilab.sales.index-sales');
});

Route::get('/history', function () {
    return view('oilab.sales.history');
});

Route::get('/salesorder', function () {
    return view('oilab.sales.salesorder');
});

Route::get('/form_sales_order', function () {
    return view('oilab.sales.form_sales_order');
});

Route::get('/report_sales', function () {
    return view('oilab.sales.report_sales');
});

Route::get('/sample_sales', function () {
    return view('oilab.sales.sample_sales');
});
Route::get('/detailhistory_sales', function () {
    return view('oilab.sales.detailhistory_sales');
});


// role lab
// Route::get('/', function () {
//     return view('template.lab.index_lab');
// });
// Route::get('/item_test', function () {
//     return view('template.lab.item_test');
// });
// Route::get('/order_list', function () {
//     return view('template.lab.order_list');
// });
// Route::get('/history_lab', function () {
//     return view('template.lab.history_lab');
// });
// Route::get('/form_add_data', function () {
//     return view('template.lab.form_add_data');
// });
// Route::get('/detailhistory_lab', function () {
//     return view('template.lab.detailhistory_lab');
// });
// Route::get('/form_dga_lab', function () {
//     return view('template.lab.form_dga_lab');
// });
// Route::get('/form_furan_lab', function () {
//     return view('template.lab.form_furan_lab');
// });
// Route::get('/form_oa_lab', function () {
//     return view('template.lab.form_oa_lab');
// });
// Route::get('/form_dga1_lab', function () {
//     return view('template.lab.form_dga1_lab');
// });

//Role Manager Spareparts
Route::get('/manager_spareparts', function () {
    return view('sparepart.manager.dashboardManager');
});
Route::get('/stock_manager_spareparts', [stockController::class, 'index']);

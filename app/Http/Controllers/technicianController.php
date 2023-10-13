<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\technician;
use Illuminate\Http\Request;

class technicianController extends Controller
{
    public function viewSpk()
    {
        $listSpk = order::with('sparepart', 'store_sparepart')->get();
        return view(
            'sparepart.warehouse.technicianWarehouse',
            []
        );
    }
}

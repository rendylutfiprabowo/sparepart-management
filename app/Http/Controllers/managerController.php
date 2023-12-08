<?php

namespace App\Http\Controllers;

use App\Models\technician;
use App\Models\warehouse;
use Illuminate\Http\Request;

class managerController extends Controller
{
    //
    public function addUser()
    {
        $warehouse = warehouse::all();
        $technician = technician::all();
        // @dd($warehouse);
        return view('sparepart.manager.addUser', [
            'warehouse' => $warehouse,
            'technician' => $technician,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\stockSparepart;
use App\Models\technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class technicianController extends Controller
{
    public function viewDashboard()
    {
        return view(
            'sparepart.technician.dashboardTechnician'
        );
    }
    public function viewSpk()
    {
        $spks = Auth::User()->technician->first()->order;
        return view(
            'sparepart.technician.listSpkTechnician',
            [
                'spk' => $spks,
            ]
        );
    }

    public function viewOrder($id_order)
    {
        $order = order::all()->where('id_order', $id_order)->first();
        $stocks = stockSparepart::all();
        return view('sparepart.technician.returTechnician', [
            'order' => $order,
            'stocks' => $stocks
        ]);
    }
}

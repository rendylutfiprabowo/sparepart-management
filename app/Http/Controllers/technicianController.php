<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\technician;
use Illuminate\Http\Request;

class technicianController extends Controller
{
    public function viewDashboard()
    {
        return view(
            'sparepart.technician.dashboardTechnician'
        );
    }
}

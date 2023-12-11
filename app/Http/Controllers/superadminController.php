<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\order;
use App\Models\project;
use App\Models\sales;
use App\Models\sample;
use Illuminate\Http\Request;


class superadminController extends Controller
{

    public function dashboard()
    {
        // ================ DASHBOARD SALES CRM =======================    
        $customersTotal = customer::count();
        $projectsTotal = project::count();
        $salesData = sales::all();
        $orderSpareparts = order::all();
        $totalOrderSP = order::count();
        $oilSample = sample::count();

        // Calculations for charts
        $divideNumber = 1000;
        $percentageCustomers = ($customersTotal / $divideNumber) * 100;
        $percentageProjects = ($projectsTotal / $divideNumber) * 100;
        $percentageSales = $percentageCustomers + $percentageProjects;

        // ================ DASHBOARD OIL LAB=======================  
        $totalDGA = Sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 220); // ID untuk DGA
        })->count();
        $totalFuran = Sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 842); // ID untuk Furan
        })->count();
        $totalOA = Sample::whereHas('scope', function ($query) {
            $query->where('id_scope', 399); // ID untuk OA
        })->count();
        $totalAllSamples = $totalDGA + $totalFuran + $totalOA;

        return view('superadmin.dashboard', compact(
            'customersTotal',
            'projectsTotal',
            'totalOrderSP',
            'salesData',
            'percentageSales',
            'percentageCustomers',
            'percentageProjects',
            'oilSample',
            'totalDGA',
            'totalFuran',
            'totalOA',
            'totalAllSamples'
        ));

        
    }

    public function createaccount()
    {
        return view('superadmin.createaccount');
    }

    public function storecreateaccount($request)
    {
        $role = $request->input('role');

        // if ($role == 'admin') {
        //     AdminOilLab::create([
        //         'name' => $request->input('name'),
        //         'email' => $request->input('email'),
        //         'password' => bcrypt($request->input('password')),
        //     ]);
        // } elseif ($role == 'user') {
        //     Ad::create([
        //         'name' => $request->input('name'),
        //         'email' => $request->input('email'),
        //         'password' => bcrypt($request->input('password')),
        //     ]);
        // }

        // return redirect('/login');
    }
}

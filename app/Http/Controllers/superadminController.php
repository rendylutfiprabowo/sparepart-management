<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class superadminController extends Controller
{

    public function index()
    {
        return view('superadmin.dashboard');
    }
}

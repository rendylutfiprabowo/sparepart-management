<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\salesSparepart;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function test()
    {
        $User = User::all();
        return dd($User->first()->sales);
    }
}

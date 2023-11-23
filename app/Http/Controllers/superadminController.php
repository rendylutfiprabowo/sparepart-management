<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class superadminController extends Controller
{

    public function dashboard()
    {
        return view('superadmin.dashboard');
    }

    public function createaccount()
    {
        return view('superadmin.createaccount');
    }

    // public function storecreateaccount()
    // {
    //     $role = $request->input('role');

    //     if ($role == 'admin') {
    //         Admin::create([
    //             'name' => $request->input('name'),
    //             'email' => $request->input('email'),
    //             'password' => bcrypt($request->input('password')),
    //         ]);
    //     } elseif ($role == 'user') {
    //         User::create([
    //             'name' => $request->input('name'),
    //             'email' => $request->input('email'),
    //             'password' => bcrypt($request->input('password')),
    //         ]);
    //     }

    //     return redirect('/login');
    // }
}

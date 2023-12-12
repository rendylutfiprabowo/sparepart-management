<?php

namespace App\Http\Controllers;

use App\Models\storeSparepart;
use App\Models\technician;
use App\Models\warehouse;
use App\Models\user;
use Illuminate\Http\Request;

class managerController extends Controller
{
    //
    public function viewUser()
    {
        $warehouse = warehouse::all();
        $technician = technician::all();
        $store = storeSparepart::all();
        // @dd($warehouse);
        return view('sparepart.manager.addUser', [
            'warehouse' => $warehouse,
            'technician' => $technician,
            'store' => $store,
        ]);
    }

    public function storeWarehouse(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'store' => 'required',
            'phone_warehouse' => 'required',

        ]);
        $id_user = 'USR-' . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
        $hashedPassword = bcrypt($validatedData['password']);
        $users = user::create([
            'id_user' => $id_user,
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'id_role' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $warehouse = warehouse::create([
            'id_warehouse' => 'WAR-' . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT),
            'nama_warehouse' => $validatedData['username'],
            'id_store' => $validatedData['store'],
            'phone_warehouse' => $validatedData['phone_warehouse'],
            'id_user' => $id_user
        ]);

        session()->flash('success', 'User Berhasil Ditambahkan');

        return redirect('/manager/addUser');
    }
    public function storeTechnician(Request $request)
    {
        @dd($request->all());
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone_technician' => 'required',
            'nip_technician' => 'required',

        ]);
        $id_user = 'USR-' . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
        $hashedPassword = bcrypt($validatedData['password']);
        $users = user::create([
            'id_user' => $id_user,
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'id_role' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $technician = technician::create([
            'id_technician' => 'TECH-' . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT),
            'nama_technician' => $validatedData['username'],
            'nip_technician' => $validatedData['nip_technician'],
            'phone_technician' => $validatedData['phone_technician'],
            'id_user' => $id_user
        ]);

        session()->flash('success', 'User Berhasil Ditambahkan');

        return redirect('/manager/addUser');
    }
}

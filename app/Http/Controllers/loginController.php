<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\booked;

class loginController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            if (Auth()->user()->id_role == 1 && auth()->user()->warehouse->id_store != 'CTR')
                return redirect('/warehouse/branch/stock');
            else if (auth()->user()->id_role == 1 && auth()->user()->warehouse->id_store == 'CTR')
                return redirect('/warehouse/dashboard');
            else if (Auth::user()->id_role == 2)
                return redirect('/sales/oil/index');
            else if (Auth::user()->id_role == 3)
                return redirect('/index_lab');
            else if (Auth::user()->id_role == 4)
                return redirect('/technician/index');
            else if (Auth::user()->id_role == 5)
                return redirect('/index_modlab');
            else if (Auth::user()->id_role == 6)
                return redirect('/index_adminlab');
            else if (Auth::user()->id_role == 7)
                return redirect('/superadmin/dashboard');
        }
        return redirect('/login');
    }

    public function verifyLogin(Request $request)
    {
        $field = $request->input('email_or_username');
        $password = $request->input('password');

        // Coba login berdasarkan email
        if (Auth::attempt(['email' => $field, 'password' => $password])) {
            // Jika berhasil login berdasarkan email
            if (auth()->check() && auth()->user()->id_role == 1 && auth()->user()->warehouse->id_store != 'CTR')
                return redirect('/warehouse/branch/stock');
            else if (auth()->check() && auth()->user()->id_role == 1 && auth()->user()->warehouse->id_store == 'CTR')
                return redirect('/warehouse/dashboard');
            else if (Auth::user()->id_role == 2)
                return redirect('/sales/oil/index');
            else if (Auth::user()->id_role == 3)
                return redirect('/index_lab');
            else if (Auth::user()->id_role == 4)
                return redirect('/technician/index');
            else if (Auth::user()->id_role == 5)
                return redirect('/index_modlab');
            else if (Auth::user()->id_role == 6)
                return redirect('/index_adminlab');
            else if (Auth::user()->id_role == 7)
                return redirect('/superadmin/dashboard');
        }

        // Jika gagal login berdasarkan email, coba login berdasarkan username
        if (Auth::attempt(['username' => $field, 'password' => $password])) {
            if (auth()->check() && auth()->user()->id_role == 1 && auth()->user()->warehouse->id_store != 'CTR')
                return redirect('/warehouse/branch/stock');
            else if (auth()->check() && auth()->user()->id_role == 1 && auth()->user()->warehouse->id_store == 'CTR')
                return redirect('/warehouse/dashboard');
            else if (Auth::user()->id_role == 2)
                return redirect('/sales/oil/index');
            else if (Auth::user()->id_role == 3)
                return redirect('/index_lab');
            else if (Auth::user()->id_role == 4)
                return redirect('/technician/index');
            else if (Auth::user()->id_role == 5)
                return redirect('/index_modlab');
            else if (Auth::user()->id_role == 6)
                return redirect('/index_adminlab');
            else if (Auth::user()->id_role == 7)
                return redirect('/superadmin/dashboard');
        }

        // Jika kedua percobaan di atas gagal, kembalikan ke halaman login
        return back()->with(['error' => 'Email/username & Password yang anda masukan salah']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}

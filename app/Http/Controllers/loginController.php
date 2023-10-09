<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function home(){
        if (Auth::check()){
            if (Auth::user()->id_role == 1)
                return redirect('/warehouse/stock');
            else if (Auth::user()->id_role == 2)
                return redirect('/sales/oil/index');
            else if (Auth::user()->id_role == 3)
                return redirect('/index_lab');
            else if (Auth::user()->id_role == 4)
                return redirect('/technician');
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
            if (Auth::user()->id_role == 1)
                return redirect('/warehouse/stock');
            else if (Auth::user()->id_role == 2)
                return redirect('/sales/oil/index');
            else if (Auth::user()->id_role == 3)
                return redirect('/index_lab');
            else if (Auth::user()->id_role == 4)
                return redirect('/technician');
        }

        // Jika gagal login berdasarkan email, coba login berdasarkan username
        if (Auth::attempt(['username' => $field, 'password' => $password])) {
            if (Auth::user()->id_role == 1)
                return redirect('/warehouse/stock');
            else if (Auth::user()->id_role == 2)
                return redirect('/sales/oil/index');
            else if (Auth::user()->id_role == 3)
                return redirect('/index_lab');
            else if (Auth::user()->id_role == 4)
                return redirect('/technician');
        }

        // Jika kedua percobaan di atas gagal, kembalikan ke halaman login
        return back()->withErrors(['email_or_username' => 'Kombinasi email/username dan kata sandi salah']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}

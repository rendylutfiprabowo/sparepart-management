<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function verifyLogin(Request $request)
    {
        $field = $request->input('email_or_username');
        $password = $request->input('password');

        // Coba login berdasarkan email
        if (Auth::attempt(['email' => $field, 'password' => $password])) {
            // Jika berhasil login berdasarkan email
            return redirect('/warehouse/stock');
        }

        // Jika gagal login berdasarkan email, coba login berdasarkan username
        if (Auth::attempt(['username' => $field, 'password' => $password])) {
            // Jika berhasil login berdasarkan username
            return redirect('/warehouse/stock');
        }

        // Jika kedua percobaan di atas gagal, kembalikan ke halaman login
        return back()->withErrors(['email_or_username' => 'Kombinasi email/username dan kata sandi salah']);
    }
}

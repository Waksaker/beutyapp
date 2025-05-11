<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showlogin() {
        return view('login');
    }

    public function loginaction(Request $request) {
        $email = $request->email;
        $password = $request->katalaluan;

        $sql = DB::table('beuty_user')
            ->where('email', $email)
            ->where('pass', $password)
            ->first();

        if (!$sql) {
            return response()->json(['error' => 'Gagal menyimpan ke database!'], 500);
        }

        session(['name_user' => $sql->name]);
        return redirect()->route('showdash')->with('success', true);
    }
}

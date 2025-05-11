<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showregister() {
        return view('register');
    }

    public function registeraction(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $telphone = $request->telphone;
        $katalaluan = $request->katalaluan2;
        $location = $request->location;

        $insert = DB::table('beuty_user')->insert([
            'name' => $name,
            'no_tel' => $telphone,
            'email' => $email,
            'pass' => $katalaluan,
            'location' => $location
        ]);

        if (!$insert) {
            return response()->json(['error' => 'Gagal menyimpan ke database!'], 500);
        }

        return redirect()->route('showlogin')->with('success', true);
    }
}

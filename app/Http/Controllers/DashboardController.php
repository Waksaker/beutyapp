<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showdash() {
        $name = session('name_user');
        $sql = DB::table('beuty_user')->where('name', $name)->first();
        return view('dashboard', [
            'user' => $sql
        ]);
    }
}

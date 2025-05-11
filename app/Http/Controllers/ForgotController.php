<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotController extends Controller
{
    public function showforgot() {
        return view('forgot');
    }
}

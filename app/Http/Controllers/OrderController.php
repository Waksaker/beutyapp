<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function showorder() {
        $name = session('name_user');
        $sql = DB::table('beuty_user')->where('name', $name)->first();
        return view('listorder', [
            'user' => $sql
        ]);
    }

    public function listorder(Request $request) {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $name = $request->name;

        $sql = DB::table('vw_pesanan_user')
                ->where('name', $name)
                ->whereYear('date', $tahun)
                ->whereMonth('date', $bulan)
                ->get();

        return view('components.orderlist', [
            'itemorder' => $sql
        ]);
    }

    public function order() {
        $name = session('name_user');
        $sql = DB::table('beuty_user')->where('name', $name)->first();
        $item = DB::table('vw_item')->get();
        return view('order', [
            'user' => $sql,
            'items' => $item
        ]);
    }

    public function orderaction(Request $request) {
        $name = $request->name;
        $number = $request->number;
        $item_name = $request->item;
        $quantity = $request->quantity;
        $created = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
        $date = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d');

        // Ambil item berdasarkan nama
        $item = DB::table('vw_item')->where('name', $item_name)->first();

        // Jika item tiada, bagi respon error
        if (!$item) {
            return redirect()->route('order')->with('fail_item', true);
        }

        $amount = $item->price * $quantity;

        $insert = DB::table('vw_pesanan_user')->insert([
            'name' => $name,
            'item' => $item->name,
            'price' => $item->price,
            'quantity' => $quantity,
            'amount' => $amount,
            'tele_no' => $number,
            'date' => $date,
            'created_at' => $created
        ]);

        if (!$insert) {
            return redirect()->route('order')->with('fail_insert', true);
        }

        return redirect()->route('showorder')->with('success_order', true);
    }
}

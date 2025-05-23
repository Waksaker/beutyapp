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
            'itemorder' => $sql,
            'bulan' => $bulan,
            'name' => $name
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
        $date = $request->date;

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

    public function deleteorder($name, $date, $item)
    {
        // Contoh padam berdasarkan 3 kolum
        $delete = DB::table('vw_pesanan_user')
                    ->where('name', $name)
                    ->where('date', $date)
                    ->where('item', $item)
                    ->delete();

        if(!$delete) {
            return redirect()->route('showorder')->with('fail_delete', true);
        }

        return redirect()->route('showorder')->with('success_delete', true);
    }

    public function invoiceorder($name, $date, $item)
    {
        $user = DB::table('vw_pesanan_user')
                    ->where('name', $name)
                    ->where('date', $date)
                    ->where('item', $item)
                    ->first(); // info user

        return view('print', compact('user'));
    }

    public function invoiceallorder($name, $bulan) {
        $allinvoice = DB::table('vw_pesanan_user')
                        ->where('name', $name)
                        ->whereMonth('date', $bulan)
                        ->get();

        $user = DB::table('beuty_user')->where('name', $name)->first();

        $amount = DB::table('vw_pesanan_user')
                    ->where('name', $name)
                    ->whereMonth('date', $bulan)
                    ->sum('amount');

        if ($bulan == '01') {
            $namebulan = "January";
        } elseif ($bulan == '02') {
            $namebulan = "February";
        } elseif ($bulan == '03') {
            $namebulan  = "March";
        } elseif ($bulan == "04") {
            $namebulan = "April";
        } elseif ($bulan == '05') {
            $namebulan = "May";
        } elseif ($bulan == '06') {
            $namebulan = "June";
        } elseif ($bulan == '07') {
            $namebulan = "July";
        } elseif ($bulan == '08') {
            $namebulan = "August";
        } elseif ($bulan == '09') {
            $namebulan = "September";
        } elseif ($bulan == '10') {
            $namebulan = "October";
        } elseif ($bulan == '11') {
            $namebulan = "November";
        } elseif ($bulan == '12') {
            $namebulan = "December";
        }

        return view('printall', [
            'allinvoice' => $allinvoice,
            'namebulan' => $namebulan,
            'user' => $user,
            'amount' => $amount
        ]);
    }

    public function deleteallorder($name, $bulan) {

        $deleteallorder = DB::table('vw_pesanan_user')
                            ->where('name', $name)
                            ->whereMonth('date', $bulan)
                            ->delete();

        if (!$deleteallorder) {
            return redirect()->route('showorder')->with('fail_delete_all_invoice', true);
        }

        return redirect()->route('showorder')->with('success_delete_all_invoice', true);
    }

    public function ordersetting($name, $date, $item) {
        $settingorder = DB::table('vw_pesanan_user')
                            ->where('name', $name)
                            ->where('date', $date)
                            ->where('item', $item)
                            ->first();
        $user = DB::table('beuty_user')->where('name', $name)->first();

        $item = DB::table('vw_item')->get();
        
        return view('orderset', [
            'orders' => $settingorder,
            'user' => $user,
            'items' => $item
        ]);
    }

    public function update_order(Request $request) {
        $name = $request->name;
        $number = $request->number;
        $item_name = $request->item;
        $quantity = $request->quantity;
        $created = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
        $date = $request->date;
        $id = $request->id;

        // Ambil item berdasarkan nama
        $item = DB::table('vw_item')->where('name', $item_name)->first();

        // Jika item tiada, bagi respon error
        if (!$item) {
            return redirect()->route('order')->with('fail_item', true);
        }

        $amount = $item->price * $quantity;

        $insert = DB::table('vw_pesanan_user')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'item' => $item->name,
                    'price' => $item->price,
                    'quantity' => $quantity,
                    'amount' => $amount,
                    'tele_no' => $number,
                    'date' => $date,
                    'created_at' => $created
                ]);

        return redirect()->route('showorder')->with('success_update', true);
    }
}

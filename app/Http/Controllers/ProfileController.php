<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showprofile() {
        $name = session('name_user');
        $sql = DB::table('beuty_user')->where('name', $name)->first();
        return view('profile', [
            'user' => $sql
        ]);
    }

    public function actionprofile(Request $request) {
        $name = $request->name;
        $pass = $request->password;
        $email = $request->email;
        $number = $request->number;
        $location = $request->location;
        $id = $request->id;

        $update = DB::table('beuty_user')
                    ->where('user_id', $id)
                    ->update([
                        'name'=>$name,
                        'pass'=>$pass,
                        'email'=>$email,
                        'no_tel'=>$number,
                        'location'=>$location,
                    ]);
        
        if(!$update) {
            return redirect()->route('showprofile')->with('fail_profile', true);
        }

        return redirect()->route('showdash')->with('success_profile', true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotController extends Controller
{
    public function showforgot() {
        return view('forgot');
    }

    public function forgotaction(Request $request) {
        $email = $request->email;
        $random_pass  = rand(100000, 999999);

        // Email content
        $subject = "PASSWORD BEUTY SYSTEM";
        $body = "
            PASSWORD : $random_pass
        ";

        $scriptUrl = "https://script.google.com/macros/s/AKfycbx3vNzkU170boiNFepArV3kfiR9j8jVM7mz2GuD40EPy6DG7BVaINhkD7izIbFIkcz7/exec";

        $data = array(
            "recipient" => $email,
            "subject"   => $subject,
            "body"      => $body,
            "isHTML"    => 'true'
        );

        $sql = DB::table('beuty_user')->where('email', $email)->first();

        if (!$sql) {
            return redirect()->route('showforgot')->with('fail', true);
        }

        $update = DB::table('beuty_user')
                    ->where('email', $email)
                    ->update([
                        'pass' => $random_pass,
                    ]);
                    
        
        if (!$update) {
            return redirect()->route('showforgot')->with('update_fail', true);
        }

        $ch = curl_init($scriptUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_exec($ch);
        curl_close($ch);

        return redirect()->route('showlogin')->with('success_update', true);
    }
}

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
        $subject = "PASSWORD SYSTEM";
        $body = "
            <table style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th style='border: 1px solid #000; padding: 8px;'>LINK</th>
                        <th style='border: 1px solid #000; padding: 8px;'>PASSWORD</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style='border: 1px solid #000; padding: 8px;'></td>
                        <td style='border: 1px solid #000; padding: 8px;'>$random_pass</td>
                    </tr>
                </tbody>
            </table>
        ";


        $scriptUrl = "https://script.google.com/macros/s/AKfycbx3vNzkU170boiNFepArV3kfiR9j8jVM7mz2GuD40EPy6DG7BVaINhkD7izIbFIkcz7/exec";

        $data = array(
            "recipient" => $email,
            "subject"   => $subject,
            "body"      => $body,
            "isHTML"    => 'true'
        );
    }
}

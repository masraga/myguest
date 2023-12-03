<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SettingController extends Controller
{
    public function generateQrView() {
        $user = auth()->user();
        $token = Crypt::encryptString($user->email);
        $userToken = \App::make('url')->to("/auth-visitor?token={$token}");
        return view("generate-qr-view", ["userToken" => $userToken, "receiptName" => $user->name]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Whatsapp;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "wa_token"
    ];

    /**
     * request 
     * visitorName : nama visitor
     * phone : hp visitor
    */
    public static function sendVisitorApproveMsg(array $request = []) {
        $visitorName = $request["visitorName"];
        $phone = $request["phone"];
        $admin = auth()->user()->name;
        $msg = "Halo {$visitorName} anda sudah diapprove, silahkan masuk kedalam ruangan";

        return Whatsapp::sendMessage(["phone" => $phone, "msg" => $msg]);
    }

    /**
     * request 
     * visitorName : nama visitor
     * phone : hp visitor
    */
    public static function sendVisitorExitMsg(array $request = []) {
        $visitorName = $request["visitorName"];
        $phone = $request["phone"];
        $admin = auth()->user()->name;
        $msg = "Halo {$visitorName} anda berhasil keluar, terimakasih telah berkunjung";

        return Whatsapp::sendMessage(["phone" => $phone, "msg" => $msg]);
    }
}

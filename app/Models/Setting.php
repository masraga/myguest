<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Whatsapp;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "wa_token",
        "admin_phone",
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
        $msg = "Hi {$visitorName}, Anda sudah terverifikasi, silahkan masuk kedalam ruangan";

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
        $msg = "Hi {$visitorName}, Anda berhasil keluar. Terima kasih telah berkunjung";

        return Whatsapp::sendMessage(["phone" => $phone, "msg" => $msg]);
    }

    /**
     * request 
     * visitorName : nama visitor
     * phone : hp admin
    */
    public static function sendAdminApproveMsg(array $request = []) {
        $setting = self::first();
        $visitorName = $request["visitorName"];
        $description = $request["description"];
        $phone = $setting->admin_phone;
        $admin = auth()->user()->name;
        $msg = "Halo tamu {$visitorName} ingin menemui anda dengan keperluan {$description}";

        return Whatsapp::sendMessage(["phone" => $phone, "msg" => $msg]);
    }

    /**
     * request 
     * visitorName : nama visitor
     * phone : hp visitor
    */
    public static function sendAdminExitMsg(array $request = []) {
        $setting = self::first();
        $visitorName = $request["visitorName"];
        $phone = $setting->admin_phone;
        $admin = auth()->user()->name;
        $msg = "Halo, {$visitorName} berhasil keluar dari ruangan";

        return Whatsapp::sendMessage(["phone" => $phone, "msg" => $msg]);
    }
}

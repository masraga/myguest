<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "wa_token"
    ];

    /**
     * request 
     * visitorName : nama visitor
    */
    public static function send_admin_approve_msg(array $request = []) {
        $visitorName = $request["visitor_name"];
        $admin = auth()->user()->name;

        return "
            Halo, ada tamu atas nama {$visitorName} ingin bertemu dengan anda. thanks :)
        ";
    }

    /**
     * request 
     * visitorName : nama visitor
    */
    public static function send_admin_exit_msg(array $request = []) {
        $visitorName = $request["visitor_name"];
        $admin = auth()->user()->name;

        return "
            Halo, tamu atas nama {$visitorName} sudah keluar dari kantor. thanks :)
        ";
    }

    /**
     * request 
     * visitorName : nama visitor
    */
    public static function send_visitor_approve_msg(array $request = []) {
        $visitorName = $request["visitor_name"];
        $admin = auth()->user()->name;

        return "
            Halo {$visitorName} anda sudah diapprove, jangan lupa bawa kartunya masuk ya
        ";
    }

    /**
     * request 
     * visitorName : nama visitor
    */
    public static function send_visitor_exit_msg(array $request = []) {
        $visitorName = $request["visitor_name"];
        $admin = auth()->user()->name;

        return "
            Halo {$visitorName} anda sudah keluar kantor terimakasih kunjungannya :)
        ";
    }
}

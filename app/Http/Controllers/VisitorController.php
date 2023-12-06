<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\VisitorCard;
use App\Models\Visitor;

class VisitorController extends Controller
{
    private $dummyUrl = "http://localhost:8000/auth-visitor?token=eyJpdiI6IlZQMTRrVGRPckNFTEdHMit6ZGg3Unc9PSIsInZhbHVlIjoiSE51ZXFhK2RTbElZVVA5eUJBQW9yZz09IiwibWFjIjoiMDcyY2ZjMjkwNjE0M2RkMjI3M2VlZDljYTFjOTUzODlmYjI0OTg4Y2VhZTZiZWI2MTUwODkxNjdhNzYzNTgxMCIsInRhZyI6IiJ9";

    public function faceValidator(Request $request) {
        return view("form-face-validator");
    }

    public function saveVisitorFace(Request $request) {
        $face = $request->file("face");
        $token = $request->token;
        $receiptionist = Crypt::decryptString($token);
        
        $mime = $face->getMimeType();
        $extension = $face->getClientOriginalExtension();
        $validExt = ["image/png", "image/jpeg", "image/jpg", "gif"];
        if(!in_array($mime, $validExt)) {
            return response()->json(["msg" => "gambar wajah tidak valid", "is_error" => true], 400);
        }
        
        $fileName = time().$receiptionist.".".$extension;
        $face->move("face/", $fileName);
        $path = "face/" . $fileName;
        $visitorCode = strtoupper(Str::random(5));
        $receiptionist_id = User::where(["email" => $receiptionist])->first()->id;
        
        VisitorCard::create([
            "card_id" => $visitorCode,
            "face" => $path,
            "receiptionist_id" => $receiptionist_id
        ]);

        return response([
            "msg" => "kode visitor {$visitorCode}, silahkan konfirmasi keadmin", 
            "is_error" => false, 
            "code" => $visitorCode,
            "face" => $path,
            "admin" => $receiptionist
        ]);
    }

    public function generateCard(Request $request) {
        $visitor = Visitor::with(["visitorCard", "guest"])->first();
        return view("visitor-card-generator", ["visitor" => $visitor]);
    }
}

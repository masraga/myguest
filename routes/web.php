<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VisitorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/qr/generate', [SettingController::class, "generateQrView"]);
Route::get('/auth-visitor', [VisitorController::class, "faceValidator"]);
Route::get('/generate-visitor-card', [VisitorController::class, "generateCard"]);

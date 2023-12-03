<?php

namespace App\Filament\Resources\UserResource\Pages;


use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ComputerQrcode extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.computer-qrcode';

    public $userToken; //email user yang login

    public function mount(): void
    {
        static::authorizeResourceAccess();
        $this->userToken = auth()->user()->email;
    }
}

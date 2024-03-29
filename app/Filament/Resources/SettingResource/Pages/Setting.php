<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\ListRecords;

class Setting extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.setting-resource.pages.setting';

    public function mount(): void
    {
        static::authorizeResourceAccess();
    }
}

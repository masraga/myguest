<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\ListRecords;

class Visitor extends ListRecords
{
    protected static string $resource = VisitorResource::class;

    protected static string $view = 'filament.resources.visitor-resource.pages.visitor';

    public function mount(): void
    {
        static::authorizeResourceAccess();
    }
}

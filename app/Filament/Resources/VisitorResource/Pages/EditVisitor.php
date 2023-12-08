<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisitor extends EditRecord
{
    protected static string $resource = VisitorResource::class;

    protected static string $view = 'filament.resources.visitor-resource.pages.edit-visitor';
}

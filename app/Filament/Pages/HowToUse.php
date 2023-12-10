<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class HowToUse extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.how-to-use';

    protected static ?int $navigationSort = 4;
}

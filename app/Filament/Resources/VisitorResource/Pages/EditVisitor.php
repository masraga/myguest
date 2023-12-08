<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;

class EditVisitor extends EditRecord
{
    protected static string $resource = VisitorResource::class;
    
    protected static string $view = 'filament.resources.visitor-resource.pages.edit-visitor';

    protected function getFormActions(): array
    {
        return [
            EditAction::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save')
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        
        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

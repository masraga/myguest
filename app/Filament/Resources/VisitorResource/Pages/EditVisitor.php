<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use App\Filament\Resources\VisitorResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;
use App\Models\Guest;

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
        $guest = $record->guest;
        $vcard = $record->visitorCard;
        
        if($vcard->is_approve) {
            Setting::sendVisitorApproveMsg([
                "visitorName" => $guest->name, 
                "phone" => $guest->phone,
                "description" => $guest->description
            ]);

            // Setting::sendAdminApproveMsg([
            //     "visitorName" => $guest->name, 
            //     "phone" => $guest->phone,
            //     "description" => $guest->description
            // ]);
        }
        if($vcard->is_exit) {
            Setting::sendVisitorExitMsg(["visitorName" => $guest->name, "phone" => $guest->phone]);
            // Setting::sendAdminExitMsg(["visitorName" => $guest->name, "phone" => $guest->phone]);
        }

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

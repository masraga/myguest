<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Filament\Resources\VisitorResource\RelationManagers;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Concerns\InteractsWithForms;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Fieldset::make('data tamu')
            ->relationship('guest')
            ->schema([
                TextInput::make('id_card')->label("Kartu Identitas"),
                TextInput::make('name')->label("nama"),
            ]),
            Fieldset::make('Kartu Visitor')
            ->relationship('visitorCard')
            ->schema([
                TextInput::make('card_id')->label("ID kartu")->disabled(),
                DateTimePicker::make('created_at')->label("tanggal masuk"),
                Toggle::make('is_approve')->onColor('success')->offColor('danger')->label("terima tamu ?"),
                Toggle::make('is_exit')->onColor('success')->offColor('danger')->label("tamu keluar ?")
            ])
        ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('guest.id_card')
                ->label("Kartu Identitas"),
                TextColumn::make('guest.name')
                ->label("Nama"),
                TextColumn::make('created_at')
                ->label("Tanggal masuk")
                ->formatStateUsing(fn (string $state): string => date("d-m-Y H:i:s", strtotime($state))),
                IconColumn::make('visitorCard.is_approve')
                ->label("Approve")
                ->boolean(),
                IconColumn::make('visitorCard.is_exit')
                ->label("Sudah keluar")
                ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form([
                    TextInput::make('guest.id_card')
                        ->required()
                        ->maxLength(255),
                    // ...
                ]),
                Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
       return false;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\Visitor::route('/'),
            'create' => Pages\CreateVisitor::route('/create'),
            'edit' => Pages\EditVisitor::route('/{record}/edit'),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('saveAnother')
                ->label('Save & create another')
                ->action('saveAnother')
                ->keyBindings(['mod+shift+s'])
                ->color('secondary'),
        ];
    }
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationResource\Pages;
use App\Filament\Resources\NotificationResource\RelationManagers;
use App\Models\Notification;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('campaign_name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('url')
                        ->url()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('message')
                        ->maxLength(65535),
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('send_to_all')
                        ->default(true)
                        ->reactive(),
                    Forms\Components\Select::make('users')
                        ->label('Select Users')
                        ->options(User::all()->pluck('name', 'id'))
                        ->multiple()
                        ->reactive()
                        ->hidden(
                            fn (Closure $get): bool => $get('send_to_all') == true
                        ),
                    Forms\Components\Select::make('users')
                        ->label('Selected Users')
                        ->options(function (Closure $get){
                            echo '<pre>'; print_r(get_class_methods($get)); exit;
                            return [];
                        })
                        ->hiddenOn(Pages\CreateNotification::class),
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('send_to_all_module')
                        ->default(true)
                        ->reactive(),
                    Forms\Components\Select::make('modules')
                        ->label('Select Modules')
                        ->options([
                            'erp' => 'ERP',
                            'crm' => 'CRM',
                            'pdf-maker' => 'PDF Maker',
                            'festival_image' => 'Festival Image',
                            'stock' => 'Stock Management',
                            'e_commerce' => 'E-Commerce',
                        ])
                        ->multiple()
                        ->reactive()
                        ->hidden(
                            fn (Closure $get): bool => $get('send_to_all_module') == true
                        ),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('campaign_name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('message'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\IconColumn::make('send_to_all')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
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
            'index' => Pages\ListNotifications::route('/'),
            'create' => Pages\CreateNotification::route('/create'),
            'view' => Pages\ViewNotification::route('/{record}'),
            'edit' => Pages\EditNotification::route('/{record}/edit'),
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

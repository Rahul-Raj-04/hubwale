<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FestivalImageAdResource\Pages;
use App\Filament\Resources\FestivalImageAdResource\RelationManagers;
use App\Models\FestivalImageAd;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class FestivalImageAdResource extends Resource
{
    protected static ?string $model = FestivalImageAd::class;

    protected static ?string $modelLabel = "Ad";

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Festival Image';

    protected static ?string $navigationLabel = "Ads";

    protected static ?string $slug = 'festival-image/ads';

    protected static ?string $pluralModelLabel = "Ads";

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('banner')
                    ->collection('banner')
                    ->required()
                    ->image(),
                    // ->rules(['required', 'image']),
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->url()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('expiry_date')
                    ->label("Expiry Date & Time")
                    ->required()
                    ->default(now()),
                Forms\Components\Toggle::make('is_active')
                    ->default(1)
                    ->label("Status")
                    ->hiddenOn(Pages\CreateFestivalImageAd::class),
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('client_name')
                        ->nullable()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('client_mobile_number')
                        ->nullable()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('client_company_name')
                        ->nullable()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('payment_amount')
                        ->nullable()
                        ->maxLength(255),
                    Forms\Components\Select::make('payment_status')
                        ->options(['pending', 'success'])
                        ->nullable(),
                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('client_name'),
                Tables\Columns\TextColumn::make('expiry_date')
                    ->dateTime(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label("Status"),
                Tables\Columns\IconColumn::make('payment_status')
                    ->boolean()
                    ->label("Payment Status"),
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
            'index' => Pages\ListFestivalImageAds::route('/'),
            'create' => Pages\CreateFestivalImageAd::route('/create'),
            'view' => Pages\ViewFestivalImageAd::route('/{record}'),
            'edit' => Pages\EditFestivalImageAd::route('/{record}/edit'),
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

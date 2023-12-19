<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageCategoryResource\Pages;
use App\Filament\Resources\ImageCategoryResource\RelationManagers;
use App\Models\ImageCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageCategoryResource extends Resource
{
    protected static ?string $model = ImageCategory::class;

    protected static ?string $modelLabel = "Fesitval";

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationLabel = "Fesitvals";

    protected static ?string $navigationGroup = 'Festival Image';

    protected static ?string $slug = 'festival-image/festivals';

    protected static ?string $pluralModelLabel = "Festivals";

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('date')
                    ->date()->label('Festival Date'),
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListImageCategories::route('/'),
            'create' => Pages\CreateImageCategory::route('/create'),
            'view' => Pages\ViewImageCategory::route('/{record}'),
            'edit' => Pages\EditImageCategory::route('/{record}/edit'),
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

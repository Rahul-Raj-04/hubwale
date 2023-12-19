<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FestivalImageResource\Pages;
use App\Filament\Resources\FestivalImageResource\RelationManagers;
use App\Models\FestivalImage;
use App\Models\ImageCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class FestivalImageResource extends Resource
{
    protected static ?string $model = FestivalImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    protected static ?string $navigationGroup = 'Festival Image';

    protected static ?string $navigationLabel = "Images";

    protected static ?string $slug = 'festival-image/images';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->rules(['required', 'image', 'dimensions:width=500,height=500']),
                Forms\Components\Select::make('image_category_id')
                    ->label('Image Category')
                    ->relationship('image_category', 'name')
                    ->required(),
                Forms\Components\Select::make('business_category_id')
                    ->label('Category')
                    ->relationship('business_category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('design_name')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('business_category.name')->label('Category'),
                Tables\Columns\TextColumn::make('image_category.name')->label('Festival'),
                Tables\Columns\TextColumn::make('downloads')->default(0),
                Tables\Columns\TextColumn::make('design_name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('imageCategory.name')
                    ->options(ImageCategory::all()->pluck('name', 'id')),
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
            'index' => Pages\ListFestivalImages::route('/'),
            'create' => Pages\CreateFestivalImage::route('/create'),
            'view' => Pages\ViewFestivalImage::route('/{record}'),
            'edit' => Pages\EditFestivalImage::route('/{record}/edit'),
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

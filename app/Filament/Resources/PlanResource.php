<?php

namespace App\Filament\Resources;

use Closure;
use App\Filament\Resources\PlanResource\Pages;
use App\Models\Plan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';

    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Toggle::make('status')
                    ->label('Status')
                    ->hiddenOn(Pages\CreatePlan::class),
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('yearly_price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(999999),
                Forms\Components\TextInput::make('monthly_price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(999999),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('festival_image')
                        ->required()
                        ->reactive(),
                    Forms\Components\Toggle::make('fi_watermark')
                        ->label('Watermark visible ?')
                        ->hidden(
                            fn (Closure $get): bool => $get('festival_image') == false
                        )
                        ->reactive()
                        ->requiredWith('festival_image'),
                    Forms\Components\Toggle::make('fi_ad')
                        ->label('Ad visible ?')
                        ->hidden(
                            fn (Closure $get): bool => $get('festival_image') == false
                        )
                        ->reactive()
                        ->requiredWith('festival_image'),
                    Forms\Components\TextInput::make('fi_download_limit_monthly')
                        ->label('Monthly Image Download Limit')
                        ->hidden(
                            fn (Closure $get): bool => $get('festival_image') == false
                        )
                        ->reactive()
                        ->default(0)
                        ->requiredWith('festival_image'),
                    Forms\Components\TextInput::make('fi_download_limit_yearly')
                        ->label('Yearly Image Download Limit')
                        ->hidden(
                            fn (Closure $get): bool => $get('festival_image') == false
                        )
                        ->reactive()
                        ->default(0)
                        ->requiredWith('festival_image'),
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('erp')
                        ->required()
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('pdf_maker')
                        ->required()
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('stock_management')
                        ->required()
                ]),
                Forms\Components\Card::make([
                    Forms\Components\Toggle::make('e_commerce')
                        ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('yearly_price'),
                Tables\Columns\TextColumn::make('monthly_price'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\IconColumn::make('festival_image')
                    ->boolean(),
                Tables\Columns\IconColumn::make('erp')
                    ->boolean(),
                Tables\Columns\IconColumn::make('pdf_maker')
                    ->boolean(),
                Tables\Columns\IconColumn::make('stock_management')
                    ->boolean(),
                Tables\Columns\IconColumn::make('e_commerce')
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
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'view' => Pages\ViewPlan::route('/{record}'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
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

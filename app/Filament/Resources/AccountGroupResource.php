<?php

namespace App\Filament\Resources;

use Closure;
use App\Models\AccountGroup;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\AccountGroupResource\Pages\EditAccountGroup;
use App\Filament\Resources\AccountGroupResource\Pages\ViewAccountGroup;
use App\Filament\Resources\AccountGroupResource\Pages\ListAccountGroups;
use App\Filament\Resources\AccountGroupResource\Pages\CreateAccountGroup;

class AccountGroupResource extends Resource
{
    protected static ?string $model = AccountGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'ERP';

    /**
     * create form
     *
     * @param Form $form
     * @return Form
     * @author BV
     */
    public static function form(Form $form): Form
    {
        return $form
            ->columns(4)
            ->schema([
                TextInput::make('name')
                    //->maxLength(255)
                    ->label("Account Group Name")
                    ->placeholder('Account Group Name')
                    ->autofocus(),
                Select::make('parent_id')
                    ->relationship('parent', 'name')
                    ->label("Parent Group"),
                TextInput::make('type')
                    //->maxLength(255)
                    ->placeholder('Group Type')
                    ->label("Group Type"),
                TextInput::make('header')
                    //->maxLength(255)
                    ->placeholder('Group Header')
                    ->label("Group Header"),
                TextInput::make('sequence')
                    //->maxLength(255)
                    ->placeholder('Group Sequence')
                    ->label("Group Sequence"),
                Select::make('is_default')
                    ->label("Is Default ?")
                    ->options(getBooleanList()),
                TextInput::make('category')
                    //->maxLength(255)
                    ->placeholder('Group Category')
                    ->label("Group Category"),
                Select::make('city_id')
                    ->label("Is Default City ?")
                    ->requiredWith('city_id_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('city_id_default', null) : $set('city_id_default', 'hidden')
                    ),
                Select::make('city_id_default')
                    ->label("Default City")
                    ->requiredWith('city_id')
                    ->options(getCityList())
                    ->hidden(
                        fn (Closure $get): bool => $get('city_id') == false
                    )
                    ->searchable(),
                Select::make('pincode')
                    ->label("Is Default Pincode ?")
                    ->requiredWith('pincode_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('pincode_default', null) : $set('pincode_default', 'hidden')
                    ),
                TextInput::make('pincode_default')
                    ->numeric()
                    //->maxLength(10)
                    ->placeholder('Default Pincode')
                    ->label("Default Pincode")
                    ->requiredWith('pincode')
                    ->hidden(
                        fn (Closure $get): bool => $get('pincode') == false
                    ),
                Select::make('area')
                    ->label("Is Default Area ?")
                    ->requiredWith('area_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('area_default', null) : $set('area_default', 'hidden')
                    ),
                TextInput::make('area_default')
                    //->maxLength(255)
                    ->placeholder('Default Area')
                    ->label("Default Area")
                    ->requiredWith('area')
                    ->hidden(
                        fn (Closure $get): bool => $get('area') == false
                    ),
                Select::make('mobile')
                    ->label("Is Default Mobile ?")
                    ->requiredWith('mobile_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('mobile_default', null) : $set('mobile_default', 'hidden')
                    ),
                TextInput::make('mobile_default')
                    ->numeric()
                    //->maxLength(10)
                    ->placeholder('Default Mobile')
                    ->label("Default Mobile")
                    ->requiredWith('mobile')
                    ->hidden(
                        fn (Closure $get): bool => $get('mobile') == false
                    ),
                Select::make('state_id')
                    ->label("Is Default State ?")
                    ->requiredWith('state_id_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('state_id_default', null) : $set('state_id_default', 'hidden')
                    ),
                Select::make('state_id_default')
                    ->label("Default State")
                    ->requiredWith('state_id')
                    ->options(getStateList())
                    ->hidden(
                        fn (Closure $get): bool => $get('state_id') == false
                    )
                    ->searchable(),
                Select::make('pan_no')
                    ->label("Is Default Pan No. ?")
                    ->requiredWith('pan_no_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('pan_no_default', null) : $set('pan_no_default', 'hidden')
                    ),
                TextInput::make('pan_no_default')
                    ->length(10)
                    ->placeholder('Default Pan No.')
                    ->label("Default Pan No.")
                    ->requiredWith('pan_no')
                    ->hidden(
                        fn (Closure $get): bool => $get('pan_no') == false
                    ),
                Select::make('aadhar_no')
                    ->label("Is Default Aadhar No. ?")
                    ->requiredWith('aadhar_no_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('aadhar_no_default', null) : $set('aadhar_no_default', 'hidden')
                    ),
                TextInput::make('aadhar_no_default')
                    ->numeric()
                    ->length(12)
                    ->placeholder('Default Aadhar No.')
                    ->label("Default Aadhar No.")
                    ->requiredWith('aadhar_no')
                    ->hidden(
                        fn (Closure $get): bool => $get('aadhar_no') == false
                    ),
                Select::make('gstin_no')
                    ->label("Is Default GSTIN No. ?")
                    ->requiredWith('gstin_no_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('gstin_no_default', null) : $set('gstin_no_default', 'hidden')
                    ),
                TextInput::make('gstin_no_default')
                    ->numeric()
                    ->length(15)
                    ->placeholder('Default GSTIN No.')
                    ->label("Default GSTIN No.")
                    ->requiredWith('gstin_no')
                    ->hidden(
                        fn (Closure $get): bool => $get('gstin_no') == false
                    ),
                Select::make('balance_method')
                    ->label("Is Default Balance Method ?")
                    ->requiredWith('balance_method_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('balance_method_default', null) : $set('balance_method_default', 'hidden')
                    ),
                TextInput::make('balance_method_default')
                    //->maxLength(255)
                    ->placeholder('Default Balance Method')
                    ->label("Default Balance Method")
                    ->requiredWith('balance_method')
                    ->hidden(
                        fn (Closure $get): bool => $get('balance_method') == false
                    ),
                Select::make('opening_balance')
                    ->label("Is Default Opening Balance ?")
                    ->requiredWith('opening_balance_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('opening_balance_default', null) : $set('opening_balance_default', 'hidden')
                    ),
                TextInput::make('opening_balance_default')
                    ->numeric()
                    ->placeholder('Default Opening Balance')
                    ->label("Default Opening Balance")
                    ->requiredWith('opening_balance')
                    ->hidden(
                        fn (Closure $get): bool => $get('opening_balance') == false
                    ),
                Select::make('balance_type')
                    ->label("Is Default Balance Type ?")
                    ->requiredWith('balance_type_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('balance_type_default', null) : $set('balance_type_default', 'hidden')
                    ),
                TextInput::make('balance_type_default')
                    //->maxLength(255)
                    ->placeholder('Default Balance Type')
                    ->label("Default Balance Type")
                    ->requiredWith('balance_type')
                    ->hidden(
                        fn (Closure $get): bool => $get('balance_type') == false
                    ),
                Select::make('credit_limit')
                    ->label("Is Default Credit Limit ?")
                    ->requiredWith('credit_limit_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('credit_limit_default', null) : $set('credit_limit_default', 'hidden')
                    ),
                TextInput::make('credit_limit_default')
                    ->numeric()
                    ->placeholder('Default Credit Limit')
                    ->label("Default Credit Limit")
                    ->requiredWith('credit_limit')
                    ->hidden(
                        fn (Closure $get): bool => $get('credit_limit') == false
                    ),
                Select::make('credit_days')
                    ->label("Is Default Credit Days ?")
                    ->requiredWith('credit_days_default')
                    ->options(getBooleanList())
                    ->reactive()
                    ->afterStateUpdated(
                        fn ($state, callable $set) => $state ? $set('credit_days_default', null) : $set('credit_days_default', 'hidden')
                    ),
                TextInput::make('credit_days_default')
                    ->numeric()
                    ->length(3)
                    ->placeholder('Default Credit Days')
                    ->label("Default Credit Days")
                    ->requiredWith('credit_days')
                    ->hidden(
                        fn (Closure $get): bool => $get('credit_days') == false
                    ),
            ]);
    }

    /**
     * create table
     *
     * @param Table $table
     * @return Table
     * @author BV
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('parent_id')->getStateUsing(function(Model $record) {
                    return (isset($record->getParentGroupAttribute()->name) ? $record->getParentGroupAttribute()->name : $record->parent_id);
                })->sortable()->label('Parent Group'),
                TextColumn::make('type')->sortable(),
                TextColumn::make('header')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    /**
     * get relationship
     *
     * @return array
     * @author BV
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * get pages
     *
     * @return array
     * @author BV
     */
    public static function getPages(): array
    {
        return [
            'index'  => ListAccountGroups::route('/'),
            'create' => CreateAccountGroup::route('/create'),
            'view'   => ViewAccountGroup::route('/{record}'),
            'edit'   => EditAccountGroup::route('/{record}/edit'),
        ];
    }
}

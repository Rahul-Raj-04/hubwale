<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountResource\Pages;
use App\Filament\Resources\AccountResource\RelationManagers;
use App\Models\Account;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'ERP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_id'),
                Forms\Components\TextInput::make('account_group_id'),
                Forms\Components\TextInput::make('account_address_detail_id'),
                Forms\Components\TextInput::make('account_bank_detail_id'),
                Forms\Components\TextInput::make('account_interest_id'),
                Forms\Components\TextInput::make('city_id'),
                Forms\Components\TextInput::make('state_id'),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alias')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gst_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pincode'),
                Forms\Components\TextInput::make('area')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobile')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pan_no'),
                Forms\Components\TextInput::make('aadhar_no'),
                Forms\Components\TextInput::make('gstin_no'),
                Forms\Components\TextInput::make('balance_method')
                    ->maxLength(255),
                Forms\Components\TextInput::make('opening_balance'),
                Forms\Components\TextInput::make('balance_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('credit_limit'),
                Forms\Components\TextInput::make('credit_days'),
                Forms\Components\TextInput::make('interest'),
                Forms\Components\TextInput::make('interest_ac')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tds_ac')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cr_dr')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('branch_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ifsc_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('account_no')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_id'),
                Tables\Columns\TextColumn::make('account_group_id'),
                Tables\Columns\TextColumn::make('account_address_detail_id'),
                Tables\Columns\TextColumn::make('account_bank_detail_id'),
                Tables\Columns\TextColumn::make('account_interest_id'),
                Tables\Columns\TextColumn::make('city_id'),
                Tables\Columns\TextColumn::make('state_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('alias'),
                Tables\Columns\TextColumn::make('gst_type'),
                Tables\Columns\TextColumn::make('pincode'),
                Tables\Columns\TextColumn::make('area'),
                Tables\Columns\TextColumn::make('mobile'),
                Tables\Columns\TextColumn::make('pan_no'),
                Tables\Columns\TextColumn::make('aadhar_no'),
                Tables\Columns\TextColumn::make('gstin_no'),
                Tables\Columns\TextColumn::make('balance_method'),
                Tables\Columns\TextColumn::make('opening_balance'),
                Tables\Columns\TextColumn::make('balance_type'),
                Tables\Columns\TextColumn::make('credit_limit'),
                Tables\Columns\TextColumn::make('credit_days'),
                Tables\Columns\TextColumn::make('interest'),
                Tables\Columns\TextColumn::make('interest_ac'),
                Tables\Columns\TextColumn::make('tds_ac'),
                Tables\Columns\TextColumn::make('cr_dr'),
                Tables\Columns\TextColumn::make('bank_name'),
                Tables\Columns\TextColumn::make('branch_name'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('ifsc_code'),
                Tables\Columns\TextColumn::make('account_no'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccount::route('/create'),
            'view' => Pages\ViewAccount::route('/{record}'),
            'edit' => Pages\EditAccount::route('/{record}/edit'),
        ];
    }    
}

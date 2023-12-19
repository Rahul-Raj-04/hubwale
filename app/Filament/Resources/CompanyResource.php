<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    protected static ?string $navigationGroup = 'Company Setup';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('business_type_id'),
                Forms\Components\TextInput::make('company_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('language')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('short_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('group_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fin_year_from')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fin_year_to')
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->maxLength(255),
                Forms\Components\Textarea::make('report_header')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('jurisdiction_city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('auto_gst')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gstin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('aadhar')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cst')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ecc')
                    ->maxLength(255),
                Forms\Components\TextInput::make('importer_ecc_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('service_tax_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ssi_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('generel_lic_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('wholesale_agent_lic_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('commission_lic_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('drug_lic_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cin_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('food_product_lic_no')
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('country')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('state')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pincode')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_1')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_2')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mob_1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mob_2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fax')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('branch_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_ifsc')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_ac_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('iban_no')
                    ->maxLength(255),
                Forms\Components\TextInput::make('swift_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('upi_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('upi_id')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('business_type_id'),
                Tables\Columns\TextColumn::make('company_number'),
                Tables\Columns\TextColumn::make('language'),
                Tables\Columns\TextColumn::make('company_name'),
                Tables\Columns\TextColumn::make('short_name'),
                Tables\Columns\TextColumn::make('group_name'),
                Tables\Columns\TextColumn::make('fin_year_from'),
                Tables\Columns\TextColumn::make('fin_year_to'),
                Tables\Columns\TextColumn::make('report_header'),
                Tables\Columns\TextColumn::make('jurisdiction_city'),
                Tables\Columns\TextColumn::make('auto_gst'),
                Tables\Columns\TextColumn::make('pan'),
                Tables\Columns\TextColumn::make('gstin'),
                Tables\Columns\TextColumn::make('aadhar'),
                Tables\Columns\TextColumn::make('tin'),
                Tables\Columns\TextColumn::make('cst'),
                Tables\Columns\TextColumn::make('tan'),
                Tables\Columns\TextColumn::make('ecc'),
                Tables\Columns\TextColumn::make('importer_ecc_no'),
                Tables\Columns\TextColumn::make('service_tax_no'),
                Tables\Columns\TextColumn::make('ssi_no'),
                Tables\Columns\TextColumn::make('generel_lic_no'),
                Tables\Columns\TextColumn::make('wholesale_agent_lic_no'),
                Tables\Columns\TextColumn::make('commission_lic_no'),
                Tables\Columns\TextColumn::make('drug_lic_no'),
                Tables\Columns\TextColumn::make('cin_no'),
                Tables\Columns\TextColumn::make('food_product_lic_no'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('country'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('pincode'),
                Tables\Columns\TextColumn::make('phone_1'),
                Tables\Columns\TextColumn::make('phone_2'),
                Tables\Columns\TextColumn::make('mob_1'),
                Tables\Columns\TextColumn::make('mob_2'),
                Tables\Columns\TextColumn::make('fax'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('website'),
                Tables\Columns\TextColumn::make('bank_name'),
                Tables\Columns\TextColumn::make('branch_name'),
                Tables\Columns\TextColumn::make('bank_address'),
                Tables\Columns\TextColumn::make('bank_ifsc'),
                Tables\Columns\TextColumn::make('bank_ac_no'),
                Tables\Columns\TextColumn::make('iban_no'),
                Tables\Columns\TextColumn::make('swift_code'),
                Tables\Columns\TextColumn::make('upi_code'),
                Tables\Columns\TextColumn::make('upi_id'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }    
}

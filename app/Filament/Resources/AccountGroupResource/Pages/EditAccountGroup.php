<?php

namespace App\Filament\Resources\AccountGroupResource\Pages;

use App\Filament\Resources\AccountGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccountGroup extends EditRecord
{
    protected static string $resource = AccountGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

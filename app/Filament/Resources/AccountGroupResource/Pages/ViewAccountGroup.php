<?php

namespace App\Filament\Resources\AccountGroupResource\Pages;

use App\Filament\Resources\AccountGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAccountGroup extends ViewRecord
{
    protected static string $resource = AccountGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

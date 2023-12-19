<?php

namespace App\Filament\Resources\HsnSacResource\Pages;

use App\Filament\Resources\HsnSacResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHsnSac extends ViewRecord
{
    protected static string $resource = HsnSacResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

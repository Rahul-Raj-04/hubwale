<?php

namespace App\Filament\Resources\HsnSacResource\Pages;

use App\Filament\Resources\HsnSacResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHsnSac extends EditRecord
{
    protected static string $resource = HsnSacResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

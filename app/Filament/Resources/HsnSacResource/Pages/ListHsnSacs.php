<?php

namespace App\Filament\Resources\HsnSacResource\Pages;

use App\Filament\Resources\HsnSacResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHsnSacs extends ListRecords
{
    protected static string $resource = HsnSacResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

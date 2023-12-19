<?php

namespace App\Filament\Resources\FestivalImageBusinessCategoryResource\Pages;

use App\Filament\Resources\FestivalImageBusinessCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFestivalImageBusinessCategory extends ViewRecord
{
    protected static string $resource = FestivalImageBusinessCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\FestivalImageResource\Pages;

use App\Filament\Resources\FestivalImageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFestivalImage extends ViewRecord
{
    protected static string $resource = FestivalImageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

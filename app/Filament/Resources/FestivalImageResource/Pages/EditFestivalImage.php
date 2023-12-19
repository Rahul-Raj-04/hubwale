<?php

namespace App\Filament\Resources\FestivalImageResource\Pages;

use App\Filament\Resources\FestivalImageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFestivalImage extends EditRecord
{
    protected static string $resource = FestivalImageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

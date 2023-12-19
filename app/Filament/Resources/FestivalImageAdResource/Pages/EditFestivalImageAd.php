<?php

namespace App\Filament\Resources\FestivalImageAdResource\Pages;

use App\Filament\Resources\FestivalImageAdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFestivalImageAd extends EditRecord
{
    protected static string $resource = FestivalImageAdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

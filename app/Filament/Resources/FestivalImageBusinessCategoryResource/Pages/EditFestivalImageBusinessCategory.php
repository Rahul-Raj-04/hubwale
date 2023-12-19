<?php

namespace App\Filament\Resources\FestivalImageBusinessCategoryResource\Pages;

use App\Filament\Resources\FestivalImageBusinessCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFestivalImageBusinessCategory extends EditRecord
{
    protected static string $resource = FestivalImageBusinessCategoryResource::class;

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

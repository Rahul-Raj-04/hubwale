<?php

namespace App\Filament\Resources\ImageCategoryResource\Pages;

use App\Filament\Resources\ImageCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImageCategory extends ViewRecord
{
    protected static string $resource = ImageCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

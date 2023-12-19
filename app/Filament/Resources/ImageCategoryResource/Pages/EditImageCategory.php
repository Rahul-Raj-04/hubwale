<?php

namespace App\Filament\Resources\ImageCategoryResource\Pages;

use App\Filament\Resources\ImageCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageCategory extends EditRecord
{
    protected static string $resource = ImageCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ImageCategoryResource\Pages;

use App\Filament\Resources\ImageCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateImageCategory extends CreateRecord
{
    protected static string $resource = ImageCategoryResource::class;
}

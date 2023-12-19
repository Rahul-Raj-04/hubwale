<?php

namespace App\Filament\Resources\FestivalImageBusinessCategoryResource\Pages;

use App\Filament\Resources\FestivalImageBusinessCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFestivalImageBusinessCategories extends ListRecords
{
    protected static string $resource = FestivalImageBusinessCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

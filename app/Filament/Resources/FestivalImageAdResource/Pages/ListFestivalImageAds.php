<?php

namespace App\Filament\Resources\FestivalImageAdResource\Pages;

use App\Filament\Resources\FestivalImageAdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFestivalImageAds extends ListRecords
{
    protected static string $resource = FestivalImageAdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

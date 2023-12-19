<?php

namespace App\Filament\Resources\FestivalImageResource\Pages;

use App\Filament\Resources\FestivalImageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFestivalImages extends ListRecords
{
    protected static string $resource = FestivalImageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

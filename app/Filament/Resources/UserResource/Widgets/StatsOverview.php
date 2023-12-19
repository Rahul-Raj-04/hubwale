<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\Company;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::all()->count()),
            Card::make('Total Company', Company::all()->count()),
        ];
    }
}

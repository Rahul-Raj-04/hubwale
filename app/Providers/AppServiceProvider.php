<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['fonts' => [
            'Roboto-Black',
            'Roboto-BlackItalic',
            'Roboto-Bold', 
            'Roboto-BoldItalic', 
            'Roboto-Italic', 
            'Roboto-Light', 
            'Roboto-LightItalic', 
            'Roboto-Medium', 
            'Roboto-MediumItalic', 
            'Roboto-Regular', 
            'Roboto-Thin', 
            'Roboto-ThinItalic'
        ]]);

        config(['interest_ac' => [
            'Composition(CGST) Tax Exp, A/c',
            'Composition(SGST) Tax Exp, A/c',
            'Interest Expense A/c.(Default)', 
            'Kasar A/c', 
            'Late Fee Expence A/c.(Default)', 
            'Other Expense A/c.(Default)', 
            'Penalty Expense A/c.(Default)',
        ]]);

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                     ->label('ERP'),
                NavigationGroup::make()
                    ->label('Setting'),
                NavigationGroup::make()
                    ->label('Festival Image'),
            ]);
        });

         
        Filament::registerNavigationGroups([
            'ERP',
            'Festival Image',
            'Company Setup',
            'Setting',
        ]);
    }
}

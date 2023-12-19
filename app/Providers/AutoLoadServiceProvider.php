<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Setting;
use App\Enum\Enum;

class AutoLoadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('erp.layout.menus', function($view){
            $jobwork_out = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::ADVANCE_MODUALE_MENU)->where('company_id', auth()->user()->company->id)->where('key', 'jobwork_out_required')->first();
            $jobwork_in = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::ADVANCE_MODUALE_MENU)->where('company_id', auth()->user()->company->id)->where('key', 'jobwork_in_required')->first();

            $view->with('jobwork_out', $jobwork_out ? $jobwork_out->value : null)->with('jobwork_in', $jobwork_in ? $jobwork_in->value : null);
        });
    }
}

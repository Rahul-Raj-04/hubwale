<?php

use App\Models\City;
use App\Models\State;
use App\Models\MenuStructure;

if (!function_exists('getBooleanList')) {
    /**
     * get boolean list
     *
     * @return array
     * @author BV
     */
    function getBooleanList(): array
    {
        return [
            "1" => "Yes",
            "0" => "No",
        ];
    }
}

if (!function_exists('getCityList')) {
    /**
     * get boolean list
     *
     * @return array
     * @author BV
     */
    function getCityList(): array
    {
        return City::pluck("name", "id")->all();
    }
}

if (!function_exists('getStateList')) {
    /**
     * get boolean list
     *
     * @return array
     * @author BV
     */
    function getStateList(): array
    {
        return State::pluck("name", "id")->all();
    }
}

if (!function_exists('getReportPeriod')) {
    /**
     * get report period
     *
     * @param string $reportPeriod
     * @return array
     * @author BV
     */
    function getReportPeriod(string $reportPeriod): array
    {
        if ($reportPeriod == "monthly") {
            return [
                '4'  => 'Apr',
                '5'  => 'May',
                '6'  => 'Jun',
                '7'  => 'Jul',
                '8'  => 'Aug',
                '9'  => 'Sep',
                '10' => 'Oct',
                '11' => 'Nov',
                '12' => 'Dec',
                '1'  => 'Jan',
                '2'  => 'Feb',
                '3'  => 'Mar',
            ];
        }

        if ($reportPeriod == "quarterly") {
            return [
                'apr-jun' => 'Apr - Jun',
                'jul-sep' => 'Jul - Sep',
                'oct-dec' => 'Oct - Dec',
                'jan-mar' => 'Jan - Mar',
            ];
        }

        if ($reportPeriod == "annual") {
            return [
                'apr' => 'Apr',
            ];
        }
    }
}
function checkMenuVisibilty($menuName){
    $menu = MenuStructure::where(['name' => $menuName, 'company_id' => auth()->user()->company->id])->first();
    
    if($menu && $menu->visibility){
        return 'd-block';
    } else {
        return 'd-none';
    }
    
}

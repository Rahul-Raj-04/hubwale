<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\CompanySetup;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\Setting;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CompanySetting extends Component
{
    use LivewireAlert;

    public $general_settings = [];
    public $advance_settings = [];
    public $advance_module_settings = [];
    public $master_settings = [];
    public $gst_settings = [];
    public $tds_tcs_settings = [];
    public $report_settings = [];
    public $classification_settings = [];
    public $price_list_settings = [];
    public $barcode_settings = [];
    public $share_settings = [];
    public $jobwork_out_settings = [];
    public $jobwork_in_settings = [];
    public $consultant_settings = [];
    public $apmc_settings = [];

    public $openMenu;

    public function render()
    {
        return view('livewire.erp.setting.company-setup.company-setting')->extends('erp.app');
    }

    public function mount()
    {
        $general_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::GENERAL_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($general_settings as $key => $general_setting) {
            if ($general_setting->type == 'checkbox') {
                $this->general_settings[$general_setting->key] = $general_setting->value == 1 ? true : false;
            } else {
                $this->general_settings[$general_setting->key] = $general_setting->value;
            }
        }

        $advance_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::ADVANCE_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($advance_settings as $key => $advance_setting) {
            if ($advance_setting->type == 'checkbox') {
                $this->advance_settings[$advance_setting->key] = $advance_setting->value == 1 ? true : false;
            } else {
                $this->advance_settings[$advance_setting->key] = $advance_setting->value;
            }
        }

        $advance_module_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::ADVANCE_MODUALE_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($advance_module_settings as $key => $advance_module_setting) {
            if ($advance_module_setting->type == 'checkbox') {
                $this->advance_module_settings[$advance_module_setting->key] = $advance_module_setting->value == 1 ? true : false;
            } else {
                $this->advance_module_settings[$advance_module_setting->key] = $advance_module_setting->value;
            }
        }

        $master_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::MASTER_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($master_settings as $key => $master_setting) {
            if ($master_setting->type == 'checkbox') {
                $this->master_settings[$master_setting->key] = $master_setting->value == 1 ? true : false;
            } else {
                $this->master_settings[$master_setting->key] = $master_setting->value;
            }
        }

        $gst_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::GST_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($gst_settings as $key => $gst_setting) {
            if ($gst_setting->type == 'checkbox') {
                $this->gst_settings[$gst_setting->key] = $gst_setting->value == 1 ? true : false;
            } else {
                $this->gst_settings[$gst_setting->key] = $gst_setting->value;
            }
        }

        $tds_tcs_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::TDS_TCS_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($tds_tcs_settings as $key => $tds_tcs_setting) {
            if ($tds_tcs_setting->type == 'checkbox') {
                $this->tds_tcs_settings[$tds_tcs_setting->key] = $tds_tcs_setting->value == 1 ? true : false;
            } else {
                $this->tds_tcs_settings[$tds_tcs_setting->key] = $tds_tcs_setting->value;
            }
        }

        $report_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::REPORT_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($report_settings as $key => $report_setting) {
            if ($report_setting->type == 'checkbox') {
                $this->report_settings[$report_setting->key] = $report_setting->value == 1 ? true : false;
            } else {
                $this->report_settings[$report_setting->key] = $report_setting->value;
            }
        }

        $classification_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::CLASSIFICATION_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($classification_settings as $key => $classification_setting) {
            if ($classification_setting->type == 'checkbox') {
                $this->classification_settings[$classification_setting->key] = $classification_setting->value == 1 ? true : false;
            } else {
                $this->classification_settings[$classification_setting->key] = $classification_setting->value;
            }
        }

        $price_list_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::PRICE_LIST_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($price_list_settings as $key => $price_list_setting) {
            if ($price_list_setting->type == 'checkbox') {
                $this->price_list_settings[$price_list_setting->key] = $price_list_setting->value == 1 ? true : false;
            } else {
                $this->price_list_settings[$price_list_setting->key] = $price_list_setting->value;
            }
        }

        $barcode_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::BARCODE_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($barcode_settings as $key => $barcode_setting) {
            if ($barcode_setting->type == 'checkbox') {
                $this->barcode_settings[$barcode_setting->key] = $barcode_setting->value == 1 ? true : false;
            } else {
                $this->barcode_settings[$barcode_setting->key] = $barcode_setting->value;
            }
        }

        $share_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::SHARE_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($share_settings as $key => $share_setting) {
            if ($share_setting->type == 'checkbox') {
                $this->share_settings[$share_setting->key] = $share_setting->value == 1 ? true : false;
            } else {
                $this->share_settings[$share_setting->key] = $share_setting->value;
            }
        }

        $jobwork_out_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::JOBWORK_OUT_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($jobwork_out_settings as $key => $jobwork_out_setting) {
            if ($jobwork_out_setting->type == 'checkbox') {
                $this->jobwork_out_settings[$jobwork_out_setting->key] = $jobwork_out_setting->value == 1 ? true : false;
            } else {
                $this->jobwork_out_settings[$jobwork_out_setting->key] = $jobwork_out_setting->value;
            }
        }

        $jobwork_in_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::JOBWORK_IN_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($jobwork_in_settings as $key => $jobwork_in_setting) {
            if ($jobwork_in_setting->type == 'checkbox') {
                $this->jobwork_in_settings[$jobwork_in_setting->key] = $jobwork_in_setting->value == 1 ? true : false;
            } else {
                $this->jobwork_in_settings[$jobwork_in_setting->key] = $jobwork_in_setting->value;
            }
        }

        $consultant_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::CONSULTANT_REQUIRED_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($consultant_settings as $key => $consultant_setting) {
            if ($consultant_setting->type == 'checkbox') {
                $this->consultant_settings[$consultant_setting->key] = $consultant_setting->value == 1 ? true : false;
            } else {
                $this->consultant_settings[$consultant_setting->key] = $consultant_setting->value;
            }
        }
        $apmc_settings = Setting::where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::APMC_SETUP_MENU)->where('company_id', auth()->user()->company->id)->get();
        foreach ($apmc_settings as $key => $apmc_setting) {
            if ($apmc_setting->type == 'checkbox') {
                $this->apmc_settings[$apmc_setting->key] = $apmc_setting->value == 1 ? true : false;
            } else {
                $this->apmc_settings[$apmc_setting->key] = $apmc_setting->value;
            }
        }
    }

    public function submit()
    {
        foreach ($this->general_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::GENERAL_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->advance_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::ADVANCE_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->advance_module_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::ADVANCE_MODUALE_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->master_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::MASTER_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->gst_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::GST_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->tds_tcs_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::TDS_TCS_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->report_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::REPORT_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->classification_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::CLASSIFICATION_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
                info($setting->value);
            }
        }
        foreach ($this->price_list_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::PRICE_LIST_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->barcode_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::BARCODE_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->share_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::SHARE_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->jobwork_out_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::JOBWORK_OUT_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->jobwork_in_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::JOBWORK_IN_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->consultant_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::CONSULTANT_REQUIRED_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->apmc_settings as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::COMPANY_SETUP_MENU)->where('sub_menu', Enum::APMC_SETUP_MENU)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        $this->alert('success', 'Company Setting Updated', [
            'position' => 'center',
            'toast' => true
        ]);
    }

    public function openMenu($menu)
    {
        $this->openMenu = $menu;
    }
}

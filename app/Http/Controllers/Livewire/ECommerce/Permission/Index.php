<?php

namespace App\Http\Controllers\Livewire\ECommerce\Permission;

use App\Models\ECommerceBrand;
use App\Models\ECommerceCategory;
use App\Models\ECommercePermission;
use App\Models\ECommerceProduct;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $permissions = [];
    public $mobileNumber;

    public function render()
    {
        return view('livewire.e-commerce.permission.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->permissions = ECommercePermission::where('company_id', auth()->user()->company_id)->get();
    }

    public function savePermission()
    {
        $this->dispatchBrowserEvent('top-select-implement');
        $this->validate([
            'mobileNumber' => ['required','array', 'min:1'],
        ]);

        foreach ($this->mobileNumber as $number) {
            $number = (int) $number;
            $user = User::where('mobile', $number)->first();
            if ($user) {
                if (!ECommercePermission::where(['user_id' => $user->id, 'company_id' => auth()->user()->company_id])->first()) {
                    ECommercePermission::create([
                        'user_id' => $user->id,
                        'company_id' => auth()->user()->company_id,
                        'mobile' => $number
                    ]);
                }
            } else {
                if (is_int($number) && strlen($number) == 10) {
                    ECommercePermission::create([
                        'user_id' => null,
                        'company_id' => auth()->user()->company_id,
                        'mobile' => $number
                    ]);
                }
            }
        }
        return redirect()->route('e-commerce.permission.index');
    }

    public function removePermission($permissionId)
    {
        $permission = ECommercePermission::find($permissionId);
        $permission->delete();
        toast('Permission updated successfully.','success');
        return redirect()->route('e-commerce.permission.index');
    }
}

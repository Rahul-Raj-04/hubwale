<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\Security;

use Livewire\Component;
use App\Models\MenuStructure;

class MenuOption extends Component
{
    public $menus = [];
    public function mount()
    {
        $allMenus = MenuStructure::where('company_id', auth()->user()->company->id)->get();
        foreach($allMenus as $menu)
        {
            $this->menus[$menu->name] = $menu->visibility == 1 ? true : false;
        }
    }

    public function save()
    {
         foreach($this->menus as $key => $menu)
         {
            $findMenu = MenuStructure::where(['name' => $key, 'company_id' => auth()->user()->company->id])->first();
            if($findMenu){
                $findMenu->visibility = $menu == true ? 1 : 0;
                $findMenu->save();
            } else {
                MenuStructure::create([
                    'name' => $key,
                    'visibility' => $menu,
                    'company_id' => auth()->user()->company->id
                ]);
            }
         }
    }

    public function render()
    {
        return view('livewire.erp.setting.security.menu-option');
    }
}

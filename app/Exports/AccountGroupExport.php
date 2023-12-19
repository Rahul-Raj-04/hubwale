<?php

namespace App\Exports;

use App\Models\AccountGroup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class AccountGroupExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('erp.account-group.export', [
            'accountGroups' => AccountGroup::all()
        ]);
    }
}

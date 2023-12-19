<?php

namespace App\Exports;

use App\Models\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AccountsExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    public $data = [];

    public function __construct() 
    {
        $accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        foreach ($accounts as $key => $account) {
            $this->data[] = [
                'index' => $key + 1,
                'account_name'  => $account->name,
                'city'  => $account->city ? $account->city->name : '',
                'group_name'  => $account->account_group->name,
                'opening_balance'  => $account->opening_balance,
            ];
        }
    }

    public function styles(Worksheet $worksheet) 
    {
        return [
            1   =>  ['font' => ['bold' => true]],
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 43,
            'C' => 20,
            'D' => 40,
            'E' => 15,            
        ];
    }

    public function headings(): array 
    {
        return [
            'Index',
            'Account Name',
            'city',
            'Group Name',
            'Opening Balance'
        ];
    }
    
    public function array(): array 
    {
        return $this->data;
    }
}

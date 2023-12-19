<?php

namespace App\Exports\Erp\Master\Service;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Export implements FromArray, WithHeadings, WithStyles
{
    public $data = [];

	public function __construct()
    {
    	$services = Service::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    	foreach ($services as $key => $service) {
    		$this->data[] =  [
    			'index' => $key + 1,
    			'name' => $service->name,
    		];	
    	}
    }

    public function styles(Worksheet $worksheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
        	'Index',
            'Name'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return $this->data;
    }
}

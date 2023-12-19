<?php

namespace App\Exports\Erp\Master\PriceList;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PriceListExport implements FromArray, WithHeadings, WithStyles
{
    public $data = [];

	public function __construct()
    {
    	$services = Service::Where('company_id', auth()->user()->company->id)->get();
    	foreach ($services as $key => $service) {
    		$this->data[] =  [
    			'index' => $key + 1,
    			'name' => $service->name,
    			'product_rate' => null,
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
            'Name',
            'Product Rate'
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

<?php

namespace App\Exports\Erp\Master\CostCentre;

use App\Models\CostCategory;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class CostCategoryExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
 	public $data = [];

	public function __construct()
    {
    	$costCategories = CostCategory::Where('company_id', auth()->user()->company->id)->get();
    	foreach ($costCategories as $key => $costCategory) {
    		$this->data[] =  [
    			'index' => $key + 1,
    			'category_name' => $costCategory->name,
    		];	
    	}
    }

    public function styles(Worksheet $worksheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,          
        ];
    }

    public function headings(): array
    {
        return [
        	'Index',
            'Category Name',
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

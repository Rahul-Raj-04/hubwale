<?php

namespace App\Exports\Erp\Master\CostCentre;

use App\Models\CostCentre;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class CostCentreExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    public $data = [];

	public function __construct()
    {
    	$costCentres = CostCentre::Where('company_id', auth()->user()->company->id)->get();
    	foreach ($costCentres as $key => $costCentre) {
    		$this->data[] =  [
    			'index' => $key + 1,
    			'center_name' => $costCentre->name,
    			'category_name' => $costCentre->cost_category->name,
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
            'B' => 20,
            'C' => 20,           
        ];
    }

    public function headings(): array
    {
        return [
        	'Index',
            'Centre Name',
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

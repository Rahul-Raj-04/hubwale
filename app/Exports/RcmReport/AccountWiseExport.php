<?php

namespace App\Exports\RcmReport;

use App\Models\RCMVoucher;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AccountWiseExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{

	public $data = [];

	public function __construct($id)
    {
    	$rcmVouchers = RCMVoucher::where('opposite_account_id', $id)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    	foreach ($rcmVouchers as $key => $rcmVoucher) {
    		$this->data[] =  [
    			'date' => $rcmVoucher->date,
    			'vou_type' => $rcmVoucher->vou_type == 'bank_payment' ? 'RCMBp' : 'RCMCp',
				'vou_no' => $rcmVoucher->vou_no ? $rcmVoucher->vou_no : '-',
				'doc_no' => $rcmVoucher->doc_no ? $rcmVoucher->doc_no : '-',
				'city' => $rcmVoucher->account->city ? $rcmVoucher->account->city->name : '-',
				'sale_parchesh_account' => $rcmVoucher->account->name,
				'created_at' => $rcmVoucher->created_at,
				'updated_at' => $rcmVoucher->updated_at,
                'gst_3' => '',
                'gst_5' => '',
                'gst_12' => '',
                'gst_18' => '',
                'gst_28' => '',
                'cess' => ''
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
            'A' => 15,
            'B' => 10,
            'C' => 10,
            'D' => 10,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 10,
            'J' => 10,
            'K' => 10,
            'L' => 10,
            'M' => 10            
        ];
    }

    public function headings(): array
    {
        return [
        	'Date',
            'Voucher Type',
            'Vou No',
            'Doc No',
            'City Name',
            'Sale/Purh.A/C.',
            'Created At',
            'Updated At',
            'GST 3%',
            'GST 5%',
            'GST 12%',
            'GST 18%',
            'GST 28%',
            'Cess'
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

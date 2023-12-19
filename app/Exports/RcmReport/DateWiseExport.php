<?php

namespace App\Exports\RcmReport;

use App\Models\RCMVoucher;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DateWiseExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{

    public $data = [];

	public function __construct($date)
    {
    	$rcmVouchers = RCMVoucher::whereDate('date', $date)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    	foreach ($rcmVouchers as $key => $rcmVoucher) {
    		$this->data[] =  [
    			'vou_type' => $rcmVoucher->vou_type == 'bank_payment' ? 'RCMBp' : 'RCMCp',
				'vou_no' => $rcmVoucher->vou_no ? $rcmVoucher->vou_no : '-',
				'doc_no' => $rcmVoucher->doc_no ? $rcmVoucher->doc_no : '-',
				'account name' => $rcmVoucher->account->name ? $rcmVoucher->account->name : '-',
				'city' => $rcmVoucher->account->city ? $rcmVoucher->account->city->name : '-',
				'opposite account' => $rcmVoucher->opposite_account->name,
				'amount' => $rcmVoucher->amount,
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
            'D' => 25,
            'E' => 20,
            'F' => 20,
            'G' => 10,
            'H' => 20,
            'I' => 20,
            'J' => 10,
            'K' => 10,
            'L' => 10,
            'M' => 10,
            'N' => 10,
            'O' => 10
        ];
    }

    public function headings(): array
    {
        return [
            'Voucher Type',
            'Vou No',
            'Doc No',
            'Party Name',
            'City Name',
            'Opposite A/C',
            'Taxable Amount',
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

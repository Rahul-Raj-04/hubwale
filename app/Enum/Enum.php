<?php

namespace App\Enum;

class Enum
{
	const PLAN_USAGE_TRANSACTION_TYPE = 'Referral';
	const PLAN_USAGE_TRANSACTION_DESCRIPTION = 'Refer extra benefit';
	const FI_DOWNLOAD_TYPE = 'FI download';
	const FI_DOWNLOAD_DESCRIPTION = 'Festival image download';
	const MAILING_LETTER_FIELD = [
		'Account Detail' =>[
			'address_1' => 'Address-1',
			'address_2' => 'Address-2',
			'address_3' => 'Address-3',
			'address_4' => 'Address-4',
			'city' => 'City',
			'pincode' => 'Pincode',
			'area' => 'Area',
			'state' => 'State',
			'Mobile_1' => 'Mobile-1',
			'Phone_1_O' => 'Phone-1(O)',
			'Phone_2_O' => 'Phone-2(O) ',
			'Phone_1_R' => 'Phone-1(R) ',
			'Phone_2_R' => 'Phone-2(R)',
			'Fax_1' => 'Fax-1',
			'Fax_2' => 'Fax-2',
			'contact_person_1' => 'Contact Person-1',
			'contact_person_2' => 'Contact Person-2',
			'category' => 'Category',
			'email' => 'E-mail',
			'website' => 'Website',
			'Factory' => 'Factory'
		],
		'Other Details' => [
			'date' => 'Date',
			'day' => 'Day',
			'month' => 'Month',
			'year' => 'Year'
		]
	];
	
	//Company Setup 
	const COMPANY_SETUP_MENU = 'Company Setup';

	//Company Setup => General setup 
	const GENERAL_SETUP_MENU = 'General Setup';
	const AUDIT_OPTION_HEADER = 'Audit Option';
	const ENTRY_OPTIONS_HEADER = 'Entry Options';
	const OTHER_OPTION_HEADER = 'Other Option';
	const AUTO_HAVALA_ROUND_OFF_HEADER = 'Auto Havala Round Off';
	const MULTI_LANGUAGE_OPTION_HEADER = 'Multi Language Option';

	// Company Setup => Advance setup
	const ADVANCE_SETUP_MENU = 'Advance Setup';
	const ADVANCE_OPTIONS_HEADER = 'Advance Options';
	const USER_OPTIONS_HEADER = 'User Options';
	const STOCK_SETUP_HEADER = 'Stock Setup';
	const WEIGHT_SCALE_DETAIL_HEADER = 'Weight Scale Detail';
	const ADV_VOUCHER_HEADER = 'Adv. Voucher';

	// Company Setup => Advance moduales
	const ADVANCE_MODUALE_MENU = 'Advance Moduale';
	const E_COMMERCE_SETUP_HEADER = 'E-Commerce Setup';
	const ICICI_INTEGRATION_HEADER = 'ICICI Integration';
	const ADVANCE_MODUALES_HEADER = 'Advance Moduales';

	// Company Setup => Master Setup
	const MASTER_SETUP_MENU = 'Master Setup';
	const ACCOUNTS_HEADER = 'Accounts';
	const PRODUCTS_HEADER = 'Products';

	//Company Setup => Gst Setup
	const GST_SETUP_MENU = 'GST Setup';

	//Company Setup => TDS/TCS Setup
	const TDS_TCS_SETUP_MENU = 'TDS/TCS Setup';

	//Company Setup => Report Setup
	const REPORT_SETUP_MENU = 'Report Setup';

	//Company Setup => Classification Setup
	const CLASSIFICATION_SETUP_MENU = 'Classification Setup';

	//Company Setup => Classification Setup
	const PRICE_LIST_SETUP_MENU = 'PriceList Setup';

	//Company Setup => Barcode Setup
	const BARCODE_SETUP_MENU = 'Barcode Setup';

	//Company Setup => Share Setup
	const SHARE_SETUP_MENU = 'Share Setup';

	//Company Setup => Jobwork Out Setup
	const JOBWORK_OUT_SETUP_MENU = 'Jobwork Out Setup';

	//Company Setup => Jobwork Out Setup
	const JOBWORK_IN_SETUP_MENU = 'Jobwork In Setup';

	//Company Setup => Consultant Required
	const CONSULTANT_REQUIRED_SETUP_MENU = 'Consultant Required';

	//Company Setup => APMC Required
	const APMC_SETUP_MENU = 'APMC Setup';

	// Voucher Setup
	const VOUCHER_SETUP_MENU = 'Voucher Setup';

	// Voucher => Bank Payment Setup
	const BANK_PAYMENT_SETUP = 'Bank Payment';
	
	// Voucher => Bank Receipt Setup
	const BANK_RECEIPT_SETUP = 'Bank Receipt';

	// Voucher => Cash Payment Setup
	const CASH_PAYMENT_SETUP = 'Cash Payment';
	
	// Voucher => Cash Receipt Setup
	const CASH_RECEIPT_SETUP = 'Cash Receipt';

	// Voucher => Contra Setup
	const CONTRA_SETUP = 'Contra';

	// Voucher => Journal Setup
	const JOURNAL_SETUP = 'Journal';

	// Voucher => Credit Note Setup
	const CREDIT_NOTE_SETUP = 'Credit Note';
	
	// Voucher => Debit Note Setup
	const DEBIT_NOTE_SETUP = 'Debit Note';

	// Voucher => Purchase Invoice Setup
	const PURCHASE_INVOICE_SETUP = 'Purchase Invoice';

	// Voucher => Purchase Return Setup
	const PURCHASE_RETURN_SETUP = 'Purchase Return';

	// Voucher => Purchase Quotation Setup
	const PURCHASE_QUOTATION_SETUP = 'Purchase Quotation';

	// Voucher => Sales Invoice Setup
	const SALES_INVOICE_SETUP = 'Sales Invoice';

	// Voucher => Sales Return Setup
	const SALES_RETURN_SETUP = 'Sales Return';

	// Voucher => Sales Quotation Setup
	const SALES_QUOTATION_SETUP = 'Sales Quotation';

	// Voucher => Credit Note With Stock Setup
	const CREDIT_WITH_STOCK_SETUP = 'Credit Note With Stock';

	// Voucher => Debit Note With Stock Setup
	const DEBIT_WITH_STOCK_SETUP = 'Debit Note With Stock';

	// Voucher => Credit Note With Out Stock Setup
	const CREDIT_WITH_OUT_STOCK_SETUP = 'Credit Note With Out Stock';

	// Voucher => Debit Note With Out Stock Setup
	const DEBIT_WITH_OUT_STOCK_SETUP = 'Debit Note With Out Stock';
	
	// Voucher => Production Setup
	const PRODUCTION_SETUP = 'Production';

	// Voucher => Stock Transfer Setup
	const STOCK_TRANSFER_SETUP = 'Stock Transfer';

	// Voucher => GST Expense Setup
	const GST_EXPENSE_SETUP = 'GST Expense';
	
	// Voucher => GST Income Setup
	const GST_INCOME_SETUP = 'GST Income';
	
	// Voucher => GST Journal Setup
	const GST_JOURNAL_SETUP = 'GST Journal';
	
	// Voucher => Utilization Entry Setup
	const UTILIZATION_ENTRY_SETUP = 'Utilization Entry';
	
	// Voucher => GST Bank Payment Setup
	const GST_BANK_PAYMENT_SETUP = 'GST Bank Payment';
	
	// Voucher => GST Cash Payment Setup
	const GST_CASH_PAYMENT_SETUP = 'GST Cash Payment';
	
	// Voucher => RCM Bank Payment Setup
	const RCM_BANK_PAYMENT_SETUP = 'RCM Bank Payment';
	
	// Voucher => RCM cash Payment Setup
	const RCM_CASH_PAYMENT_SETUP = 'RCM Cash Payment';
	
	const DECIMAL_POINT = 'Decimal Point';
	const TRANSACTION_BANK_PARENT_ACCOUNT_GROUPS = ['Bank Accounts (Banks)', 'Bank OCC a/c']; 
	const TRANSACTION_CASH_PARENT_ACCOUNT_GROUPS = ['Cash-in-hand'];
	const PRICE_LIST = [
		'salePurchases' => [
			['key'	=>  'jobwork_in', 'val' 	=> 	'Jobwork In'],
			['key'	=>  'jobwork_out', 'val' 	=> 	'Jobwork Out'],
			['key'	=>  'purchase', 'val' 		=> 	'Purchase'],
			['key'	=> 	'sales', 'val'			=>	'Sales'],
		],
		'partyLevels' => [
			['key'	=>  'none', 'val' 		=> 	'None'],
			['key'	=>  'product', 'val' 	=> 	'Product'],
			['key'	=>  'group', 'val' 		=> 	'Group'],
			['key'	=>  'category', 'val' 	=> 	'Category'],
		],
		'productLevels' =>	[
			['key'	=>  'none', 'val'	=>	'None'],
			['key'	=>  'party', 'val' 	=>	'Party'],
			['key'	=>  'city', 'val' 	=>	'City'],
			['key'	=>  'area', 'val' 	=>	'Area'],
			['key'	=>  'group', 'val'	=>	'Group'],
		],
		'rateTypes' => [
			['key'	=>  "%discount", 'val' 	=>	"% discount"],
			['key'	=>  'rate', 'val'			=>	'Rate'],
		],	
		'askOns' =>	[
			['key'	=>  'always', 'val'	=>	'Always'],
			['key'	=>  'never', 'val'	=>	'Never'], 
			['key'	=>  'on_not_found', 'val' =>	'On Not Found'], 
		],
	];

	// Transaction CN DN Entry
	const CN_ENTRY_W_O_STOCK = 'CN Entry w/o stock';
	const DN_ENTRY_W_O_STOCK = 'DN Entry w/o stock';
	const CN_ENTRY_WITH_STOCK = 'CN Entry with stock';
	const DN_ENTRY_WITH_STOCK = 'DN Entry with stock';
	const CN_DN_ENTRY_SELECT_OPTION = [
		'balance_type' => [
			['key' => 'cash', 'val' => 'Cash'],
			['key' => 'debit', 'val' => 'Debit']
		],
		'effect' => [
			['key' => 'increase_sales', 'val' => 'Increase Sales'],
			['key' => 'increase_purchase', 'val' => 'Increase Purchase'],
			['key' => 'decrease_sales', 'val' => 'Decrease Sales'],
			['key' => 'decrease_purchase', 'val' => 'Decrease Purchase']
		],
		'tax_bill_of_supply' => [
			['key' => 'tax_invoice', 'val' => 'Tax Invoice'],
			['key' => 'bill_of_supply', 'val' => 'Bill Of Supply'],
			['key' => 'other', 'val' => 'Other']
		],
		'reason' => [
			['key' => '01_sales_return', 'val' => '01-Sales Return'],
			['key' => '02_post_sale', 'val' => '02-Post Sale Discount'],
			['key' => '03_deficiency_services', 'val' => '03-Deficiency in service'],
			['key' => '04_correction_invoice', 'val' => '04-Correction in Invoice'],

			['key' => '05_change_pos', 'val' => '05-Change in POS'],

			['key' => '06_finalization_provisional', 'val' => '06-Finalization of Provisional Assessment'],

			['key' => '07_otheres', 'val' => '07-Others'],
		],
		'stock_effect' => [
			['key' => 1, 'val' => 'Yes'],
			['key' => 0, 'val' => 'No']
		]
	];

	// Transaction Jobwork Out
	const JOBWORK_OUT_TYPES 	= ['order', 'issue', 'receipt', 'billing', 'jobwork_out_order_opening', 'jobwork_out_issue_opening', 'physical_stock_verification'];

	const JOBWORK_OUT_ORDER 	= 'order';
	const JOBWORK_OUT_ISSUE 	= 'issue';
	const JOBWORK_OUT_RECEIPT 	= 'receipt';
	const JOBWORK_OUT_BILLING 	= 'billing';
	
	const JOBWORK_OUT_TAX_BILL_SUPPLY = [
		'tax_invoice' 		=> 'Tax Invoice',
		'bill_of_supply' 	=> 'Bill of Supply',
		'other' 			=> 'Other',
	];

	const JOBWORK_OUT_PROD_TYPE = [
		'raw_material' 		=> 'Raw Material',
		'finished_goods' 	=> 'Finished Goods',
		'scrap' 			=> 'Scrap',
	];

	// Transaction Jobwork In
	const JOBWORK_IN_TYPES 		= ['order', 'issue', 'receipt', 'billing', 'production', 'issue_other', 'jobwork_in_order_opening', 'jobwork_in_receipt_opening', 'jobwork_in_production_opening'];

	const JOBWORK_IN_ORDER 			= 'order';
	const JOBWORK_IN_ISSUE 			= 'issue';
	const JOBWORK_IN_RECEIPT 		= 'receipt';
	const JOBWORK_IN_BILLING 		= 'billing';
	const JOBWORK_IN_PRODUCTION 	= 'production';
	const JOBWORK_IN_ISSUE_OTHER 	= 'issue_other';
		
	const JOBWORK_IN_TAX_BILL_SUPPLY = [
		'tax_invoice' 		=> 'Tax Invoice',
		'bill_of_supply' 	=> 'Bill of Supply',
		'other' 			=> 'Other',
	];

	const JOBWORK_IN_PRODUCTION_TYPE = [
		'raw_material' 		=> 'Raw Material',
		'finished_goods' 	=> 'Finished Goods',
		'scrap' 			=> 'Scrap',
		'semi_finished' 	=> 'Semi Finished',
		'wastage' 			=> 'Wastage',
		'bi_product' 		=> 'Bi Product',
		'loss' 				=> 'Loss',
	];

	const JOBWORK_IN_ISSUE_OTHER_TYPE = [
		'scrap' 			=> 'Scrap',
		'damaged_goods' 	=> 'Damaged Goods',
		'raw_material' 		=> 'Raw Material',
		'wastage' 			=> 'Wastage',
	];

	const JOBWORK_IN_ORDER_TYPE = [
		'raw_material' 		=> 'Raw Material',
		'finished_goods' 	=> 'Finished Goods',
		'scrap' 			=> 'Scrap',
	];

	// Transaction Journal Entry
	const JOURNAL_ENTRY_VOU_TYPE = [
		'bank_payment',
		'bank_receipt',
		'cash_payment',
		'cash_receipt',
		'contra',
		'creadit_note',
		'debit_note',
		'journal'
	];

	const BALANCE_TYPE = [
		'credit' => 'CR',
		'debit' => 'DB'
	];

	// Transaction Quick Entry
	const QUICK_ENTRY_CASH_BANK_MODULE = 'cash_bank_entry';
	const QUICK_ENTRY_JOURNAL_MODULE = 'journal';

	const QUICK_ENTRY_CASH_BANK_TYPE = [
		'receipt' => 'Receipt',
		'payment' => 'Payment'
	];

	const QUICK_ENTRY_JOURNAL_TYPE = [
		'journal' => 'Journal',
		'credit_note' => 'Credit Note',
		'debit_note' => 'Debit Note'
	];

	// Consultant -> provisional Invoice -> Invoive Type
	const PROVISIONAL_INVOICE_TYPES = [
		'prov_bill_gst' 		=> 'Prov. Bill (GST)',
	];

	// Consultant -> Bank Receipt
	const CONSULTANT_BANK_RECEIPT = 'bank_receipt';
	const CONSULTANT_CASH_RECEIPT = 'cash_receipt';

	// Master other info
	const JOBWORK_IN_ORDER_OPENING 			= 	'jobwork_in_order_opening';
	const JOBWORK_IN_RECEIPT_OPENING 		= 	'jobwork_in_receipt_opening';
	const JOBWORK_IN_PRODUCTION_OPENING 	= 	'jobwork_in_production_opening';

	const JOBWORK_OUT_ORDER_OPENING 		= 	'jobwork_out_order_opening';
	const JOBWORK_OUT_ISSUE_OPENING 		= 	'jobwork_out_issue_opening';
	const PHYSICAL_STOCK_VERIFICATION		= 	'physical_stock_verification';

	const MASTER_JOBWORK_IN_OUT_TYPES = [
		'jobwork_in_order_opening',
		'jobwork_in_receipt_opening',
		'jobwork_in_production_opening',
		'jobwork_out_order_opening',
		'jobwork_out_issue_opening',
		'physical_stock_verification',
	];

	// Tax retails for direct invoices
	const TAX_RETAILS = [
		'tax_invoice' 		=>	'Tax Invoice',
		'retail_invoice' 	=>  'Retail Invoice',
		'other' 			=>  'Other',
	];	
  
	// GST RMC Voucher
	const RCM_BANK_PAYMENT = 'bank_payment';
	const RCM_CASH_PAYMENT = 'cash_payment';

	const RCM_GST_TYPE = [
		'local_state' => 'Local State',
		'out_state' => 'Out State'
	];

	// GST Expense
	const GST_EXPENSE_TYPE = [
		'gst' => 'GST',
		'igst' => 'IGST',
		'gst_inter_state' => 'GST (Inter State)',
		'igst_intra_state' => 'IGST (Intra State)',
		'gst_cap_goods' => 'GST (Cap. Goods)',
		'igst_cap_goods' => 'IGST (Cap. Goods)',
		'composite' => 'Composite',
		'urd_rcm' => 'URD-RCM',
		'urd_rcm_no_itc' => 'URD-RCM - NO ITC',
		'exempt' => 'Exempt',
		'none_gst' => 'Non Gst'
	];

	// GST Income
	const GST_INCOME_TYPE = [
		'gst' => 'GST',
		'igst' => 'IGST',
		'gst_inter_state' => 'GST (Inter State)',
		'igst_intra_state' => 'IGST (Intra State)',
		'gst_cap_goods' => 'GST (Cap. Goods)',
		'igst_cap_goods' => 'IGST (Cap. Goods)',
		'exempt' => 'Exempt',
		'export' => 'Export',
		'export_rebate' => 'Export (Rebate)',
		'export_with_pay' => 'Export with pay',
		'sez' => 'SEZ',
		'sez_rebate' => 'SEZ Rebate',
		'sez_with_pay' => 'SEZ with pay',
		'export_gst' => 'Export GST (0.1%)',
		'export_igst' => 'Export IGST (0.1%)'
	];

	// Gst GstEntry
	const GST_BANK_PAYMENT = 'bank_payment';
	const GST_CASH_PAYMENT = 'cash_payment';

	// Utilization Entry 
	const UTILIZATION_FROM = [
		'ITC Central Tax',
		'ITC State/UT Tax',
		'ITC Integrated Tax',
		'Cash Ledger(CGST)',
		'Cash Ledger(SGST)',
		'Cash Ledger(IGST)'
	];

	const UTILIZATION_FOR = [
		'Central Tax',
		'Integrated Tax',
		'Interest',
		'Penalty',
		'Fees',
		'Other'
	];

	// Gst Journal Entry
	const GST_JOURNAL_TYPE = [
		'opening' => 'Opening',
		'itc_increase' => 'ITC Increase',
		'itc_decrease' => 'ITC Decrease',
		'tax_liability_increase' => 'Tax Liability Increase',
		'tax_liability_decrease' => 'Tax Liability Decrease',
		'cash_ledger_credit' => 'Cash Ledger Credit',
		'import_rcm' => 'Import RCM'
	];

	const GST_JOURNAL_ENTRY_SUB_TYPE = [
		'opening' => [
			'Input Tax Credit',
			'Cash Ledger',
			'Tax Liability'
		],
		'itc_increase' => [
			'Other',
			'RCM-URD ITC',
			'RCM Capital Goods(URD)',
			'RCM Service(URD)',
			'NRCM-URD ITC',
			'NRCM Capital Goods',
			'NRCM Service'
		],
		'itc_decrease' => [
			'(d) Amount in terms of rule 42 (2)(a)',
			'(g) Any other liability (Specify)',
			'(b) Amount in terms of rule 42 (1)(m)',
			'(a) Amount in terms of rule 37 (2)',
			'(c) Amount in terms of rule 43 (1)(h)',
			'(e) Amount in terms of rule 42 (2)(b) ',
			'(f) On account of amount paid subsequent to reversal of ITC',
			'(g) Ineligible ITC Section 17(5)',
			'ITC Refund Claim'
		],
		'tax_liability_increase' => [
			'Other'
		],
		'cash_ledger_credit' => [
			'GST-TDS',
			'GST-TCS',
			'Other'
		]
	];

	const GST_JOURNAL_ENTRY_TYPE = [
		'Tax',
		'Interest',
		'Penalty',
		'Late Fee',
		'Other'
	];

	CONST TRADING 		= 	'Trading';
	CONST PROFITLOSS 	= 	'Profit & Loss';
	CONST BALANCESHEET 	= 	'Balance Sheet';

	CONST PURCHASE_ENTRY_TYPE	=	['purchase_invoice', 'purchase_return', 'cheque_from_purchase'];
	CONST PURCHASE_INVOICE 		= 	'purchase_invoice';
	CONST PURCHASE_RETURN 		= 	'purchase_return';
	CONST CHEQUE_FROM_PURCHASE 	= 	'cheque_from_purchase';
	
	CONST SALES_ENTRY_TYPE	=	['sales_invoice', 'sales_return'];
	CONST SALES_INVOICE 		= 	'sales_invoice';
	CONST SALES_RETURN 			= 	'sales_return';

	CONST MASTER_GST_INVOICE_TYPE = [
		'Exempt',
		'Export',
		'Export GST(0.1%)',
		'Export IGST(0.1%)',
		'Export with pay',
		'Export(Rebate)',
		'GST',
		'IGST',
		'Other',
		'SEZ',
		'SEZ with pay',
		'SEZ Rebate'
	];

	CONST GST_UNITS = [
		'BAG_BAGS',
		'BAL-BALS',
		'BDL-BUNDLES',
		'BKL-BUCKLES',
		'BOU-BILLION OF UNITS',
		'BOX-BOX',
		'BTL-BOTTLES',
		'BUN-BUNCHES',
		'CAN-CANS',
		'CBM-CUBIC METERS',
		'CCM-CUBIC CENTIMETERS',
		'CMS-CENTIMETERS',
		'CTN-CARTONS',
		'DOZ-DOZENS',
		'DRM-DRUMS',
		'GGK-GREAT GROSS',
		'GMS-GRAMMES',
		'GRS-GROSS',
		'GYD-GROSS-YARDS',
		'KGS-KILOGRAMS',
		'KLR-KILOLITRE',
		'KME-KILOMETERE',
		'LTR-LITRES',
		'MLT-MILILITRE',
		'MTR-METERS',
		'MTS-METRIC TON',
		'NOS-NUMBERS',
		'OTH-OTHERS',
		'PAC-PACKS',
		'PCS-PRICES',
		'PRS-PAIRS',
		'ROL-ROLLS',
		'SET-SETS',
		'SQF-SQUARE FEET',
		'SQM-SQUARE METERS',
		'SQY-SQUARE YARDS',
		'TBS-TABLETS',
		'TGM-TEN GROSS',
		'THD-THOUSANDS',
		'TON-TONNES',
		'TUB-TUBES',
		'UGS-US GALLONS',
		'UNT-UNITS',
		'YDS-YARDS'
	];

	public static function getReportPeriod(string $reportPeriod = null): array
	{
		if ($reportPeriod == "monthly") {
			return [
				'4'  => 'Apr',
				'5'  => 'May',
				'6'  => 'Jun',
				'7'  => 'Jul',
				'8'  => 'Aug',
				'9'  => 'Sep',
				'10' => 'Oct',
				'11' => 'Nov',
				'12' => 'Dec',
				'1'  => 'Jan',
				'2'  => 'Feb',
				'3'  => 'Mar',
			];
		}

		if ($reportPeriod == "quarterly") {
			return [
				'apr-jun' => 'Apr - Jun',
				'jul-sep' => 'Jul - Sep',
				'oct-dec' => 'Oct - Dec',
				'jan-mar' => 'Jan - Mar',
			];
		}

		if ($reportPeriod == "annual") {
			return [
				'apr' => 'Apr',
			];
		}
	}
}
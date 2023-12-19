<?php

namespace App\Http\Traits;

use App\Models\GstCommodity;
use App\Models\AccountGroup;
use App\Models\Account;
use App\Models\GstSlab;
use App\Models\Setting;
use App\Enum\Enum;
use App\Models\MenuStructure;

/**
 * To fetch gst Company Setup
 */
trait CompanySetupTrait
{
	public function companySetup($Company_id) {

		$this->addAccountGroups($Company_id);
		$this->addAccounts($Company_id);
		$this->addGstSlabs($Company_id);
		$this->addGstCommoditys($Company_id);
        $this->addDefaultSettings($Company_id);
        $this->addMenuStructure($Company_id);
	}

    private function addAccountGroups($company_id)
    {
    	$accountGroups = $this->getAccountGroups();

        foreach ($accountGroups as $account) {

            AccountGroup::create([
                'company_id' 				=> 	$company_id,
                'name' 						=> 	$account['name'],
                'header' 					=> 	$account['name'],
                'type' 						=> 	$account['type'],
                'sequence' 					=> 	$account['sequence'],
                'is_default' 				=> 	$account['is_default'],
                'category' 					=> 	$account['category'],
                "balance_method_default" 	=> 	$account['balance_method_default'],
                "balance_type_default" 		=> 	$account['balance_type_default'],
                "account_address_details" 	=> 	$account['account_address_details'],
                "account_interest" 			=>	$account['account_interest'],
                "account_bank_details" 		=>	$account['account_bank_details'],
                "city_id" 					=>	$account['city_id'],
                "pincode" 					=>	$account['pincode'],
                "area" 						=>	$account['area'],
                "mobile" 					=>	$account['mobile'],
                "state_id" 					=>	$account['state_id'],
                "pan_no" 					=>	$account['pan_no'],
                "aadhar_no" 				=>	$account['aadhar_no'],
                "gstin_no" 					=>	$account['gstin_no'],
                "credit_limit" 				=>	$account['credit_limit'],
                "credit_days" 				=>	$account['credit_days'],
                "credit_days" 				=>	$account['credit_days'],
                "registration_type" 		=>	$account['registration_type'],
            ]);
        }

        foreach ($accountGroups as $account) {

            $parentGroup = AccountGroup::where([['name', $account['parent_group']], ['company_id', $company_id]])->first();
            $group = AccountGroup::where([['name', $account['name']], ['company_id', $company_id]])->update(['parent_id' => $parentGroup->id]);
        }
    }

    private function addAccounts($company_id)
    {
    	$accounts = $this->getAccounts();

    	foreach ($accounts as $account) {

            $accountGroup  = AccountGroup::where([['name', $account['account_group_name']], ['company_id', $company_id]])->first();

            Account::create([
                'name' 				=>	$account['name'],
                'company_id' 		=>	$company_id,
                'account_group_id'  =>	$accountGroup->id,
                'is_default'        =>	1,
                "balance_type"      => array_key_exists('balance_type', $account) ? $account['balance_type'] : null,
                "opening_balance"   =>  array_key_exists('opening_balance', $account) ? $account['opening_balance'] : null 
            ]);
        }
    }

    private function addGstSlabs($company_id)
    {
    	$gstSlabs = $this->getGstSlabs();

    	foreach ($gstSlabs as $gstSlab) {

            GstSlab::create([
                'company_id' 		=> 	$company_id,
                'gst_slab' 			=> 	$gstSlab['gst_slab'],
                'gst_type' 			=> 	$gstSlab['gst_type'],
                'state_ut_tax' 		=> 	$gstSlab['state_ut_tax'],
                'central_tax' 		=> 	$gstSlab['central_tax'],
                'integrated_tax' 	=> 	$gstSlab['integrated_tax'],
            ]);
        }
    }

    private function addGstCommoditys($company_id)
    {
    	$gstCommoditys = $this->getGstCommoditys();

    	foreach ($gstCommoditys as $gstCommodity) {
			
			$gstSlab  = GstSlab::where([['gst_slab', $gstCommodity['gst_slab_id']], ['company_id', $company_id]])->first();

            GstCommodity::create([
                'company_id' 	    =>	$company_id,
        		'description' 	    =>	$gstCommodity['description'],
        		'commodity_type'    =>	$gstCommodity['commodity_type'],
                'gst_slab_id' 	    =>	$gstSlab->id,
                'applied_at' 	    =>	\Carbon\Carbon::parse(date('Y-m-d', strtotime($gstCommodity['applied_at']))),
            ]);
        }
    }

    private function getGstSlabs() 
    {
    	return $gstSlabs = [

            [
                'gst_slab' 			=> 	'GST 5%',
                'gst_type' 			=> 	'gst',
                'state_ut_tax' 		=> 	2.50,
                'central_tax' 		=> 	2.50,
                'integrated_tax' 	=> 	5.00,
            ],
            [
                'gst_slab' 			=> 	'GST 12%',
                'gst_type' 			=> 	'gst',
                'state_ut_tax' 		=> 	6.00,
                'central_tax' 		=> 	6.00,
                'integrated_tax' 	=> 	12.00,
            ],
            [
                'gst_slab' 			=> 	'GST 18%',
                'gst_type' 			=> 	'gst',
                'state_ut_tax' 		=> 	9.00,
                'central_tax' 		=> 	9.50,
                'integrated_tax' 	=> 	18.00,
            ],
            [
                'gst_slab' 			=> 	'GST 28%',
                'gst_type' 			=> 	'gst',
                'state_ut_tax' 		=> 	14.00,
                'central_tax' 		=> 	14.00,
                'integrated_tax' 	=> 	28.00,
            ],
            [
                'gst_slab' 			=> 	'GST 3%',
                'gst_type' 			=> 	'gst',
                'state_ut_tax' 		=> 	1.50,
                'central_tax' 		=> 	1.50,
                'integrated_tax' 	=> 	3.00,
            ],
            [
                'gst_slab' 			=> 	'Nil Rated',
                'gst_type' 			=> 	'nil_rated',
                'state_ut_tax' 		=> 	0.00,
                'central_tax' 		=> 	0.00,
                'integrated_tax' 	=> 	0.00,
            ],
            [
                'gst_slab' 			=> 	'Non GST',
                'gst_type' 			=> 	'non_gst',
                'state_ut_tax' 		=> 	0.00,
                'central_tax' 		=> 	0.00,
                'integrated_tax' 	=> 	0.00,
            ],
        ];
    }

    private function getGstCommoditys() 
    {
    	return $accounts = [

            [
        		'description' 	    =>	'GST 5%',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'GST 5%',
                'applied_at' 	    =>	'01/07/2017',
            ],
            [
        		'description' 	    =>	'GST 12%',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'GST 12%',
                'applied_at' 	    =>	'01/07/2017',
            ],
            [
        		'description' 	    =>	'GST 18%',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'GST 18%',
                'applied_at' 	    =>	'01/07/2017',
            ],
            [
        		'description' 	    =>	'GST 28%',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'GST 28%',
                'applied_at' 	    =>	'01/07/2017',
            ],
            [
        		'description' 	    =>	'GST 3%',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'GST 3%',
                'applied_at' 	    =>	'01/07/2017',
            ],
            [
        		'description' 	    =>	'GST Nil Rated',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'Nil Rated',
                'applied_at' 	    =>	'01/07/2017',
            ],
            [
        		'description' 	    =>	'Non GST',
        		'commodity_type'    =>	'goods',
                'gst_slab_id' 	    =>	'Non GST',
                'applied_at' 	    =>	'01/07/2017',
            ],
        ];
    }
    
    private function getAccounts() 
    {
	    return [

            [
                "name" => "Cash Account",
                "account_group_name" => "Cash-in-hand",
                "is_default" => 1,
                "balance_type" => 'credit',
                "opening_balance" => 0
            ],
            [
                "name" => "Cash Ledger(Cess) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
                "balance_type" => 'credit',
                "opening_balance" => 0
            ],
            [
                "name" => "Cash Ledger(Cess- Interest) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
                "balance_type" => 'credit',
                "opening_balance" => 0
            ],
            [
                "name" => "Cash Ledger(Cess- Late Fee) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
                "balance_type" => 'debit',
                "opening_balance" => 0
            ],
            [
                "name" => "Cash Ledger(Cess- Other) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
                "balance_type" => 'debit',
                "opening_balance" => 0
            ],
            [
                "name" => "Cash Ledger(Cess- Penalty) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
                "balance_type" => 'debit',
                "opening_balance" => 0
            ],
            [
                "name" => "Cash Ledger(CGST) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(CGST- Interest) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(CGST- Late Fee) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(CGST- Other) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(CGST- Penalty) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(IGST) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(IGST- Interest) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(IGST- Late Fee) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(IGST- Other) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(IGST- Penalty) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(SGST) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(SGST- Interest) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(SGST- Late Fee) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(SGST- Other) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Cash Ledger(SGST- Penalty) - Primary Unit",
                "account_group_name" => "Cash Ledger A/C.",
                "is_default" => 1,
            ],
            [
                "name" => "Central Tax A/c. (I/P)",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "Central Tax A/c. (O/P)",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "Composition(CGST) Tax Exp. A/c",
                "account_group_name" => "Expenses (Direct)",
                "is_default" => 1,
            ],
            [
                "name" => "Composition(SGST) Tax Exp. A/c",
                "account_group_name" => "Expenses (Direct)",
                "is_default" => 1,
            ],
            [
                "name" => "GST Provisional A/c. - Primary Unit",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "Integrated Tax A/c. (I/P)",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "Integrated Tax A/c. (O/P)",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "Interest Expense A/c.(Default)",
                "account_group_name" => "Expense Account",
                "is_default" => 1,
            ],
            [
                "name" => "Kasar A/c.",
                "account_group_name" => "Expense Account",
                "is_default" => 1,
            ],
            [
                "name" => "Late Fee Expense A/c.(Default)",
                "account_group_name" => "Expense Account",
                "is_default" => 1,
            ],
            [
                "name" => "Other Expense A/c.(Default)",
                "account_group_name" => "Expense Account",
                "is_default" => 1,
            ],
            [
                "name" => "Penalty Expense A/c.(Default)",
                "account_group_name" => "Expense Account",
                "is_default" => 1,
            ],
            [
                "name" => "Profit & Loss A/c",
                "account_group_name" => "Profit & Loss A/c",
                "is_default" => 1,
            ],
            [
                "name" => "State/UT Tax A/c. (I/P)",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "State/UT Tax A/c. (O/P)",
                "account_group_name" => "Duties & Taxes",
                "is_default" => 1,
            ],
            [
                "name" => "Stock In Hand",
                "account_group_name" => "Stock-in-hand",
                "is_default" => 1,
            ],
            [
                "name" => "Trading A/c.",
                "account_group_name" => "Trading Account",
                "is_default" => 1,
            ],
        ];    	
    }

    protected function getAccountGroups() 
    {
        return [
                
            [
                "name" => "Expenses (Direct)",
                "parent_group" => "Expenses (Direct)",
                "sequence" => 3,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "General Trading Account",
                "parent_group" => "Trading Account",
                "sequence" => 99,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit", "debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                "registration_type" => 1
            ],

        
            [
                "name" => "Income (Trading)",
                "parent_group" => "Income (Trading)",
                "sequence" => 2,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Jobwork Expense",
                "parent_group" => "Jobwork Expense",
                "sequence" => 4,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Jobwork Income (Trading)",
                "parent_group" => "Jobwork Income (Trading)",
                "sequence" => 4,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Purchase Account",
                "parent_group" => "Purchase Account",
                "sequence" => 2,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Sales Account",
                "parent_group" => "Sales Account",
                "sequence" => 1,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Trading Account",
                "parent_group" => "Trading Account",
                "sequence" => 0,
                "is_default" => 1,
                "category" => Enum::TRADING,
                "type" => "tr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit", "debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                "registration_type" => 1
            ],

        
            [
                "name" => "Expense Account",
                "parent_group" => "Expense Account",
                "sequence" => 1,
                "is_default" => 1,
                "category" => Enum::PROFITLOSS,
                "type" => "pr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Income",
                "parent_group" => "Income",
                "sequence" => 3,
                "is_default" => 1,
                "category" => Enum::PROFITLOSS,
                "type" => "pr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Income (Other Then Sales)",
                "parent_group" => "Income (Other Then Sales)",
                "sequence" => 4,
                "is_default" => 1,
                "category" => Enum::PROFITLOSS,
                "type" => "pr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Partner Interest",
                "parent_group" => "Partner Interest",
                "sequence" => 2,
                "is_default" => 1,
                "category" => Enum::PROFITLOSS,
                "type" => "pr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Partner Remuneration",
                "parent_group" => "Partner Remuneration",
                "sequence" => 3,
                "is_default" => 1,
                "category" => Enum::PROFITLOSS,
                "type" => "pr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Revenue Accounts",
                "parent_group" => "Revenue Accounts",
                "sequence" => 2,
                "is_default" => 1,
                "category" => Enum::PROFITLOSS,
                "type" => "pr",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Bank Accounts (Banks)",
                "parent_group" => "Current Assets",
                "sequence" => 8,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Bank OCC a/c",
                "parent_group" => "Loans (Liability)",
                "sequence" => 11,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" =>   0,
                "credit_limit" => 0,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Capital Account",
                "parent_group" => "Capital Account",
                "sequence" => 1,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 1,
                "account_interest" => 1,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Cash Ledger A/C.",
                "parent_group" => "Cash Ledger A/C.",
                "sequence" => 98,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit", "debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                "registration_type" => 1
            ],

        
            [
                "name" => "Cash-in-hand",
                "parent_group" => "Current Assets",
                "sequence" => 9,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Current Assets",
                "parent_group" => "Current Assets",
                "sequence" => 1,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Current Liabilities",
                "parent_group" => "Current Liabilities",
                "sequence" => 3,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Deposits (Asset)",
                "parent_group" => "Current Assets",
                "sequence" => 4,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Duties & Taxes",
                "parent_group" => "Current Liabilities",
                "sequence" => 4,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Fixed Assets",
                "parent_group" => "Fixed Assets",
                "sequence" => 2,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Investments",
                "parent_group" => "Investments",
                "sequence" => 3,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Loans & Advances (Asset)",
                "parent_group" => "Current Assets",
                "sequence" => 5,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Loans (Liability)",
                "parent_group" => "Loans (Liability)",
                "sequence" => 7,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Misc. Expenses (Asset)",
                "parent_group" => "Misc. Expenses (Asset)",
                "sequence" => 6,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Profit & Loss A/c",
                "parent_group" => "Profit & Loss A/c",
                "sequence" => 99,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit", "debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                "registration_type" => 1
            ],

        
            [
                "name" => "Provisions",
                "parent_group" => "Current Liabilities",
                "sequence" => 5,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Reserves & Surplus",
                "parent_group" => "Capital Account",
                "sequence" => 2,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Secured Loans",
                "parent_group" => "Loans (Liability)",
                "sequence" => 8,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 1,
                "account_interest" => 0,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Stock-in-hand",
                "parent_group" => "Stock-in-hand",
                "sequence" => 10,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                "registration_type" => 1
            ],

        
            [
                "name" => "Sundry Creditors",
                "parent_group" => "Current Liabilities",
                "sequence" => 10,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 1,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                'registration_type' => 0
            ],

        
            [
                "name" => "Sundry Debtors",
                "parent_group" => "Current Assets",
                "sequence" => 7,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 1,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                'registration_type' => 0
            ],

        
            [
                "name" => "Suspense Account",
                "parent_group" => "Suspense Account",
                "sequence" => 6,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["BTB"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 0,
                "account_interest" => 0,
                "account_bank_details" => 0,
                "city_id" => 1,
                "pincode" => 1,
                "area" => 1,
                "mobile" => 1,
                "state_id" => 1,
                "pan_no" => 1,
                "aadhar_no" => 1,
                "gstin_no" => 1,
                "credit_limit" => 1,
                "credit_days" => 1,
                'registration_type' => 1
            ],

        
            [
                "name" => "Unsecured Loans",
                "parent_group" => "Loans (Liability)",
                "sequence" => 9,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["credit"]),
                "account_address_details" => 1,
                "account_interest" => 1,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                'registration_type' => 1
            ],
            [
                "name" => "Debtors (Retail)",
                "parent_group" => "Debtors (Retail)",
                "sequence" => 9,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 1,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                'registration_type' => 0
            ],
            [
                "name" => "Debtors (Wholesale)",
                "parent_group" => "Debtors (Wholesale)",
                "sequence" => 9,
                "is_default" => 1,
                "category" => Enum::BALANCESHEET,
                "type" => "bs",
                "balance_method_default" => serialize(["B.Only", "BTB"]),
                "balance_type_default" => serialize(["debit"]),
                "account_address_details" => 1,
                "account_interest" => 1,
                "account_bank_details" => 1,
                "city_id" => 0,
                "pincode" => 0,
                "area" => 0,
                "mobile" => 0,
                "state_id" => 0,
                "pan_no" => 0,
                "aadhar_no" => 0,
                "gstin_no" => 0,
                "credit_limit" => 0,
                "credit_days" => 0,
                'registration_type' => 0
            ],

        ];
    }

    public function addDefaultSettings($company_id)
    {
        $generalSettings   = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUDIT_OPTION_HEADER,
                'key' => 'auditor_password',
                'type' => 'text'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUDIT_OPTION_HEADER,
                'key' => 'lock_audited_accounts',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUDIT_OPTION_HEADER,
                'key' => 'lock_audited_vouchers',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUDIT_OPTION_HEADER,
                'key' => 'password_each_audit',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::ENTRY_OPTIONS_HEADER,
                'key' => 'entry_narration',
                'type' => 'number'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::ENTRY_OPTIONS_HEADER,
                'key' => 'quantity_total_in_sales_purchase',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::ENTRY_OPTIONS_HEADER,
                'key' => 'r_i__sales_purchase_product_entry',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::ENTRY_OPTIONS_HEADER,
                'key' => 'exit_narration',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::OTHER_OPTION_HEADER,
                'key' => 'closing_stock_calculating_method',
                'type' => 'select'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::OTHER_OPTION_HEADER,
                'key' => 'reminder_memorandum',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::OTHER_OPTION_HEADER,
                'key' => 'depreciation_middle',
                'type' => 'date'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::OTHER_OPTION_HEADER,
                'key' => 'update_master',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUTO_HAVALA_ROUND_OFF_HEADER,
                'key' => 'capital',
                'type' => 'select'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUTO_HAVALA_ROUND_OFF_HEADER,
                'key' => 'depreciation',
                'type' => 'select'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::AUTO_HAVALA_ROUND_OFF_HEADER,
                'key' => 'interest',
                'type' => 'select'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::MULTI_LANGUAGE_OPTION_HEADER,
                'key' => 'multi_language',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GENERAL_SETUP_MENU,
                'header' => Enum::MULTI_LANGUAGE_OPTION_HEADER,
                'key' => 'alternate_language_input_in_master_required',
                'type' => 'checkbox'
            ]
        ];

        foreach ($generalSettings as $key => $setting) {
            Setting::create($setting);
        }

        $advanceSettings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'account_with_stock',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'bill_to_bill_outstanding',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'bill_to_bill_outstanding_non',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'multiple_trading_account',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'multi_currency_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'base_currency',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'free_qty_facility_req_for_purchase',
                'type' => 'select',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADVANCE_OPTIONS_HEADER,
                'key' => 'free_qty_facility_req_for_sale',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::STOCK_SETUP_HEADER,
                'key' => 'pricelist_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::STOCK_SETUP_HEADER,
                'key' => 'locationwise_stock_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::STOCK_SETUP_HEADER,
                'key' => 'batchwise_stock_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::STOCK_SETUP_HEADER,
                'key' => 'dual_stock_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::STOCK_SETUP_HEADER,
                'key' => 'serial_numberwise_stock_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::STOCK_SETUP_HEADER,
                'key' => 'product_classification_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::WEIGHT_SCALE_DETAIL_HEADER,
                'key' => 'weight_scale_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADV_VOUCHER_HEADER,
                'key' => 'challan_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADV_VOUCHER_HEADER,
                'key' => 'order_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADV_VOUCHER_HEADER,
                'key' => 'quotation_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADV_VOUCHER_HEADER,
                'key' => 'production_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADV_VOUCHER_HEADER,
                'key' => 'stock_journal_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::ADV_VOUCHER_HEADER,
                'key' => 'physical_stock_voucher_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::USER_OPTIONS_HEADER,
                'key' => 'user_field_required',
                'type' => 'checkbox',
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_SETUP_MENU,
                'header' => Enum::USER_OPTIONS_HEADER,
                'key' => 'user_master_required',
                'type' => 'checkbox',
            ]
        ];

        foreach ($advanceSettings as $key => $setting) {
            Setting::create($setting);
        }

        $advanceModuleSettings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'deal_e_commerce_operator',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'icici_net_banking_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'share_accounting_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'jobwork_out_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'jobwork_in_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'barcode_entry_required',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'cost_centre_required',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'cost_category_required',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'ticker_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'packing_stock_required',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'consultant_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'pos_entry_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'apmc_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::ADVANCE_MODUALE_MENU,
                'key' => 'e_commerce_required',
                'type' => 'checkbox'
            ],
        ];

        foreach ($advanceModuleSettings as $key => $setting) {
            Setting::create($setting);
        }

        $masterSettings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'account_popup_type',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'account_search_on_alias',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'proper_case_in_master',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'proper_case_in_address',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'cin_no_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'product_search_on_alias',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'product_group_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'product_category_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'ask_quentity_effect_in_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'ask_stock_ac_in_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'itemwise_expense_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'proper_case_in_master_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'tranding_goods_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'product_wise_stock_method_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'decimal_point_for_unit_1',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::MASTER_SETUP_MENU,
                'key' => 'decimal_point_for_rate',
                'type' => 'select'
            ],
        ];
        foreach ($masterSettings as $key => $setting) {
            Setting::create($setting);
        }

        $gstSettings = [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'quick_auto_gst_setup',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'gst_auto_account_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'none_gst_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'cess_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'garment_condition',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'rate_for_garment_product',
                'type' => 'text'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'gst_return_period',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'uin_no_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'gsp_services',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'gst_portal_username',
                'type' => 'text'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'hsn_head_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'decimal_point_for_gst',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'gst_commodity_search_code',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'sale_tax_paid_rate_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'purchase_tax_paid_rate_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'gst_on_jw_amount_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'value_of_godd_required_in_itc04',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'advance_receipt_entry_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'tax_paid_rate_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'no_of_previous_year_loading',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'ecm_effect_while_urd_voucher_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'notified_reverse_charge_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'e_way_bill_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'dispatch_from_master_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'e_way_bill_confirmation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'e_way_bill_amount_limit',
                'type' => 'text'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'way_bill_setup_e_invoice_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'e_invoice_dispatch_from_master_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'generate_e_way_bill_with_invoice',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::GST_SETUP_MENU,
                'key' => 'e_invoice_confirmation_required',
                'type' => 'checkbox'
            ]
        ];
        foreach ($gstSettings as $key => $setting) {
            Setting::create($setting);
        }

        $tds_tcs_settings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'tds_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'round_off_required_in_hawala_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'tds_salary',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'tds_debit_entries_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'tcs_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'tcs_as_per_section_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'separate_note_option_required_in_receipt',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::TDS_TCS_SETUP_MENU,
                'key' => 'ignore_tcs_threshold_limit',
                'type' => 'checkbox'
            ],
        ];

        foreach ($tds_tcs_settings as $key => $setting) {
            Setting::create($setting);
        }

        $report_settings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::REPORT_SETUP_MENU,
                'key' => 'display_width_for_document',
                'type' => 'text'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::REPORT_SETUP_MENU,
                'key' => 'report_type_default',
                'type' => 'text'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::REPORT_SETUP_MENU,
                'key' => 'display_width_for_voucher',
                'type' => 'select'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::REPORT_SETUP_MENU,
                'key' => 'display_long_voucher_no',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::REPORT_SETUP_MENU,
                'key' => 'first_unit_name',
                'type' => 'text'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::REPORT_SETUP_MENU,
                'key' => 'watermark_printing_required',
                'type' => 'checkbox'
            ],
        ];

        foreach ($report_settings as $key => $setting) {
            Setting::create($setting);
        }

        $classification_settings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::CLASSIFICATION_SETUP_MENU,
                'key' => 'negative_classification_stock_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::CLASSIFICATION_SETUP_MENU,
                'key' => 'merge_batch_in_sales_purchase',
                'type' => 'checkbox'
            ]
        ];
        foreach ($classification_settings as $key => $setting) {
            Setting::create($setting);
        }

        $pricelist_settings =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::PRICE_LIST_SETUP_MENU,
                'key' => 'mrp_required_into_pricelist_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::PRICE_LIST_SETUP_MENU,
                'key' => 'no_of_mrp_required',
                'type' => 'text'
            ]
        ];
        foreach ($pricelist_settings as $key => $setting) {
            Setting::create($setting);
        }

        $barcode_settings = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'continue_product_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'cumulative_product_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'barcode_validation_message_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'miltiple_barcode_entry_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'default_type',
                'type' => 'text'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'multiple_barcode_info_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'barcode_continue_product_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'barcode_cumulative_product_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::BARCODE_SETUP_MENU,
                'key' => 'same_party_in_sales_and_sales_return',
                'type' => 'checkbox'
            ]
        ];
        foreach ($barcode_settings as $key => $setting) {
            Setting::create($setting);
        }

        $share_settings =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::SHARE_SETUP_MENU,
                'key' => 'demat_account_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::SHARE_SETUP_MENU,
                'key' => 'settlement_is_required_f_o_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::SHARE_SETUP_MENU,
                'key' => 'security_transaction_tax',
                'type' => 'text'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::SHARE_SETUP_MENU,
                'key' => 'intraday_security_transaction_tax',
                'type' => 'text'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::SHARE_SETUP_MENU,
                'key' => 'f_o_security_transaction_tax',
                'type' => 'text'
            ]
        ];
        foreach ($share_settings as $key => $setting) {
            Setting::create($setting);
        }

        $jobwork_out_settings =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_OUT_SETUP_MENU,
                'key' => 'raw_material_to_finished_goods_traking_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_OUT_SETUP_MENU,
                'key' => 'process_required_in_jobwork_out',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_OUT_SETUP_MENU,
                'key' => 'consider_jobwork_out_issue_stock_in_negative_stock',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_OUT_SETUP_MENU,
                'key' => 'stock_rate_for_input_product_in_receipt_entry',
                'type' => 'checkbox'
            ]
        ];
        foreach ($jobwork_out_settings as $key => $setting) {
            Setting::create($setting);
        }

        $jobwork_in_settings =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_IN_SETUP_MENU,
                'key' => 'raw_material_to_finished_goods_traking_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_IN_SETUP_MENU,
                'key' => 'process_required_in_production',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::JOBWORK_IN_SETUP_MENU,
                'key' => 'sub_jobwork_required',
                'type' => 'checkbox'
            ],
        ];
        foreach ($jobwork_in_settings as $key => $setting) {
            Setting::create($setting);
        }

        $consultant_required_settings =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::CONSULTANT_REQUIRED_SETUP_MENU,
                'key' => 'gst_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::CONSULTANT_REQUIRED_SETUP_MENU,
                'key' => 'partial_final_invoice_allowed',
                'type' => 'checkbox'
            ]
        ];
        foreach ($consultant_required_settings as $key => $setting) {
            Setting::create($setting);
        }

        $apmc_settings =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::APMC_SETUP_MENU,
                'key' => 'discount_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::COMPANY_SETUP_MENU,
                'sub_menu' => Enum::APMC_SETUP_MENU,
                'key' => 'interest_required',
                'type' => 'checkbox'
            ]
        ];
        foreach ($apmc_settings as $key => $setting) {
            Setting::create($setting);
        }

        $bank_payments = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'auto_cheque_no_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'cheque_name_required_for',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'bill_to_bill_entry_before',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_PAYMENT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($bank_payments as $key => $setting) {
            Setting::create($setting);
        }

        $bank_receipts =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'bill_to_bill_entry_before',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'online_receipt_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::BANK_RECEIPT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($bank_receipts as $key => $setting) {
            Setting::create($setting);
        }

        $contra =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'auto_cheque_no_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'cheque_name_required_for',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CONTRA_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ]
        ];
        foreach ($contra as $key => $setting) {
            Setting::create($setting);
        }
    
        $cash_receipts =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'bill_to_bill_entry_before',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'online_receipt_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_RECEIPT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($cash_receipts as $key => $setting) {
            Setting::create($setting);
        }

        $cash_payments =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'bill_to_bill_entry_before',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'online_receipt_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CASH_PAYMENT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ],
        ];
        foreach ($cash_payments as $key => $setting) {
            Setting::create($setting);
        }

        $journal =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::JOURNAL_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ],
        ];
        foreach ($journal as $key => $setting) {
            Setting::create($setting);
        }

        $credit_note =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_NOTE_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ],
        ];
        foreach ($credit_note as $key => $setting) {
            Setting::create($setting);
        }


        $debit_note =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_NOTE_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ],
        ];
        foreach ($debit_note as $key => $setting) {
            Setting::create($setting);
        }

        $purchase_invoice =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'bill_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'group_filter_in_party',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'tcs_206c_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'online_master_rate_updation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'allow_change_rate',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'allow_change_amount',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'round_off_in_item_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'duplicate_bill_number_warning',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'strick_quotation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_INVOICE_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($purchase_invoice as $key => $setting) {
            Setting::create($setting);
        }

        $parchase_return =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'bill_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'group_filter_in_party',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'ship_to_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'allow_change_rate',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'allow_change_amount',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'round_off_in_item_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_RETURN_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($parchase_return as $key => $setting) {
            Setting::create($setting);
        }

        $parchase_quotation =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'invoice_type_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'narration_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'auto_bill_from_quotation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'group_filter_in_party',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'online_master_rate_updation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'online_quotation_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PURCHASE_QUOTATION_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($parchase_quotation as $key => $setting) {
            Setting::create($setting);
        }

        $sales_invoice =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'auto_align_sales_bill_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'credit_limit_warning',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'credit_days_warning',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'ship_to_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'group_filter_in_party',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'tcs_206c_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'payment_option_reqired',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'online_master_rate_updation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'allow_change_rate',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'allow_change_amount',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'round_off_in_item_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'negative_stock_warning',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'weight_reading_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'strick_quotation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'change_party_in_bill_from_quotation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_INVOICE_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($sales_invoice as $key => $setting) {
            Setting::create($setting);
        }

        $sales_return =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [

                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'auto_align_sales_bill_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'group_filter_in_party',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'allow_change_rate',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'allow_change_amount',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'round_off_in_item_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_RETURN_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($sales_return as $key => $setting) {
            Setting::create($setting);
        }

        $sales_quotation =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'invoice_type_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'narration_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'credit_limit_warning',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'credit_days_warning',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'auto_bill_from_quotation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'group_filter_in_party',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'online_master_rate_updation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'online_quotation_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::SALES_QUOTATION_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($sales_quotation as $key => $setting) {
            Setting::create($setting);
        }

        $credit_with_stock =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_STOCK_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($credit_with_stock as $key => $setting) {
            Setting::create($setting);
        }


        $debit_with_stock =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'debit_invoice_as_default',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'product_name_overwrite',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'product_history_after_product_selection',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'ask_expense_for_each_product',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_STOCK_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($debit_with_stock as $key => $setting) {
            Setting::create($setting);
        }

        $credit_with_out_stock =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::CREDIT_WITH_OUT_STOCK_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($credit_with_out_stock as $key => $setting) {
            Setting::create($setting);
        }

        $debit_with_out_stock =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'apply_gst_rules',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::DEBIT_WITH_OUT_STOCK_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($debit_with_out_stock as $key => $setting) {
            Setting::create($setting);
        }

        $production =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'online_master_rate_updation',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'round_off_in_item_entry',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'negative_stock_warning',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::PRODUCTION_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ]
        ];
        foreach ($production as $key => $setting) {
            Setting::create($setting);
        }

        $stock_transfer =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'quantity_total_in_display',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'narration_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'reverse_rate_calculation_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'required_closing_stock_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::STOCK_TRANSFER_SETUP,
                'key' => 'online_bill_printing',
                'type' => 'checkbox'
            ]
        ];
        foreach ($stock_transfer as $key => $setting) {
            Setting::create($setting);
        }

        $gst_expense = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'bill_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'cess_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'round_off_expense_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_EXPENSE_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($gst_expense as $key => $setting) {
            Setting::create($setting);
        }

        $gst_income = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'cash_party_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'cess_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'round_off_expense_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'auto_bill_to_bill_entry',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_INCOME_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($gst_income as $key => $setting) {
            Setting::create($setting);
        }

        $gst_journal =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'required_closing_balance_on_date',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],

            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_JOURNAL_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($gst_journal as $key => $setting) {
            Setting::create($setting);
        }

        $utilization_entry =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'utilization_havala_type_old_new',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::UTILIZATION_ENTRY_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($utilization_entry as $key => $setting) {
            Setting::create($setting);
        }

        $gst_bank_payment =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'auto_cheque_no_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'required_closing_balance_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_BANK_PAYMENT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($gst_bank_payment as $key => $setting) {
            Setting::create($setting);
        }

        $gst_cash_payment =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'required_closing_balance_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::GST_CASH_PAYMENT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($gst_cash_payment as $key => $setting) {
            Setting::create($setting);
        }

        $rcm_bank_payment =
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'auto_cheque_no_req',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'cheque_name_required_for',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'bill_to_bill_entry_before_amount',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'cess_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'gst_values_editable',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'required_closing_balance_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_BANK_PAYMENT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($rcm_bank_payment as $key => $setting) {
            Setting::create($setting);
        }

        $rcm_cash_payment = 
        [
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'document_number_date_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'voucher_number_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'auto_align_voucher_number',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'narration_type',
                'type' => 'select'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'required_auto_narration_help',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'bill_to_bill_entry_before_amount',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'cess_required',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'gst_values_editable',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'required_closing_balance_as_on_date',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'online_voucher_printing',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'online_sms_sending',
                'type' => 'checkbox'
            ],
            [
                'company_id' => $company_id,
                'menu' => Enum::VOUCHER_SETUP_MENU,
                'sub_menu' => Enum::RCM_CASH_PAYMENT_SETUP,
                'key' => 'online_e_mail_sending',
                'type' => 'checkbox'
            ]
        ];
        foreach ($rcm_cash_payment as $key => $setting) {
            Setting::create($setting);
        }
    }

    public function addMenuStructure($company_id)
    {
        $menus = [
            'master_account',
            'master_group',
            'master_product',
            'master_other_info',
            'master_opening_stock',
            'master_product_group',
            'master_product_category',
            'master_user_master_entry',
            'master_product_label',
            'master_gst',
            'master_sales_setup',
            'master_purchase_setup',
            'master_credit_note_with_stock_setup',
            'master_debit_note_with_stock_setup',
            'transaction_cash_bank_entry',
            'transaction_quick_entry',
            'transaction_cash_bank',
            'transaction_journal',
            'transaction_journal_entry',
            'transaction_purchase_entry',
            'transaction_purchase_invoice',
            'transaction_purchase_return',
            'transaction_check_from_purchase',
            'transaction_sale_entry',
            'transaction_sale_invoice',
            'transaction_sale_return',
            'transaction_cn_dn_entry',
            'transaction_cn_entry_wo_stock',
            'transaction_dn_entry_wo_stock',
            'transaction_cn_entry_with_stock',
            'transaction_dn_entry_with_stock',
            'gst_gst_master',
            'gst_gst_slab',
            'gst_gst_commodity',
            'gst_gst_entry',
            'gst_bank_payment',
            'gst_cash_payment',
            'gst_utilization_entry',
            'gst_journal_entry',
            'gst_rcm_voucher',
            'gst_gst_expense',
            'gst_gst_report',
            'gst_summary_sectionwise',
            'gst_percentagewise',
            'gst_accountwise',
            'gst_registration_typeWise',
            'gst_expense_audit',
            'gst_hsn_wise_summary',
            'gst_rcm_report',
            'gst_datewise_summary',
            'gst_ac_wise_summary',
            'gst_notified_rcm',
            'gst_gst_register',
            'gst_tax_liability_register',
            'gst_cash_ledger',
            'gst_itc_register',
            'gst_gst_outward_register',
            'gst_gst_inward_register',
            'gst_gst_expense_register',
            'gst_gst_income_register',
            'gst_e_way_bill',
            'gst_gst_return',
            'gst_gstr1',
            'gst_gstr1_hsn_summary',
            'gst_gstr2_hsn_summary',
            'gst_gstr2',
            'gst_gstr3b',
            'gst_gstr9',
            'gst_gstr3b_as_per_gstr_2b',
            'gst_gstr_integrity',
            'gst_tax_liability',
            'gst_itc',
            'gst_gst_audit',
            'gst_gstr1_b2b_summary',
            'gst_gstr2a_match',
            'gst_gstr2_b2b_summary',
            'gst_itc_as_per_gstr_2b',
            'gst_gst_payment',
            'gst_gst_income',
            'gst_gstr_2b_match',
            'report_account_book',
            'report_ledger',
            'report_voucher_list',
            'report_day_book',
            'report_cash_book',
            'report_bank_book',
            'report_outstanding',
            'report_receivable',
            'report_payable',
            'report_register',
            'report_sale_register',
            'report_purchase_register',
            'report_credit_note_with_stock_register',
            'report_debit_note_with_stock_register',
            'report_credit_note_wo_stock_register',
            'report_debit_note_wo_stock_register',
            'report_balance_sheet',
            'report_trial_balance',
            'report_sub_trial_balance',
            'report_opening_balance',
            'report_trending_account',
            'report_pl_statement',
            'report_balance_sheet',
            'report_trending_pl',
            'report_analysis_report',
            'report_performance_report',
            'report_sale_purchase_report',
            'report_partywise_report',
            'report_account_analysis',
            'report_fund_flow',
            'report_cash_flow',
            'report_daily_status',
            'report_stock_report',
            'report_product_ledger',
            'report_stock_partywise_report',
            'report_other_reports',
            'report_intrest_report',
            'report_sms_report',
            'report_template_list',
            'report_missing_vou_no_report',
            'report_email_report',
            'report_profile_email',
            'report_other_email',
            'report_cancel_voucher_report',
            'utility_system_utility',
            'utility_backup',
            'utility_advance_utility',
            'utility_account_merge',
            'utility_product_merge',
            'utility_data_delete',
            'utility_voucher_renumber',
            'utility_data_utility',
            'utility_data_export',
            'utility_data_import',
            'utility_fin_year_delete',
            'utility_havala',
            'utility_capital',
            'utility_depriciation',
            'utility_interest',
            'utility_havala_setup',
            'utility_year_end',
            'utility_update_balance',
            'utility_new_fin_year',
            'utility_personal_diary',
            'utility_address_book',
            'utility_mailing_latter',
            'utility_reminder',
            'utility_calender_diary',
            'utility_voucher_import',
            'utility_data_freeze',
            'utility_sub_data_freeze',
            'utility_data_unfreeze',
            'utility_gst_data_freeze',
            'utility_gst_data_unfreeze',
            'setup_company_setup',
            'setup_voucher_setup',
            'setup_voucher_number',
            'setup_sales_setup',
            'setup_sales_expense_detail',
            'setup_sales_invoice_type',
            'setup_purchase_setup',
            'setup_purchase_expense_detail',
            'setup_purchase_invoice_type',
            'setup_advance_setup',
            'setup_macro_setting',
            'setup_user_field',
            'setup_user_master',
            'setup_equation',
            'setup_auto_number',
            'setup_software_setup',
            'setup_voucher_format',
            'setup_credit_note_setup',
            'setup_credit_expense_detail',
            'setup_credit_invoice_type',
            'setup_debit_note_setup',
            'setup_debit_expense_detail',
            'setup_debit_invoice_type'
        ];

        foreach($menus as $menu)
        {
            MenuStructure::create([
                'name' => $menu,
                'company_id' => $company_id
            ]);
        }
    }
}

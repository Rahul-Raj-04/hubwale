<?php

namespace App\Http\Controllers\Erp\JournalEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JournalEntry;
use App\Enum\Enum;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\LedgerAccountBalance;

class JournalEntryController extends Controller
{
	public function index(Request $request)
	{
		if (in_array($request->vouType, Enum::JOURNAL_ENTRY_VOU_TYPE)) {
			$vouType = $request->vouType;
			$journalEntries = JournalEntry::Where('company_id', auth()->user()->company->id)->where('vou_type', $vouType)->get();
			return view('erp.transactions.journal-entry.index')->with(compact('journalEntries', 'vouType'));
		}
		toast('Something went wrong.', 'error');
        return redirect()->route('home');
	}

	public function create(Request $request)
    {
    	if (in_array($request->vouType, Enum::JOURNAL_ENTRY_VOU_TYPE)) {
			$vouType = $request->vouType;
			return view('erp.transactions.journal-entry.create')->with(compact('vouType'));
		}
		toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function edit(Request $request, $id)
    {
    	if (in_array($request->vouType, Enum::JOURNAL_ENTRY_VOU_TYPE)) {
    		$journalEntry = JournalEntry::find($id);
			$vouType = $request->vouType;
			return view('erp.transactions.journal-entry.edit')->with(compact('vouType', 'journalEntry'));
		}
		toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function destroy($id, Request $request)
    {
    	if (in_array($request->vouType, Enum::JOURNAL_ENTRY_VOU_TYPE)) {
	    	$journalEntries = JournalEntry::where('group_id', $id)->get();
	    	if($request->vouType == 'bank_payment'){
                $type = 'BPymt';
            } else if($request->vouType == 'bank_receipt'){
                $type = 'BRcpt';
            } else if($request->vouType == 'cash_payment'){
                $type = 'BPymt';
            } else if($request->vouType == 'cash_receipt'){
                $type = 'CRcpt';
            } else if($request->vouType == 'credit_note'){
                $type = 'C/N';
            } else if($request->vouType == 'debit_note'){
                $type = 'D/N';
            } else if($request->vouType == 'journal') {
                $type = 'Jrnl';
            } else if ($request->vouType == 'contra') {
                $type = 'Ctra';
            }
	    	foreach ($journalEntries as $key => $journalEntry) {
	    		
	    		$ledgerAccountBalances = LedgerAccountBalance::where('type_id', $journalEntry->id)->where('type', $type)->get();
		        foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {

		            $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
		            ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

		            $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
		            ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();
		            	if ($lastLedgerAccountBalance) {
		                	$updatedClosingBalance = $lastLedgerAccountBalance->closing_balance;
		                
		                    foreach ($closingBalanceUpdatesLedgers as $key => $closingBalanceUpdatesLedger) {
		                        if ($closingBalanceUpdatesLedger->balance_type == 'credit') {
		                            $updatedClosingBalance = (int)$updatedClosingBalance + (int)$closingBalanceUpdatesLedger->balance;
		                        } else {
		                            $updatedClosingBalance = (int)$updatedClosingBalance - (int)$closingBalanceUpdatesLedger->balance;
		                        }
		                        $closingBalanceUpdatesLedger->closing_balance = $updatedClosingBalance;
		                        $closingBalanceUpdatesLedger->save();
		                    }
		                }
		            $ledgerAccountBalance->delete();
		        }
	    		$journalEntry->delete();
	    	}
	    	toast(ucfirst(str_replace( '_', ' ', $request->vouType)).' deleted successfully!', 'success');
			return redirect()->route('erp.account-transaction.journal-entry.index', ['vouType' => $request->vouType]);
		}
		toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function updateIsAudit(Request $request)
    {
    	$journalEntries = JournalEntry::where('group_id', $request->group_id)->get();
    	foreach ($journalEntries as $key => $journalEntry) {
    		$journalEntry->is_audit = $request->is_audit;
    		$journalEntry->save();
    	}
    }

    public function filter(Request $request)
    {
		if (in_array($request->vouType, Enum::JOURNAL_ENTRY_VOU_TYPE)) {
			$vouType = $request->vouType;
			$journalEntries = QueryBuilder::for(JournalEntry::class)->allowedFilters(['vou_date', 'vou_no', 'account.name', 'balance_type', 'currency.symbol'])->Where('company_id', auth()->user()->company->id)->where('vou_type', $vouType)->get();
			return view('erp.transactions.journal-entry.index')->with(compact('journalEntries', 'vouType'));
		}
		toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }
}

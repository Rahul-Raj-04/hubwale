<?php

namespace App\Http\Controllers\Erp\Report\AccountBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LedgerAccountBalance;
use App\Models\AccountTransaction;
use App\Models\JournalEntry;

class DayBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgerAccountBalances = LedgerAccountBalance::whereIn('type', ['CPymt', 'CRcpt'])->get();
        
        return view('erp.report.account-book.day-book.index')->with(compact('ledgerAccountBalances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ledgerAccountBalance = LedgerAccountBalance::find($id);
        if ($ledgerAccountBalance && $ledgerAccountBalance->type == 'CPymt' && $ledgerAccountBalance->model_name == 'AccountTransaction') {
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-payment.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'day_book']);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'CRcpt' && $ledgerAccountBalance->model_name == 'AccountTransaction') {
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-receipt.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'day_book']);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'CPymt' && $ledgerAccountBalance->model_name == 'JournalEntry') {
            return redirect()->route('erp.account-transaction.journal-entry.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'day_book', 'vouType' => 'cash_payment']);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'CRcpt' && $ledgerAccountBalance->model_name == 'JournalEntry') {
            return redirect()->route('erp.account-transaction.journal-entry.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'day_book', 'vouType' => 'cash_receipt']);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'C/N' && $ledgerAccountBalance->model_name == 'JournalEntry') {
            return redirect()->route('erp.account-transaction.journal-entry.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'day_book', 'vouType' => 'credit_note']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ledgerAccountBalance = LedgerAccountBalance::find($id);
        if (($ledgerAccountBalance->type == 'BRcpt' || 
            $ledgerAccountBalance->type == 'BPymt' || 
            $ledgerAccountBalance->type == 'CRcpt' ||
            $ledgerAccountBalance->type == 'CPymt') && $ledgerAccountBalance->model_name == 'AccountTransaction') 
        {
            $accountTransaction = AccountTransaction::find($ledgerAccountBalance->type_id);
            $accountTransaction->delete();
            
            $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $ledgerAccountBalance->type_id)->where('type', $ledgerAccountBalance->type)->get();
            foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {
                
                $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
                ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

                $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
                ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();

                    $updatedClosingBalance = $lastLedgerAccountBalance ? $lastLedgerAccountBalance->closing_balance : 0;
                    foreach ($closingBalanceUpdatesLedgers as $key => $closingBalanceUpdatesLedger) {
                        if ($closingBalanceUpdatesLedger->balance_type == 'credit') {
                            $updatedClosingBalance = (int)$updatedClosingBalance + (int)$closingBalanceUpdatesLedger->balance;
                        } else {
                            $updatedClosingBalance = (int)$updatedClosingBalance - (int)$closingBalanceUpdatesLedger->balance;
                        }
                        $closingBalanceUpdatesLedger->closing_balance = $updatedClosingBalance;
                        $closingBalanceUpdatesLedger->save();
                    }
                $ledgerAccountBalance->delete();
            }

        }
        if (($ledgerAccountBalance->type == 'BRcpt' || 
            $ledgerAccountBalance->type == 'BPymt' || 
            $ledgerAccountBalance->type == 'CRcpt' ||
            $ledgerAccountBalance->type == 'CPymt' ||
            $ledgerAccountBalance->type == 'C/N' ||
            $ledgerAccountBalance->type == 'D/N' ||
            $ledgerAccountBalance->type == 'Ctra' ||
            $ledgerAccountBalance->type == 'Jrnl') && $ledgerAccountBalance->model_name == 'JournalEntry') 
        {
            $journalEntry = JournalEntry::find($ledgerAccountBalance->type_id);
            $journalEntries = JournalEntry::where('group_id', $journalEntry->group_id)->get();
            foreach($journalEntries as $journalEntry)
            {
                $journalEntry->delete();
                
                $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $ledgerAccountBalance->type_id)->where('type', $ledgerAccountBalance->type)->get();
                foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {
                    
                    $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
                    ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

                    $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
                    ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();
                    if($lastLedgerAccountBalance)
                    {
                        $updatedClosingBalance = $lastLedgerAccountBalance ? $lastLedgerAccountBalance->closing_balance : 0;
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
            }
        }
        return redirect()->back();
    }
}

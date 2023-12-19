<?php

namespace App\Http\Controllers\Erp\Report\AccountBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\LedgerAccountBalance;
use App\Models\AccountTransaction;

class BankBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::Where('company_id', auth()->user()->company->id)->whereHas('account_group', function($a)
        {
            $a->whereIn('name', ['Bank Accounts (Banks)', 'Bank OCC a/c']);
        })->get();
        return view('erp.report.account-book.bank-book.index')->with(compact('accounts'));
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
        $account_ledgers = LedgerAccountBalance::where('account_id', $id)->get();
        $account = Account::find($id);
        return view('erp.report.account-book.bank-book.show')->with(compact('account', 'account_ledgers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $ledgerAccountBalance = LedgerAccountBalance::find($id);
        if ($ledgerAccountBalance && $ledgerAccountBalance->type == 'BPymt') {
            return redirect()->route('erp.account-transaction.cash-bank-entry.bank-payment.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'bank_book', 'account_id' => $request->account_id]);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'BRcpt') {
            return redirect()->route('erp.account-transaction.cash-bank-entry.bank-receipt.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'bank_book', 'account_id' => $request->account_id]);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'CPymt') {
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-payment.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'bank_book', 'account_id' => $request->account_id]);
        } elseif ($ledgerAccountBalance && $ledgerAccountBalance->type == 'CRcpt') {
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-receipt.edit', ['id' => $ledgerAccountBalance->type_id, 'edit_type' => 'bank_book', 'account_id' => $request->account_id]);
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
        return redirect()->back();
    }
}

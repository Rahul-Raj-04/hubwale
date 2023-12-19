<?php

namespace App\Http\Controllers\Erp\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountTransaction;
use App\Models\AccountGroup;
use App\Models\Account;
use App\Enum\Enum;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\LedgerAccountBalance;

class AccountTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bankPaymentIndex()
    {   
        $bankPayments = AccountTransaction::Where('company_id', auth()->user()->company->id)->Where('module', 'bank_Payment')->get();
        
        return view('erp.transactions.cash-bank-entry.bank-payment.index', compact('bankPayments'));
    }

    public function bankPaymentCreate()
    {    
        return view('erp.transactions.cash-bank-entry.bank-payment.create');
    }

    public function bankPaymentEdit($id)
    {    
        return view('erp.transactions.cash-bank-entry.bank-payment.edit', compact('id'));
    }

    public function bankPaymentDestroy($id)
    {    
        $bankPayment = AccountTransaction::find($id);

        $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $id)->where('type', 'BPymt')->get();
        foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {

            $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
            ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

            $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
            ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();

                $updatedClosingBalance = $lastLedgerAccountBalance->closing_balance;
                if ($lastLedgerAccountBalance) {
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
        $bankPayment->delete();
        toast('Bank Payment deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cash-bank-entry.bank-payment.index');        
    }

    public function bankPaymentFilter()
    {
        $bankPayments = QueryBuilder::for(AccountTransaction::class)
            ->allowedFilters(['date', 'account.name', 'reference_no', 'opposite_account.name', 'amount'])->Where('company_id', auth()->user()->company->id)->Where('module', 'bank_Payment')->get();
        
        return view('erp.transactions.cash-bank-entry.bank-payment.index')->with(compact('bankPayments'));
    }

    public function bankReceiptIndex()
    {   
        $bankReceipts = AccountTransaction::Where('company_id', auth()->user()->company->id)->Where('module', 'bank_receipt')->get();
    
        return view('erp.transactions.cash-bank-entry.bank-receipt.index', compact('bankReceipts'));
    }

    public function bankReceiptCreate()
    {           
        return view('erp.transactions.cash-bank-entry.bank-receipt.create');
    }

    public function bankReceiptEdit($id)
    {           
        return view('erp.transactions.cash-bank-entry.bank-receipt.edit', compact('id'));
    }

    public function bankReceiptDestroy($id)
    {    
        $bankReceipt = AccountTransaction::find($id);
        $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $id)->where('type', 'BRcpt')->get();
        foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {
            
            $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
            ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

            $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
            ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();

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
            $ledgerAccountBalance->delete();
        }
        $bankReceipt->delete();

        toast('Bank Receipt deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cash-bank-entry.bank-receipt.index');        
    }

    public function bankReceiptFilter()
    {
        $bankReceipts = QueryBuilder::for(AccountTransaction::class)
            ->allowedFilters(['date', 'account.name', 'reference_no', 'opposite_account.name', 'amount'])->Where('company_id', auth()->user()->company->id)->Where('module', 'bank_receipt')->get();
        
        return view('erp.transactions.cash-bank-entry.bank-receipt.index')->with(compact('bankReceipts'));
    }

    public function cashPaymentIndex()
    {   
        $cashPayments = AccountTransaction::Where('company_id', auth()->user()->company->id)->Where('module', 'cash_Payment')->get();
        
        return view('erp.transactions.cash-bank-entry.cash-payment.index', compact('cashPayments'));
    }

    public function cashPaymentCreate()
    {           
        return view('erp.transactions.cash-bank-entry.cash-payment.create');
    }

    public function cashPaymentEdit($id)
    {           
        return view('erp.transactions.cash-bank-entry.cash-payment.edit', compact('id'));
    }

    public function cashPaymentDestroy($id)
    {    
        $cashPayment = AccountTransaction::find($id);
        $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $id)->where('type', 'CPymt')->get();
        foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {
            
            $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
            ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

            $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
            ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();

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
            $ledgerAccountBalance->delete();
        }
        $cashPayment->delete();

        toast('Cash Payment deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cash-bank-entry.cash-payment.index');        
    }

    public function cashPaymentFilter()
    {
        $cashPayments = QueryBuilder::for(AccountTransaction::class)->allowedFilters(['date', 'account.name', 'voucher_no', 'opposite_account.name', 'amount'])->Where('company_id', auth()->user()->company->id)->Where('module', 'cash_Payment')->get();
        
        return view('erp.transactions.cash-bank-entry.cash-payment.index')->with(compact('cashPayments'));
    }

    public function cashReceiptIndex()
    {   
        $cashReceipts = AccountTransaction::Where('company_id', auth()->user()->company->id)->Where('module', 'cash_receipt')->get();
        
        return view('erp.transactions.cash-bank-entry.cash-receipt.index', compact('cashReceipts'));
    }

    public function cashReceiptCreate()
    {           
        return view('erp.transactions.cash-bank-entry.cash-receipt.create');
    }

    public function cashReceiptEdit($id)
    {           
        return view('erp.transactions.cash-bank-entry.cash-receipt.edit', compact('id'));
    }

    public function cashReceiptDestroy($id)
    {    
        $cashReceipt = AccountTransaction::find($id);
        $cashPayment = AccountTransaction::find($id);
        $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $id)->where('type', 'CRcpt')->get();
        foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {
            
            $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
            ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

            $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
            ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();

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
            $ledgerAccountBalance->delete();
        }
        $cashReceipt->delete();

        toast('Cash Receipt deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cash-bank-entry.cash-receipt.index');        
    }

    public function cashReceiptFilter()
    {
        $cashReceipts = QueryBuilder::for(AccountTransaction::class)->allowedFilters(['date', 'account.name', 'voucher_no', 'opposite_account.name', 'amount'])->Where('company_id', auth()->user()->company->id)->Where('module', 'cash_receipt')->get();
        
        return view('erp.transactions.cash-bank-entry.cash-receipt.index')->with(compact('cashReceipts'));
    }

    public function contraIndex()
    {   
        $contras = AccountTransaction::Where('company_id', auth()->user()->company->id)->Where('module', 'contra')->get();
        
        return view('erp.transactions.cash-bank-entry.contra.index', compact('contras'));
    }

    public function contraCreate()
    {           
        return view('erp.transactions.cash-bank-entry.contra.create');
    }

    public function contraEdit($id)
    {           
        return view('erp.transactions.cash-bank-entry.contra.edit', compact('id'));
    }

    public function contraDestroy($id)
    {    
        $contra = AccountTransaction::find($id);
        $contra->delete();

        toast('Contra deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cash-bank-entry.contra.index');        
    }

    public function contraFilter()
    {
        $contras = QueryBuilder::for(AccountTransaction::class)->allowedFilters(['date', 'account.name', 'reference_no', 'opposite_account.name', 'amount'])->Where('company_id', auth()->user()->company->id)->Where('module', 'contra')->get();
        
        return view('erp.transactions.cash-bank-entry.contra.index')->with(compact('contras'));
    }

    public function editAudit(Request $request)
    {
        $accountTransaction = AccountTransaction::find($request->id);
        if ($accountTransaction) {
            $accountTransaction->is_audit = $request->is_audit;
            $accountTransaction->save();
            return response()->json(["success" => true]);
        }
    }
}

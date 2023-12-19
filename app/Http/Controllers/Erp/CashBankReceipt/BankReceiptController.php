<?php

namespace App\Http\Controllers\Erp\CashBankReceipt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashBankReceipt;
use App\Models\Account;
use App\Models\CurrencyMaster;
use App\Enum\Enum;
use App\Http\Traits\LedgerAccountBalanceTrait;

class BankReceiptController extends Controller
{
    use LedgerAccountBalanceTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankReceipts = CashBankReceipt::where('receipt_type', Enum::CONSULTANT_BANK_RECEIPT)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.bank-receipt.index')->with(compact('bankReceipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashBankAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Cash-in-hand' || $a->account_group->name == 'Bank Accounts (Banks)' || $a->account_group->name == 'Bank OCC a/c';
        });
        $oppAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Debtors' || $a->account_group->name == 'Sundry Creditors';
        });
        $currencies = CurrencyMaster::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.bank-receipt.create')->with(compact('cashBankAccounts', 'currencies', 'oppAccounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'opposite_account_id' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        ]);

        CashBankReceipt::create([
            'account_id' => $request->account_id,
            'type' => $request->type,
            'date' => $request->date,
            'vou_no' => $request->vou_no,
            'opposite_account_id' => $request->opposite_account_id,
            'amount' => $request->amount,
            'chq_dd_no' => $request->chq_dd_no,
            'chq_dd_date' => $request->chq_dd_date,
            'doc_no' => $request->doc_no,
            'doc_date' => $request->doc_date,
            'currency_id' => $request->currency_id,
            'narration' => $request->narration,
            'receipt_type' => Enum::CONSULTANT_BANK_RECEIPT,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);

        $data = [
            'account_id' => $request->account_id,
            'balance' => $request->amount,
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);

        $data = [
            'account_id' => $request->opposite_account_id,
            'balance' => $request->amount,
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);
        toast('Bank receipt create successfully!', 'success');

        return redirect()->route('erp.consultant.bank-receipt.index');
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
        $bankReceipt = CashBankReceipt::find($id);
        $cashBankAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Cash-in-hand' || $a->account_group->name == 'Bank Accounts (Banks)' || $a->account_group->name == 'Bank OCC a/c';
        });
        $oppAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Debtors' || $a->account_group->name == 'Sundry Creditors';
        });
        $currencies = CurrencyMaster::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.bank-receipt.edit')->with(compact('cashBankAccounts', 'currencies', 'bankReceipt', 'oppAccounts'));
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
        $request->validate([
            'account_id' => 'required',
            'opposite_account_id' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        ]);
        $bankReceipt = CashBankReceipt::find($id);

        $data = [
            'account_id' => $request->account_id,
            'balance' => $bankReceipt->amount,
            'operator' => '-'
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);
        
        $data = [
            'account_id' => $request->opposite_account_id,
            'balance' => $bankReceipt->amount,
            'operator' => '-'
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);

        $bankReceipt->account_id = $request->account_id;
        $bankReceipt->type = $request->type;
        $bankReceipt->date = $request->date;
        $bankReceipt->vou_no = $request->vou_no;
        $bankReceipt->opposite_account_id = $request->opposite_account_id;
        $bankReceipt->amount = $request->amount;
        $bankReceipt->doc_no = $request->doc_no;
        $bankReceipt->doc_date = $request->doc_date;
        $bankReceipt->chq_dd_no = $request->chq_dd_no;
        $bankReceipt->chq_dd_date = $request->chq_dd_date;
        $bankReceipt->currency_id = $request->currency_id;
        $bankReceipt->narration = $request->narration;
        $bankReceipt->save();

        $data = [
            'account_id' => $request->account_id,
            'balance' => $request->amount
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);

        $data = [
            'account_id' => $request->opposite_account_id,
            'balance' => $request->amount
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);

        toast('Bank receipt updated successfully!', 'success');

        return redirect()->route('erp.consultant.bank-receipt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankReceipt = CashBankReceipt::find($id);
        $bankReceipt->delete();
        
        toast('Bank receipt deleted successfully!', 'success');

        return redirect()->route('erp.consultant.bank-receipt.index');
    }

    public function updateIsAudit(Request $request)
    {
        $bankReceipt = CashBankReceipt::find($request->id);
        if ($bankReceipt) {
            $bankReceipt->is_audit = $request->is_audit;
            $bankReceipt->save();
            return response()->json(["success" => true]);
        }
    }
}

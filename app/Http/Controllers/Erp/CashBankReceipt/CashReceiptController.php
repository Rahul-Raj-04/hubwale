<?php

namespace App\Http\Controllers\Erp\CashBankReceipt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashBankReceipt;
use App\Models\Account;
use App\Models\CurrencyMaster;
use App\Enum\Enum;
use App\Http\Traits\LedgerAccountBalanceTrait;

class CashReceiptController extends Controller
{
    use LedgerAccountBalanceTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashReceipts = CashBankReceipt::where('receipt_type', Enum::CONSULTANT_CASH_RECEIPT)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.cash-receipt.index')->with(compact('cashReceipts'));
        
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
        return view('erp.consultant.cash-receipt.create')->with(compact('cashBankAccounts', 'currencies', 'oppAccounts'));
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
            'doc_no' => $request->doc_no,
            'doc_date' => $request->doc_date,
            'chq_dd_no' => $request->chq_dd_no,
            'chq_dd_date' => $request->chq_dd_date,
            'currency_id' => $request->currency_id,
            'narration' => $request->narration,
            'receipt_type' => Enum::CONSULTANT_CASH_RECEIPT,
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

        toast('Cash receipt create successfully!', 'success');

        return redirect()->route('erp.consultant.cash-receipt.index');
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
        
        $cashReceipt = CashBankReceipt::find($id);
        $cashBankAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Cash-in-hand' || $a->account_group->name == 'Bank Accounts (Banks)' || $a->account_group->name == 'Bank OCC a/c';
        });
        $oppAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Debtors' || $a->account_group->name == 'Sundry Creditors';
        });
        $currencies = CurrencyMaster::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.cash-receipt.edit')->with(compact('cashBankAccounts', 'currencies', 'cashReceipt', 'oppAccounts'));
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

        $cashReceipt = CashBankReceipt::find($id);

        $data = [
            'account_id' => $request->account_id,
            'balance' => $cashReceipt->amount,
            'operator' => '-'
        ];
        $this->LedgerAccountBalanceCreateOrUpdate($data);
        
        $data = [
            'account_id' => $request->opposite_account_id,
            'balance' => $cashReceipt->amount,
            'operator' => '-'
        ];

        $this->LedgerAccountBalanceCreateOrUpdate($data);
        $cashReceipt->account_id = $request->account_id;
        $cashReceipt->type = $request->type;
        $cashReceipt->date = $request->date;
        $cashReceipt->vou_no = $request->vou_no;
        $cashReceipt->opposite_account_id = $request->opposite_account_id;
        $cashReceipt->amount = $request->amount;
        $cashReceipt->doc_no = $request->doc_no;
        $cashReceipt->doc_date = $request->doc_date;
        $cashReceipt->chq_dd_no = $request->chq_dd_no;
        $cashReceipt->chq_dd_date = $request->chq_dd_date;
        $cashReceipt->currency_id = $request->currency_id;
        $cashReceipt->narration = $request->narration;
        $cashReceipt->save();

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

        toast('Cash receipt updated successfully!', 'success');

        return redirect()->route('erp.consultant.cash-receipt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashReceipt = CashBankReceipt::find($id);
        $cashReceipt->delete();
        
        toast('Cash receipt deleted successfully!', 'success');

        return redirect()->route('erp.consultant.cash-receipt.index');
    }

    public function updateIsAudit(Request $request)
    {
        $cashReceipt = CashBankReceipt::find($request->id);
        if ($cashReceipt) {
            $cashReceipt->is_audit = $request->is_audit;
            $cashReceipt->save();
            return response()->json(["success" => true]);
        }
    }
}

<?php

namespace App\Http\Controllers\Erp\RCMVoucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RCMVoucher;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Enum\Enum;
use App\Models\CurrencyMaster;

class CashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashPayments = RCMVoucher::where('vou_type', Enum::RCM_CASH_PAYMENT)->where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.gst.rcm-voucher.cash-payment.index')->with(compact('cashPayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag){
            $ag->where('name', 'Cash-in-hand');
        })->get();
        $oppAccounts = Account::where('company_id', auth()->user()->company->id)->get();
        $gstCommodities = GstCommodity::where('company_id', auth()->user()->company->id)->get();
        $gst_types = Enum::RCM_GST_TYPE;
        $currencies = CurrencyMaster::where('company_id', auth()->user()->company->id)->get();
        return view('erp.gst.rcm-voucher.cash-payment.create')->with(compact('oppAccounts', 'gstCommodities', 'gst_types', 'currencies', 'cashAccounts'));
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
            'gst_commodity_id' => 'required',
            'opposite_account_id' => 'required',
            'amount' => 'required',
            'currency_id' => 'required'
        ]);

        RCMVoucher::create([
            'account_id' => $request->account_id,
            'date' => $request->date,
            'vou_no' => $request->vou_no,
            'gst_type' => $request->gst_type,
            'gst_commodity_id' => $request->gst_commodity_id,
            'i_t_c' => $request->i_t_c,
            'opposite_account_id' => $request->opposite_account_id,
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
            'doc_no' => $request->doc_no,
            'doc_date' => $request->doc_date,
            'narration' => $request->narration,
            'vou_type' => Enum::RCM_CASH_PAYMENT,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);

        $cashAccount = Account::find($request->account_id);
        $cashAccount->opening_balance = (int)$cashAccount->opening_balance + $request->amount;
        $cashAccount->save();

        $oppAccount = Account::find($request->opposite_account_id);
        $oppAccount->opening_balance = (int)$oppAccount->opening_balance + $request->amount;
        $oppAccount->save();
        
        toast('RCM cash payment created successfully!', 'success');
        return redirect()->route('erp.gst.rcm.cash-payment.index');
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
        $cashAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag){
            $ag->where('name', 'Cash-in-hand');
        })->get();
        $oppAccounts = Account::where('company_id', auth()->user()->company->id)->get();
        $gstCommodities = GstCommodity::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $gst_types = Enum::RCM_GST_TYPE;
        $currencies = CurrencyMaster::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $cashPayment = RCMVoucher::find($id);
        return view('erp.gst.rcm-voucher.cash-payment.edit')->with(compact('cashAccounts', 'gstCommodities', 'gst_types', 'currencies', 'cashPayment', 'oppAccounts'));
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
            'gst_commodity_id' => 'required',
            'opposite_account_id' => 'required',
            'amount' => 'required',
            'currency_id' => 'required'
        ]);

        $cashPayment = RCMVoucher::find($id);

        $cashAccount = Account::find($request->account_id);
        if($cashPayment->account_id == $request->account_id) {
            $cashAccount->opening_balance = (int)$cashAccount->opening_balance - (int)$cashPayment->amount;
        }
        $cashAccount->opening_balance = (int)$cashAccount->opening_balance + (int)$request->amount;
        $cashAccount->save();

        $oppAccount = Account::find($request->opposite_account_id);
        if($cashPayment->opposite_account_id == $request->opposite_account_id) {
            $oppAccount->opening_balance = (int)$oppAccount->opening_balance - (int)$cashPayment->amount;
        }
        $oppAccount->opening_balance = (int)$oppAccount->opening_balance + (int)$request->amount;
        $oppAccount->save();

        $cashPayment->account_id = $request->account_id;
        $cashPayment->date = $request->date;
        $cashPayment->vou_no = $request->vou_no;
        $cashPayment->gst_type = $request->gst_type;
        $cashPayment->gst_commodity_id = $request->gst_commodity_id;
        $cashPayment->i_t_c = $request->i_t_c;
        $cashPayment->opposite_account_id = $request->opposite_account_id;
        $cashPayment->currency_id = $request->currency_id;
        $cashPayment->amount = $request->amount;
        $cashPayment->doc_no = $request->doc_no;
        $cashPayment->doc_date = $request->doc_date;
        $cashPayment->narration = $request->narration;
        $cashPayment->save();

        toast('RCM cash payment updated successfully!', 'success');
        return redirect()->route('erp.gst.rcm.cash-payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashPayment = RCMVoucher::find($id);
        $cashPayment->delete();

        toast('RCM cash payment deleted successfully!', 'success');
        return redirect()->route('erp.gst.rcm.cash-payment.index');   
    }
}

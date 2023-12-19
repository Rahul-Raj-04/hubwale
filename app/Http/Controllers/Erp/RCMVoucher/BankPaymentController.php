<?php

namespace App\Http\Controllers\Erp\RCMVoucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RCMVoucher;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Enum\Enum;
use App\Models\CurrencyMaster;

class BankPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankPayments = RCMVoucher::where('vou_type', Enum::RCM_BANK_PAYMENT)->where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.gst.rcm-voucher.bank-payment.index')->with(compact('bankPayments')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bankAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag){
            $ag->where('name', 'Cash-in-hand');
        })->get();
        $oppAccounts = Account::where('company_id', auth()->user()->company->id)->get();
        $gstCommodities = GstCommodity::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $gst_types = Enum::RCM_GST_TYPE;
        $currencies = CurrencyMaster::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.gst.rcm-voucher.bank-payment.create')->with(compact('bankAccounts', 'gstCommodities', 'gst_types', 'currencies', 'oppAccounts'));
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
            'chq_dd_no' => $request->chq_dd_no,
            'chq_dd_date' => $request->chq_dd_date,
            'narration' => $request->narration,
            'vou_type' => Enum::RCM_BANK_PAYMENT,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);


        $bankAccount = Account::find($request->account_id);
        $bankAccount->opening_balance = (int)$bankAccount->opening_balance + $request->amount;
        $bankAccount->save();

        $oppAccount = Account::find($request->opposite_account_id);
        $oppAccount->opening_balance = (int)$oppAccount->opening_balance + $request->amount;
        $oppAccount->save();

        toast('RCM bank payment created successfully!', 'success');
        return redirect()->route('erp.gst.rcm.bank-payment.index');
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
        $bankAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag){
            $ag->where('name', 'Cash-in-hand');
        })->get();
        $oppAccounts = Account::where('company_id', auth()->user()->company->id)->get();
        $gstCommodities = GstCommodity::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $gst_types = Enum::RCM_GST_TYPE;
        $currencies = CurrencyMaster::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $bankPayment = RCMVoucher::find($id);
        return view('erp.gst.rcm-voucher.bank-payment.edit')->with(compact('bankAccounts', 'gstCommodities', 'gst_types', 'currencies', 'bankPayment', 'oppAccounts'));
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

        $bankPayment = RCMVoucher::find($id);
        
        $bankAccount = Account::find($request->account_id);
        if($bankPayment->account_id == $request->account_id) {
            $bankAccount->opening_balance = (int)$bankAccount->opening_balance - (int)$bankPayment->amount;
        }
        $bankAccount->opening_balance = (int)$bankAccount->opening_balance + (int)$request->amount;
        $bankAccount->save();

        $oppAccount = Account::find($request->opposite_account_id);
        if($bankPayment->opposite_account_id == $request->opposite_account_id) {
            $oppAccount->opening_balance = (int)$oppAccount->opening_balance - (int)$bankPayment->amount;
        }
        $oppAccount->opening_balance = (int)$oppAccount->opening_balance + (int)$request->amount;
        $oppAccount->save();

        $bankPayment->account_id = $request->account_id;
        $bankPayment->date = $request->date;
        $bankPayment->vou_no = $request->vou_no;
        $bankPayment->gst_type = $request->gst_type;
        $bankPayment->gst_commodity_id = $request->gst_commodity_id;
        $bankPayment->i_t_c = $request->i_t_c;
        $bankPayment->opposite_account_id = $request->opposite_account_id;
        $bankPayment->currency_id = $request->currency_id;
        $bankPayment->amount = $request->amount;
        $bankPayment->chq_dd_no = $request->chq_dd_no;
        $bankPayment->chq_dd_date = $request->chq_dd_date;
        $bankPayment->narration = $request->narration;
        $bankPayment->save();



        toast('RCM bank payment updated successfully!', 'success');
        return redirect()->route('erp.gst.rcm.bank-payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankPayment = RCMVoucher::find($id);
        $bankPayment->delete();

        toast('RCM bank payment deleted successfully!', 'success');
        return redirect()->route('erp.gst.rcm.bank-payment.index');
    }
}

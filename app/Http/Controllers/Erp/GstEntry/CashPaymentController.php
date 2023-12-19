<?php

namespace App\Http\Controllers\Erp\GstEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GstEntry;
use App\Enum\Enum;

class CashPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashPayments = GstEntry::where('gst_entry_type', Enum::GST_CASH_PAYMENT)->where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.gst.gst-entry.cash-payment.index')->with(compact('cashPayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.gst.gst-entry.cash-payment.create');
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
        return view('erp.gst.gst-entry.cash-payment.edit')->with(compact('id'));
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
        $cashPayment = GstEntry::find($id);
        $cashPayment->delete();

        toast('Cash payment deleted successfully!', 'success');

        return redirect()->route('erp.gst.gst-entry.cash-payment.index');
    }
}
